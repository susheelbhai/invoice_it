<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    function index() : View {
        return view('user.dashboard');
    }
    function qr_scanner() : View {
        return view('user.qr_scanner');
    }
    
}
