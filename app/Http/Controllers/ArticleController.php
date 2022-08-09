<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 0){
            $articles = Article::when(isset(request()->search),function ($q){
                $search = request()->search;
                return $q->orwhere('title','like',"%$search%")->orwhere('description','like',"%$search%");
            })->with('user','category')->latest('id')->paginate(7);
        }else{
            $articles = Article::when(isset(request()->search),function ($q){
                $search = request()->search;
                return $q->orwhere('title','like',"%$search%")->orwhere('description','like',"%$search%");
            })->where('user_id', Auth::id())->with('user','category')->latest('id')->paginate(7);
        }
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|min:5|max:200",
            "description"=>"required|min:10",
            "photo" => "mimes:jpeg,jpg,png",
            "category"=>"required|exists:categories,id",
        ]);
        if($request->file('photo')){
            $dir = "public/article/";
            $file = $request->file('photo');
            $newName = uniqid()."_article.".$file->getClientOriginalExtension();
            $file->storeAs($dir,$newName);
        }
        $article = new Article();
        $article->title = $request->title;
        $article->slug = Str::slug($request->title,'-');
        $article->description = $request->description;
        $article->excerpt = Str::words($request->description, 50);
        if($request->file('photo')){
            $article->photo = $newName;
        }
        $article->category_id = $request->category;
        $article->category_slug = Category::find($request->category)->slug;
        $article->user_id = Auth::user()->id;
        $article->save();
        return redirect()->route('article.index')->with('toast', ['icon'=>'success','title'=>'Article is created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            "title"=>"required|min:5|max:200",
            "description"=>"required|min:10",
            "photo" => "mimes:jpeg,jpg,png",
            "category"=>"required|exists:categories,id",
        ]);
        if($request->file('photo')){
            $dir = "public/article/";
            $file = $request->file('photo');
            $newName = uniqid()."_article.".$file->getClientOriginalExtension();
            $file->storeAs($dir,$newName);
        }
        $article->title = $request->title;
        $article->slug = Str::slug($request->title,'-');
        $article->description = $request->description;
        $article->excerpt = Str::words($request->description, 50);
        if($request->file('photo')){
            $article->photo = $newName;
        }
        $article->category_id = $request->category;
        $article->category_slug = Category::find($request->category)->slug;
        $article->update();
        return redirect()->route('article.index')->with('toast', ['icon'=>'success','title'=>'Article is created']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->photo){
            $dir = "public/article/";
            $fileName = $article->photo;
            Storage::delete($dir.$fileName);
        }
        $article->delete();
        return redirect()->route('article.index')->with('toast',['icon'=>'success','title'=>'Article is Deleted.']);
    }

    public function photoDelete(Request $request){
        $article = Article::find($request->article);
        if($article->photo){
            $dir = "public/article/";
            $fileName = $article->photo;
            Storage::delete($dir.$fileName);
            $article->photo = null;
            $article->update();
        }

        return redirect()->back()->with('toast',['icon'=>'success','title'=>'Photo is Deleted.']);
    }
}
