<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = [
        "user_id", "quiz_id", "quest", "quest_type", "photo" ,"status"
    ];

    public function add(array $data)
    {
        $user_id = $data["user_id"];
        $quiz_id = $data["quiz_id"];
        $quest = $data["quest"];
        $quest_type = $data["type_quest"];
        $photo = $data["photo"];
        
        $question = new Question;
        $question->user_id = $user_id;
        $question->quiz_id = $quiz_id;
        $question->quest = $quest;
        $question->quest_type = $quest_type;
        if($photo !== null)
        {
            $file_extension = $photo->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $photo->storeAs("public/question/photo/", $file_name);
            $path = "/storage/question/photo/" . $file_name;
        }
        else
            $path = null;
        $question->photo = $path;
        $question->save();
        $id = Question::select("id")->orderBy("id", "desc")->first();
        return $id->id;
    }

    public function update_question(array $data)
    {
        $id = $data["id"];
        $user_id = $data["user_id"];
        $quiz_id = $data["quiz_id"];
        $quest = $data["quest"];
        $quest_type = $data["type_quest"];
        $photo = $data["photo"];
        
        $question = Question::where("id", $id)->first();
        $question->user_id = $user_id;
        $question->quiz_id = $quiz_id;
        $question->quest = $quest;
        $question->quest_type = $quest_type;
        if($photo !== null)
        {
            $file_extension = $photo->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $photo->storeAs("public/question/photo/", $file_name);
            $path = "/storage/question/photo/" . $file_name;
        }
        else
            $path = null;
        $question->photo = $path;
        $question->save();
        $getId = Question::select("id")->where("id", $id)->first();
        return $getId->id;
    }

    public function getQuestions(int $quiz_id)
    {
        $questions = Question::where('quiz_id', $quiz_id)->get();
        
        foreach($questions as $question)
        {
            $question["answers"] = Answer::where('question_id', $question->id)->where('status', 1)->get()->toArray();
        }
        return $questions;

    }
}
