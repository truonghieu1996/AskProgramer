<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AsksController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getAsks(){
        $asks = DB::table('questions')
        ->join('categories', 'categories.id', '=', 'questions.category_id')
        ->join('users', 'users.id', '=', 'questions.user_id')
        ->select('questions.*', 'categories.name_category', 'users.name')
        ->orderBy('questions.created_at', 'DESC')->get();
        return view('asks.index',['asks'=>$asks]);
    }

    public function getMyAsks(){
        $categories = DB::table('categories')->get();
        $myquestions = DB::table('questions')
        ->join('categories', 'categories.id', '=', 'questions.category_id')
        ->select('questions.*', 'categories.name_category')
        ->orderBy('questions.created_at', 'DESC')
        ->where('user_id', '=', Auth::user()->id)->get();
        return view('asks.myasks',['myquestions' => $myquestions, 'categories' => $categories]);
    }

    public function getAdd(){
        $categories = DB::table('categories')->get();
        return view('asks.add',['categories' => $categories]);
    }

    public function postAdd(Request $request){
		$this->validate($request, [
            'title' => 'required|max:225',
			'category_id' => 'required',
			'content' => 'required',
        ]);
		
		if(Auth::user()->role == 1)
			$approved = 1;
		else
			$approved = 0;
		
		DB::table('questions')->insert([
			'category_id' => $request->category_id,
			'user_id' => Auth::user()->id,
			'title' => $request->title,
			'content' => $request->content,
            'amount_view' => 0,
            'score' => 0,
			'is_approved' => $approved,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
		]);
		
		return redirect('asks/myasks');
    }
    
    public function getApprovedPost($id, $status)
	{
		DB::table('questions')->where('id', $id)->update([
			'is_approved' => $status
		]);
		return redirect('asks');
    }
    
    public function getDelete(Request $request){
        DB::table('questions')->where('id', '=', $request->ID_delete)->delete();
		return redirect('asks/myasks');
    }

}
