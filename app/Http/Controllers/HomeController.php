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
        $asks = DB::table('questions')->orderBy('created_at', 'DESC')
        ->join('users', 'users.id', '=', 'questions.user_id')
        ->where('is_approved','=',1)
        ->select('questions.*', 'users.name')
        
        ->get();
        return view('home',['asks'=>$asks]);
    }
}
