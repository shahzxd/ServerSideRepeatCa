<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'admin') {
            $data = [
                'title' => 'Admin Dashboard',
                'breadcrumbs' => array("admin/dashboard" => "Dashboard"),
                'active' => 'Dashboard',
            ];
            return view('admin.dashboard', compact('data'));
        } else {

            $data = [
                'title' => 'User Dashboard',
                'breadcrumbs' => array("user/dashboard" => "Dashboard"),
                'active' => 'Dashboard',
            ];
            return view('admin.dashboard', compact('data'));
        }
    }

}
