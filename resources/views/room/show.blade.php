@extends("shared.teacher-dashboard")
@section("content")
<div class="register">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1>Room: @if(isset($room)){{$room->name}}@endif</h1>
                <table class="table table-striped">
                    <tr>
                        <th>Nº</th>
                        <th>Name</th>
                        <th>Taken Date</th>
                        <th>Score</th>
                        <th>Grade</th>
                        <th></th>
                    </tr>
                    @if(isset($students))
                        @foreach($students as $index => $student)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{date("d-M-Y", strtotime($student->created_at))}}</td>
                                <td>{{$student->score}}</td>
                                <td>{{$student->grade}}</td>
                                <td>
                                    <a href="#" class="correct-quiz" data-responses="{{$responses[$index]}}" data-student="{{$student}}" data-questions="{{$questions}}" data-answers="{{$answers}}" data-toggle="modal" data-target="#correction-form">Correct</a> | <!--href="/quiz/correct/{$student->id}}"-->
                                    <a href="/students/{{$student->id}}/edit">Edit</a> |
                                    <a href="" onclick="event.preventDefault(); document.getElementById('disable-student').submit();">Delete</a>
                                    <form style="display: none;" id="disable-student" method="POST" action="students/{{$room->id}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr> 
                            <th> {{$students->links()}} </th>
                        </tr>
                    @else
                        <tr>
                            <td colspan="6" style="background-color: #f4f4f4; padding: 5%;" class="text-center">
                                <a href="/rooms">No Participantees</a>
                            </td>
                        </tr>
                    @endif
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection