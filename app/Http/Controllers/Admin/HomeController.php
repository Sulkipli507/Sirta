<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Thesis;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countUser = User::count();
        $countThesis = Thesis::count();
        $countActive = User::where('status', 'Active')->count();
        $countInactive = User::where('status', 'Inactive')->count();
        $countLecturer = User::where('role', 'Dosen')->where('status', 'Active')->count();
        $countStudent = User::where('role', 'Mahasiswa')->where('status', 'Active')->count();

        return view('admin.dashboard.home', compact('countUser','countThesis','countActive','countInactive','countLecturer','countStudent'));
    }

}
