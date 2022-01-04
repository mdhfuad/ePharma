<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GuestLayout extends Component
{
    public function __construct(public $title = null)
    {
        $this->title .= ' - ' . config('app.name');
    }

    public function render()
    {
        return view('layouts.guest');
    }
}
