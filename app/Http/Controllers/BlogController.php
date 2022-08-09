<?php

namespace App\Http\Controllers;

use App\Article;
use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $articles = Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            return $q->orwhere('title','like',"%$search%")->orwhere('description','like',"%$search%");
        })->with('user','category')->latest('id')->paginate(5);

        $oldArticle = Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            return $q->orwhere('title','like',"%$search%")->orwhere('description','like',"%$search%");
        })->with('user','category')->first();
        return view('welcome', compact(['articles', 'oldArticle']));

    }

    public function baseOnCategory($slug){
        $articles = Article::where('category_slug', $slug)->with('user','category')->latest('id')->paginate(5);
        $oldArticle = Article::where('category_slug', $slug)->with('user','category')->latest('id')->first();
        return view('welcome', compact(['articles', 'oldArticle']));

    }

    public function index(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug',$slug)->first();
        return view('blog.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
