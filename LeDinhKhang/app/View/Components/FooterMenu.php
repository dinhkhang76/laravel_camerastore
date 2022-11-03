<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Menu;

class FooterMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $list_menu_footer = Menu::where([['status','=','1'],['position','=','footermenu']])->get();
        return view('components.footer-menu',compact('list_menu_footer'));
    }
}
