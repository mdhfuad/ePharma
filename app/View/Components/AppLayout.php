<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public function __construct(public $title = null)
    {
        $this->title .= ' - ' . config('app.name');
    }

    public function render()
    {
        return view('layouts.app');
    }
}
