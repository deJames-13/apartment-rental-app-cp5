<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public $page;
    public function __construct()
    {
        if (request()->route()) {
            $this->page = request()->route()->getName();
        } else {
            $this->page = 'Unknown';
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.app', ['page' => $this->page]);
    }
}
