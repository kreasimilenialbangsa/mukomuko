<?php

namespace App\View\Components\Header;

use Illuminate\View\Component;

class Notice extends Component
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
        $notice = \App\Models\Admin\Program::select('title', 'slug', 'created_at')
            ->where('end_date', '<=', date('Y-m-d'))
            ->whereIsUrgent(1)
            ->whereIsActive(1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('components.header.notice')
            ->with('notice', $notice);
    }
}
