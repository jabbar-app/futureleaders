<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $candidates = Candidate::where('is_admin', false)->select(['id', 'name', 'phone', 'email', 'status'])->get();
        return view('admin.dashboard', compact('candidates'));
    }
}
