<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Question;
use App\Student;
use App\Room;
use Auth;
use Session;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = new Quiz;
        $user_id = Auth::id();
        
        if(!Session::has("hasQuiz"))
        {
            $quiz_id = $quiz->default($user_id);
        }
        else 
            $quiz_id = Session::get("quiz_id");
        $quiz_name = Session::get("quiz_name");
        return view("quiz.make", ["quiz_id" => $quiz_id, "user_id" => $user_id, "quiz_name" => $quiz_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function take(Request $request)
    {
        $this->validate($request, [
            "user_id" => "required|integer",
            "quiz_id" => "required|integer",
            "room_id" => "required|integer",
            "nickname" => "required|string|max:40"
        ]);

        $user_id = $request->user_id;
        $quiz_id = $request->quiz_id;
        $room_id = $request->room_id;
        $nickname = $request->nickname;

        $room = new Room;
        if($room->isAvaliable($room_id))
        {
            $quiz = new Question;
            $quiz = $quiz->getQuestions($quiz_id);
            
            if(!Session::has("room_valid"))
            {
                $students = array("quiz_id" => $quiz_id, "room_id" => $room_id, "nickname" => $nickname);
                $student = new Student;
                $student_id = $student->add($students);
                session(["student_id" => $student_id]);
                $room->update_room($room_id);
            }
            return view("quiz.take", ["quiz" => $quiz]);
        }
        return redirect()->back();
    }

    public function submit(Request $request)
    {
        return response()->json($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = new Quiz;
        $questions = new Question;
        
        return view("Quiz.index", ["quiz" => $quiz->getQuiz($id), "questions" => $questions->getQuestions($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'asdfasldf';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "quiz_name" => "required|string|max:100"
        ]);
        $quiz_name = $request->quiz_name;
        $quiz = new Quiz;
        $quiz->edit($id, $quiz_name);
        session()->forget("hasQuiz");
        session()->forget("quiz_id");
        session()->forget("quiz_name");
        if(Session::has("hasQuiz")) dd(Session::get("hasQuiz"));
        return redirect("/quiz");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $id;
    }
}
