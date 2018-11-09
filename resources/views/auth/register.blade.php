@extends("shared.frontend-layout")
@section("content")
<div class="register">
    <div class="container">
        <div class="row">
            
            <!-- Register Timer -->

			<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
				<div class="register_timer_container">
					<div class="register_timer_title">Register Now</div>
					<div class="register_timer_text">
						<p>In order to get rooms for making quizzes for students!!!</p>
					</div>
				</div>
            </div>
            
            <!-- Register Form -->

            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                <div class="register_form_container">
                    <div class="register_form_title">Account For Free</div>
                    <form action="{{ route('register') }}" autocomplete="off" method="POST" id="register_form" class="register_form">
                        @csrf
                        <div class="row register_row">
                            <div class="col-lg-6 register_col">
                                <input type="text" name="name" class="form_input" placeholder="Name" required="required">
                            </div>
                            <div class="col-lg-6 register_col">
                                <input type="email" name="email" class="form_input" placeholder="Email" required="required">
                            </div>
                            <div class="col-lg-6 register_col">
                                <input type="password" name="password" class="form_input" placeholder="Password" required>
                            </div>
                            <div class="col-lg-6 register_col">
                                <input type="password" name="confirm-password" id="password" class="form_input" placeholder="Re-enter Password" required>
                            </div>
                            <div class="col">
                                <button type="submit" class="form_button trans_200">Sign up now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
			
        </div>
    </div>
</div>
@endsection