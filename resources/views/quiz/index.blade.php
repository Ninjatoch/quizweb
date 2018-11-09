@extends("shared.teacher-dashboard")
@section("content")
<div style="height: 70px;"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>{{$quiz->name}}<p style="color: black">By {{$quiz->username}} &nbsp; on {{date('d-M-Y', strtotime($quiz->created_at))}}</p></h3>
            <hr/>
            <h4>Questions</h4>
            @foreach($questions as $index => $question)
            <div class="question">
                <form style="color: black" data-edit="{{$question->id}}"> <!--action="/questions/{$question->id}}" method="POST"csrf
                    <input type="hidden" name="_method" value="PUT">
                     -->
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <strong>#{{++$index}}</strong>
                            <button style="float: right" type="button" name="edit" data-edit="{{$question->id}}" data-type="{{$question->quest_type}}" class="btn btn-success">Edit</button>
                            <button style="float: right" type="button" name="cancel" data-edit="{{$question->id}}"  data-type="{{$question->quest_type}}" hidden class="btn btn-danger">Cancel</button>
                            <button style="float: right; margin-right: 10px;" type="submit" name="update" data-edit="{{$question->id}}" data-type="{{$question->quest_type}}" hidden class="btn btn-primary" onsubmit="event.preventDefault();">Save</button>
                        </div>
                    </div>
                    <div id="pic" data-edit="{{$question->id}}" hidden class="row" style="margin-top: 20px;">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                            <label for="select-pic{{$question->id}}">
                                <i class="fa fa-picture-o fa-4x" aria-hidden="true"></i>
                                <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                            </label>
                            <input type="file" name="photo" id="select-pic{{$question->id}}" data-edit="{{$question->id}}" style="display: none;"/>
                            <input type="hidden" name="old-photo" data-edit={{$question->id}} value="{{$question->photo}}"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6">
                            <input type="hidden" name="user_id" value="{{$question->user_id}}"/>
                            <input type="hidden" name="quiz_id" value="{{$question->quiz_id}}"/>
                            <input type="text" name="question" data-edit="{{$question->id}}" class="form-control" value="{{$question->quest}}"/>
                        </div>
                    </div>
                    <div id="qcm" hidden data-edit="{{$question->id}}">
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table">
                                    <tr>
                                        <th style="width: 35px;">Answer</th>
                                        <th></th>
                                        <th></th>
                                        <th style="width: auto;">Correct?</th>
                                    </tr>
                                    @foreach($question->answers as $index => $answer)
                                        <tr data-tr="{{$index}}">
                                            <td><button class="btn btn-warning">{{$index}}</button></td>
                                            <td><input type="text" name="{{$index}}" value="{{$answer['response']}}" data-edit="{{$question->id}}" class="form-control"/></td>
                                            <td><button class="btn btn-danger" data-close="{{$index}}" data-edit="{{$question->id}}">&times;</button></td>
                                            <td><input type="radio" name="correct" @if($answer['correction']) checked @endif data-correct="{{$index}}" data-edit="{{$question->id}}"></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td><button class="btn btn-info" id="add-answer">Add Answer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="tnf" hidden data-edit="{{$question->id}}">
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h4>Correct Answer:</h4>
                                <input @if($question->answers[0]["response"] === "True") class="btn btn-success" data-answer="True" @else class="btn btn-light" @endif type="button" data-edit="{{$question->id}}" name="TNF" value="TRUE">
                                <input @if($question->answers[0]["response"] === "False") class="btn btn-danger" data-answer="False" @else class="btn btn-light" @endif type="button" data-edit="{{$question->id}}" name="TNF" value="FALSE">
                            </div>
                        </div>
                    </div>
                    <div id="sa" hidden data-edit="{{$question->id}}">
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h4>Answer (optional)</h4>
                                <input type="text" name="answer" data-edit="{{$question->id}}" value="{{$question->answers[0]['response']}}" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    
                    <div id="view-question" data-edit="{{$question->id}}">
                        @if($question->photo !== null) <img src="{{$question->photo}}" style="width:100px; display:block;" title="{{$question->photo}}"/>@endif
                        <h4 style="margin-top: 10px">{{$question->quest}}</h4> 
                        <h5>Answer(s)</h5>
                        @if($question->quest_type === "qcm")
                            @foreach($question->answers as $answer)
                                <input type="radio" name="answer" value="{{$answer['response']}}" @if($answer['correction']) checked @endif>{{$answer["response"]}}
                            @endforeach
                        @else
                            <input type="text" name="answer" class="form-control" value="{{$question->answers[0]['response']}}" disabled/>
                        @endif
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div style="height:50px"></div>
@endsection