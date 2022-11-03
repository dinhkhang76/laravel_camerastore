<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Supplier;

class ListSupplier extends Component
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
        $list_supplier = Supplier::where('status', '=', '1')->get();
        return view('components.list-supplier',compact('list_supplier'));
    }
}
