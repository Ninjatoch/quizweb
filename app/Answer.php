<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";
    public $timestamps = false;
    protected $fillable = [
        "quiz_id", "question_id", "number", "response", "correction" ,"status"
    ];

    public function add(array $data)
    {
        $quest_type = $data["quest_type"];
        $quiz_id = $data["quiz_id"];
        $question_id = $data["question_id"];
        if($quest_type === "qcm")
        {
            $answers = $data["answers"];
            $correction = (int)$data["correct"];
            foreach($answers as $index => $answer)
            {
                $ans = new Answer;
                $ans->quiz_id = $quiz_id;
                $ans->question_id = $question_id;
                $ans->number = ($index+1);
                $ans->response = $answer;
                if($correction === ($index+1))
                    $ans->correction = 1;
                else
                    $ans->correction = 0;
                $ans->save();
            }
        }
        else
        {
            $answers = $data["answers"];
            $ans = new Answer;
            $ans->quiz_id = $quiz_id;
            $ans->question_id = $question_id;
            $ans->response = $answers;
            $ans->save();
        }
    }
    
    public function update_answer(array $data)
    {
        $quest_type = $data["quest_type"];
        $quiz_id = $data["quiz_id"];
        $question_id = $data["question_id"];
        if($quest_type === "qcm")
        {
            $answers = $data["answers"];
            $correction = (int)$data["correct"];
            foreach($answers as $index => $answer)
            {
                $ans = Answer::where("question_id", $question_id)->where("quiz_id", $quiz_id)->where("number", ($index+1))->first();
                $ans->quiz_id = $quiz_id;
                $ans->question_id = $question_id;
                $ans->number = ($index+1);
                $ans->response = $answer;
                if($correction === $index)
                    $ans->correction = 1;
                else
                    $ans->correction = 0;
                $ans->save();
            }
        }
        else
        {
            $answers = $data["answers"];
            $ans = Answer::where("question_id", $question_id)->where("quiz_id", $quiz_id)->first();
            $ans->response = $answers;
            $ans->save();
        }
    }
}
