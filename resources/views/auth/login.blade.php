@extends("shared.frontend-layout")
@section("content")
<div class="register">
    <div class="container">
        <div class="row">
            
            <!-- Register Form -->
            <div class="col-lg-3 col-md-3 col-sm-2"></div>
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                <div class="register_form_container">
                    <div class="register_form_title">Log In</div>
                    <form action="{{ route('login') }}" method="POST" id="register_form" class="register_form">
                        @csrf
                        <div class="row register_row">
                            <div class="col-lg-12 register_col">
                                <input type="email" name="email" class="form_input" placeholder="Email" required="required">
                            </div>
                            <div class="col-lg-12 register_col">
                                <input type="password" name="password" class="form_input" placeholder="Password" required>
                            </div>
                            <div class="col-lg-12 register_col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" class="form_button trans_200">Log in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection