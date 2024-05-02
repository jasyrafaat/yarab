<?php

namespace App\View\Components;

use Closure;
use App\Models\cart;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public $cart;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $user_id=Auth::guard("web")->user()->id??"";
        $cart=cart::where("user_id",$user_id)->with("products.images")->get();
        $this->cart=$cart;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
