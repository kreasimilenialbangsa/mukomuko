<?php

namespace App\View\Components\Header;

use Illuminate\View\Component;

class Service extends Component
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
        $services = \App\Models\Admin\Service::select('title', 'slug')
            ->whereIsActive(1)
            ->orderBy('id', 'asc')
            ->get();

        return view('components.header.service')
            ->with('services', $services);
    }
}
