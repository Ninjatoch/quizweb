<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Question;
use App\Room;
use App\Student;
use App\Answer;
use App\Response;
use Auth;
use Session;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has("user_id"))
        {
            $quizzes = Quiz::where("user_id", Session::get("user_id"))->where("status", 1)->get();
            if(count($quizzes) >= 1)
                return view("room.create", ["quizzes" => $quizzes]);
            else
                return redirect("/quiz");
        }
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string|max:50",
            "participant" => "required|integer|between:5,100",
            "quiz_id" => "required|integer"
        ]);
        $name = $request->name;
        $participant = (int)$request->participant;
        $quiz_id = (int)$request->quiz_id;
        $user_id = Auth::id();
        
        $rooms = array("name" => $name, "participant" => $participant, "quiz_id" => $quiz_id, "user_id" => $user_id);
        $room = new Room;
        $room->add($rooms);
        
        return redirect("/room");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::where("room_id", $id)->paginate(10);
        $room = Room::find($id);
        $questions = Question::where("quiz_id", $room->quiz_id)->get();
        $answers = Answer::where("quiz_id", $room->quiz_id)->where("correction", 1)->get();
        foreach($students as $index => $student)
            $responses[$index] = Response::where("quiz_id", $room->quiz_id)->where("student_id", $student->id)->get();   
        return view("room.show", ["responses" => $responses, "students" => $students, "room" => $room, "questions" => $questions, "answers" => $answers ]);
    }

    public function search(Request $request)
    {
        $this->validate($request, [ "room_name" => "required|string|max:100" ]);
        $rooms = new Room;
        $rooms = $rooms->search($request->room_name);
        
        return view("menu.result", ["rooms" => $rooms]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::where("id", $id)->update(["status" => 0]);
        return redirect()->back();
    }
}
