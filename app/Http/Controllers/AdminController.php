<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $candidates = Candidate::with('user')
            ->select(['id', 'user_id', 'region', 'gender', 'birth_date'])
            ->get();
        return view('admin.dashboard', compact('candidates'));
    }
}
