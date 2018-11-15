@extends("shared.frontend-layout")
@section("content")
<div class="courses">
	<div class="courses_background"></div>
		<div class="container">
			<div class="row">
				<div class="col response-header">
					<h2 class="section_title text-center">Room Search Found</h2>
				</div>
			</div>
			<div class="row courses_row">
                @if(count($rooms) > 0)
                    @foreach($rooms as $room)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 course_col">
                            <div class="course">
                                <!--<div class="course_image"><img src="images/course_1.jpg" alt=""></div>-->
                                <div class="course_body">
                                    <div class="course_title"><a href="course.html">{{$room["quiz"]["name"]}}</a></div>
                                    <div class="course_info">
                                        <ul>
                                            <li><a href="instructors.html">{{$room["user"]["name"]}}</a></li>
                                            <li>Published on <a href="#">{{date("M d,Y", strtotime($room->created_at))}}</a></li>
                                        </ul>
                                    </div>
                                    <!--
                                    <div class="course_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
                                    </div>
                                    -->
                                </div>
                                <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                                    <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>{{$room->participants}}</span></div>
                                    <!--<div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>-->
                                    <div class="course_mark course_free trans_200"><a href="#" @if($room->participants > 0) data-room="{{$room}}" data-toggle="modal" data-target="#join-room"@endif >@if($room->participants > 0)Join @else Full @endif</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 course_col">
                        <div class="course">
                            <div class="course_body">
                                <div class="course_title"><a href="course.html">Not Found</a></div>
                                <div class="course_text">
                                    <p>Please, try to search another room</p>
                                </div>
                            </div>
                        </div>
                    </div>
				
                @endif
		    </div>
	    </div>
</div>

@endsection