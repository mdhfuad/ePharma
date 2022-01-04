<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\{User, Branch, Company, Medicine};

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            [
                'title' => 'Users',
                'icon' => 'users',
                'class' => 'bg-indigo text-white',
                'count' => User::count(),
            ],
            [
                'title' => 'Branches',
                'icon' => 'git-branch',
                'class' => 'bg-yellow text-white',
                'count' => Branch::count(),
            ],
            [
                'title' => 'Companies',
                'icon' => 'building',
                'class' => 'bg-red text-white',
                'count' => Company::count(),
            ],
            [
                'title' => 'Medicines',
                'icon' => 'pills',
                'class' => 'bg-green text-white',
                'count' => Medicine::count(),
            ],
        ];

        return view('dashboard', compact('data'));
    }
}
