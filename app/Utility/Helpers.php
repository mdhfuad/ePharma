<?php

function admin_nav()
{
    return
        [
            [
                'text' => 'Dashboard',
                'route' => 'dashboard.index',
                'active' => 'dashboard.index',
                'icon' => 'dashboard',
            ],
            [
                'text' => 'Users',
                'route' => 'dashboard.users.index',
                'active' => 'dashboard.users.*',
                'icon' => 'users'
            ],
            [
                'text' => 'Branches',
                'route' => 'dashboard.branches.index',
                'active' => 'dashboard.branches.*',
                'icon' => 'git-branch'
            ],
            [
                'text' => 'Companies',
                'route' => 'dashboard.company.index',
                'active' => 'dashboard.company.*',
                'icon' => 'building'
            ],
            [
                'text' => 'Generics',
                'route' => 'dashboard.generic.index',
                'active' => 'dashboard.generic.*',
                'icon' => 'flask'
            ],
            [
                'text' => 'Dosages',
                'route' => 'dashboard.dosage.index',
                'active' => 'dashboard.dosage.*',
                'icon' => 'pill'
            ],
            [
                'text' => 'Medicines',
                'route' => 'dashboard.medicine.index',
                'active' => 'dashboard.medicine.*',
                'icon' => 'pills'
            ],
            [
                'text' => 'Medicine Stock',
                'route' => 'dashboard.stock.index',
                'active' => 'dashboard.stock.*',
                'icon' => 'clipboard-list'
            ],
            [
                'text' => 'Sales Report',
                'route' => 'dashboard.sales.index',
                'active' => 'dashboard.sales.*',
                'icon' => 'shopping-cart'
            ],
        ];
}

function pharmacist_nav()
{
    return [
        [
            'text' => 'Medicine Stock',
            'route' => 'pharmacist.index',
            'active' => 'pharmacist.index',
            'icon' => 'clipboard-list'
        ],
    ];
}

function dashboard_nav()
{
    return auth()->check() && auth()->user()->hasRole('admin') ? admin_nav() : pharmacist_nav();
}

/**
 * Determine if the item is active or not
 *
 * @param array $item
 * @return bool
 */
function is_active_nav($item)
{
    $routeName = $item['active'] ?? ($item['route'] ?? null);

    if ($routeName && request()->routeIs($routeName)) {
        return true;
    }

    if (!empty($item['items'])) {
        foreach ($item['items'] as $subItem) {
            if (is_active_nav($subItem)) return true;
        }
    }

    return false;
}


function format_bytes(int $bytes, string $to = 'MB', $decimal_precision = 1)
{
    $formulas = [
        'KB' => $bytes / 1024,
        'MB' => $bytes / 1048576,
        'GB' => $bytes / 1073741824
    ];

    return isset($formulas[$to]) ? number_format($formulas[$to], $decimal_precision) : 0;
}

function format_size_units(int $bytes)
{
    if ($bytes <= 1024) {
        return $bytes . ' Bytes';
    }

    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

    for ($i = 0; $bytes > 1024; $i++) {
        $bytes /= 1024;
    }

    return number_format($bytes, 2) . ' ' . $units[$i];
}
