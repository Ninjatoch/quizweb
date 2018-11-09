@extends("shared/frontend-layout")
@section("content")
<div class="courses">
		<div class="container">
			<div class="row">
				<div class="col response-header">
					<h2 class="section_title text-center">Quiz Start!!!</h2>
				</div>
			</div>
			<div class="row courses_row">
				<div class="col-lg-3 col-md-3 col-sm-3"></div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="register_form_container">						  
						<form name="quiz-form" action="/test" id="finishQuiz" method="POST">
							@csrf
							<input type="hidden" name="quiz-id" value="{{$quiz[0]->quiz_id}}">
							@foreach($quiz as $index => $question)
							<div class="tab">
								<div class="register_form_title">{{$index+1}} &nbsp; {{$question->quest}}</div>
								<input type="text" name="question-id-{{$index}}" value="{{$question->id}}" />
								<div class="register_form">
									<div class="row register_row">
										@if($question->quest_type === "qcm")		
											@foreach($question->answers as $answer)	
												<div class="col-lg-12 register_col" style="margin-bottom: 10px; padding: 5px;">
													<input type="radio" name="answer-{{$index}}" value="{{$answer["correction"]}}"> {{$answer["response"]}}
												</div>
											@endforeach
										@elseif($question->quest_type === "tnf")
											<div class="col-lg-12 register_col">
												
												<input type="radio" name="answer-{{$index}}" data-name="answer-{{$index}}" class="answer-true" value="True" style="display:none;"/>
												<input class="btn btn-light btn-form" type="button" data-name="answer-{{$index}}"  value="TRUE">
												<input type="radio" name="answer-{{$index}}" data-name="answer-{{$index}}" class="answer-false" value="False" style="display:none;"/>
												<input class="btn btn-light btn-form" type="button" data-name="answer-{{$index}}" style="float:right" value="FALSE">
											</div>
										@else
											<div class="col-lg-12 register_col">
												<input type="text" name="answer-{{$index}}" class="form_input" placeholder="Answer" required="required">
											</div>
										@endif
									</div>
								</div>
							</div>
							@endforeach
						
							<div style="overflow:auto;">
								<div style="float:right;">
									<button type="button" id="prevBtn" class="btn btn-danger" onclick="nextPrev(-1)">Previous</button>
									<input type="button" id="nextBtn" class="btn btn-success" onclick="nextPrev(1)" value="Next"></button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3"></div>
			</div>
        </div>
</div>
@endsection