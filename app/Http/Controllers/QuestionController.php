<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Quiz;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            "type_quest" => "required|string|max:10",
            "user_id" => "required|string|max:5",
            "quiz_id" => "required|string|max:5",
            "question" => "required|string|max:200",
            "photo" => "nullable",
            "photo.*" => "mimes:jpg,png,jpeg,gif|max:10000"
        ]);
        $type_quest = $request->type_quest;
        $user_id = $request->user_id;
        $quiz_id = $request->quiz_id;
        $quest = $request->question;
        $photo = $request->file('photo');

        $question_array = array("type_quest" => $type_quest, "user_id" => $user_id,
                    "quiz_id" => $quiz_id, "quest" => $quest, "photo" => $photo);
        $question = new Question;
        $question_id = $question->add($question_array);
        if($type_quest === "qcm")
        {
            $this->validate($request, [
                "answers" => "required|array|min:3",
                "answers.*" => "string|max:100",
                "correct" => "required|string|max:2"
            ]);

            $answers = $request->answers; //array of string
            $correct = $request->correct;

            $answer_array = array("quest_type" => $type_quest, "quiz_id" => $quiz_id, "question_id" => $question_id, "answers" => $answers, "correct" => $correct);
            $answer = new Answer;
            $answer->add($answer_array);
            //return response()->json($answers);
        }
        else if($type_quest === "tnf")
        {
            $this->validate($request, [ "answer" => "required|string|max:6"]);
            $answers = $request->answer;
            $answer_array = array("quest_type" => $type_quest, "quiz_id" => $quiz_id, "question_id" => $question_id, "answers" => $answers);
            $answer = new Answer;
            $answer->add($answer_array);
            //return response()->json($answer);
        }
        else if($type_quest === "sa")
        {
            $this->validate($request, [ "answer" => "nullable|string|max:100" ]);
            $answers = $request->answer;
            $answer_array = array("quest_type" => $type_quest, "quiz_id" => $quiz_id, "question_id" => $question_id, "answers" => $answers);
            $answer = new Answer;
            $answer->add($answer_array);
        }
        else
            return response()->json(null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, int $id)
    {
        //dd($request);
        return response()->json($request);
    }

    public function update_question(Request $request)
    {
        $this->validate($request, [
            "id" => "required|integer",
            "user_id" => "required|integer",
            "quiz_id" => "required|integer",
            "file" => "nullable",
            "file.*" => "mimes:jpg,png,jpeg,gif|max:10000",
            "old_photo" => "nullable|string|max:50",
            "question" => "required|string|max:100",
            "quest_type" => "required|string|max:5", 
        ]);

        $id = $request->id;
        $user_id = $request->user_id;
        $quiz_id = $request->quiz_id;
        $file = $request->file("file");
        $old_photo = $request->old_photo;
        $quest = $request->question;
        $quest_type = $request->quest_type;
        
        $check_update = Question::where("id", $id)->where("user_id", $user_id)
                                ->where("quiz_id", $quiz_id)->where("quest", "like", $quest)
                                ->where("photo", $old_photo)->count();
        if($check_update === 0 || file_exists($file))
        {
            $question_array = array("id" => $id, "user_id" => $user_id, "quiz_id" => $quiz_id,
                            "photo" => $file, "quest" => $quest, "quest_type" => $quest_type);
            $question = new Question;
            $question->update_question($question_array);
        }
        
        if($quest_type === "qcm")
        {
            $this->validate($request, [
                "answers" => "required|array|min:3",
                "answers.*" => "string|max:100",
                "correct" => "required|string|max:2"
            ]);

            $answers = $request->answers; //array of string
            $correct = $request->correct;

            $answer_array = array("question_id" => $id, "quest_type" => $quest_type, "quiz_id" => $quiz_id, "answers" => $answers, "correct" => $correct);
            $answer = new Answer;
            $answer = $answer->update_answer($answer_array);
            
        }
        else if($quest_type === "tnf")
        {
            $this->validate($request, [ "answer" => "required|string|max:6" ]);
            $answer_array = array("question_id" => $id, "quest_type" => $quest_type, "quiz_id" => $quiz_id, "answers" => $request->answer);
            $answer = new Answer;
            $answer = $answer->update_answer($answer_array);

        }
        else if($quest_type === "sa")
        {
            $this->validate($request, [ "answer" => "nullable|string|max:100" ]);
            $answer_array = array("question_id" => $id, "quest_type" => $quest_type, "quiz_id" => $quiz_id, "answers" => $request->answer);
            $answer = new Answer;
            $answer = $answer->update_answer($answer_array);
            
        }
        else {}

        return response()->json($answer);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
