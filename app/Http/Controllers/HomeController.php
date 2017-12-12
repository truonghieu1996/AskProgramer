<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Hashing\BcryptHasher;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
}
