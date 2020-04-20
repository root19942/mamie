<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\NewsLetter;
class NewsLetterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Store email
     */
    public function store(Request $request)
    {
        $newsLetter = NewsLetter::whereEmail($request->get('email'))->first();
        if(!$newsLetter){
            $newsLetter = NewsLetter::create($request->all());
        }
        return response()->json($newsLetter);
    }

    //
}
