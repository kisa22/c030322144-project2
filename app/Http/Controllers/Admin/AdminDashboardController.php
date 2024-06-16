<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin'); // Memastikan middleware diterapkan pada seluruh metode di controller ini
    }

    public function index()
    {
        return view('admin.dashboard'); // Mengembalikan view untuk dashboard admin
    }
}