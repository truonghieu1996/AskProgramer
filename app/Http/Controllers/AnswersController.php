<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AnswersController extends Controller
{
    public function postAdd(Request $request){
        $this->validate($request, [
			'content' => 'required'
        ]);
		
		DB::table('answers')->insert([
			'user_id' => Auth::user()->id,
			'content' => $request->content,
            'score' => 0,
            'question_id' => $request->question_id,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
		]);
		
		return redirect('answers');
    }
}
