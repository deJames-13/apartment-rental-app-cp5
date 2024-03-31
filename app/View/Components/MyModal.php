<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MyModal extends Component
{


    /**
     * Create a new component instance.
     *
     * @param  string  $id
     * @param  string  $title
     */


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.my-modal');
    }
}
