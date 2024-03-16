<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GuestLayout extends Component
{

    public $page;
    public function __construct()
    {
        $this->page = request()->route()->getName();
    }

    public function render(): View|Closure|string
    {
        return view('layouts.guest', ['page' => $this->page]);
    }
}
