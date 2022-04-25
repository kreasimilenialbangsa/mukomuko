<?php

namespace App\View\Components\Admin;

use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class header extends Component
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
        $user = User::whereId(Auth::user()->id)->first();
        
        return view('components.admin.header')
            ->with('user', $user);
    }
}
