<?php
namespace App\Controllers;

class Controller
{
    public $views = [
        'auth' => [
            'dashboard',
            'sell',
            'sales_report',
            'products',
            'warehouse'
        ],
        'nonauth' => [
            'login'
        ]
    ];

    public function permit($page)
    {
        if (!isset($_SESSION['username'])) {
            return in_array($page, $this->views['nonauth']);
        }

        return in_array($page, $this->views['auth']);
    }
}
