<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {

        $users = User::orderByDesc('created_at')->paginate(10);
        $totalUsers = User::count();
        return view('admin.users', compact('users','totalUsers'));
    }
}