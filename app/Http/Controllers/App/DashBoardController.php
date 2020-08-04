<?php


namespace App\Http\Controllers\App;


use App\Http\Controllers\Controller;
use Inertia\Inertia;

class DashBoardController extends BaseController
{
    public function __invoke()
    {
        return Inertia::render('Dashboard/Dashboard');
    }
}

