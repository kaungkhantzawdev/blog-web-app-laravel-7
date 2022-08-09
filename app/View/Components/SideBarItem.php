<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideBarItem extends Component
{
    public $link;
    public $class;
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$class,$link)
    {
        $this->name = $name;
        $this->class = $class;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.side-bar-item');
    }
}
