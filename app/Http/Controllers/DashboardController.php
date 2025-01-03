<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
            ? response()->json(['message' => 'Welcome to the Dashboard'])
            : view('dashboard');
    }
}