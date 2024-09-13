<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerchantDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.merchant');
    }
}
