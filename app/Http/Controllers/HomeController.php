<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Quiz;
use App\Room;
use Session;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(["user_id" => Auth::id()]);
        
        return view('teacher.contents');
    }

    public function quiz()
    {
        $quizzes = new Quiz;
        $user_id = Session::get("user_id");
        return view("quiz.view", ["quizzes" => $quizzes->show($user_id)]);
    }

    public function room()
    {
        $quizzes = new Quiz;
        $user_id = Session::get("user_id");
        $quizzes = $quizzes->show($user_id);
        $rooms = new Room;
        $rooms = $rooms->show($user_id);

        if($quizzes === null)
            return view("quiz.view", ["quizzes" => $quizzes]);
        return view("room.view", ["quizzes" => $quizzes, "rooms" => $rooms]);
    }

    public function report()
    {
        return view("report.view");
    }

    public function result()
    {
        return view("result.view");
    }
}
