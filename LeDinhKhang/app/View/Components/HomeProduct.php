<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;
use App\Models\Category;

class HomeProduct extends Component
{
    public $cat;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cat)
    {
        $this->cat = $cat;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $row_category = $this->cat;
        $catid = $row_category->id;
        $arrcatid = array();
        array_push($arrcatid, $catid);
        $list_category2 = Category::where([['status', '=', '1'], ['parentid', '=', $catid]])->get();
        if(count($list_category2)>0){
            foreach($list_category2 as $cat2){
                array_push($arrcatid, $cat2->id);
                $list_category3 = Category::where([['status', '=', '1'], ['parentid', '=', $cat2->id]])->get();
                if(count($list_category3)>0){
                    foreach($list_category3 as $cat3){
                        array_push($arrcatid, $cat3->id);
                    }
                }
            }
        }
        $take = 4;
        $list_product = Product::whereIn('catid', $arrcatid)->where('status', '=', '1')->orderBy('created_at', 'desc')->take(4)->get();
        return view('components.home-product', compact('list_product'));
    }
}
