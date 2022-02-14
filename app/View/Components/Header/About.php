<?php

namespace App\View\Components\Header;

use Illuminate\View\Component;

class About extends Component
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
        $abouts = \App\Models\Admin\About::select('title', 'slug')
            ->whereIsActive(1)
            ->orderBy('id', 'asc')
            ->get();

        return view('components.header.about')
            ->with('abouts', $abouts);
    }
}
