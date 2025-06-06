
@include('frontend.components.head')
    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3>Create an Account</h3>
                                </div>
{{--                                <form method="POST" action="{{ route('register') }}" name="register-form" class="needs-validation" novalidate="">--}}
{{--                                    @csrf--}}
{{--                                    <div class="form-group mb-3">--}}
{{--                                        <input type="text" required="" class="form-control" name="name" placeholder="Enter Your Name">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group mb-3">--}}
{{--                                        <input type="text" required="" class="form-control" name="email" placeholder="Enter Your Email">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group mb-3">--}}
{{--                                        <input type="number" required="" class="form-control" name="mobile" placeholder="Enter Your Mobile">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group mb-3">--}}
{{--                                        <input class="form-control" required="" type="password" name="password" placeholder="Password">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group mb-3">--}}
{{--                                        <input class="form-control" required="" type="password" name="password" placeholder="Confirm Password">--}}
{{--                                    </div>--}}
{{--                                    <div class="login_footer form-group mb-3">--}}
{{--                                        <div class="chek-form">--}}
{{--                                            <div class="custome-checkbox">--}}
{{--                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">--}}
{{--                                                <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group mb-3">--}}
{{--                                        <button type="submit" class="btn btn-fill-out btn-block" name="register">Register</button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
                                <form method="POST" action="{{ route('register') }}" name="register-form" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input class="form-control form-control_gray @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required="" autocomplete="name"
                                               autofocus="">
                                        <label for="name">Name</label>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="pb-3"></div>
                                    <div class="form-floating mb-3">
                                        <input id="email" type="email" class="form-control form-control_gray @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required=""
                                               autocomplete="email">
                                        <label for="email">Email address *</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="pb-3"></div>

                                    <div class="form-floating mb-3">
                                        <input id="mobile" type="" class="form-control form-control_gray @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"
                                               required="" autocomplete="mobile">
                                        <label for="mobile">Mobile *</label>
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="pb-3"></div>

                                    <div class="form-floating mb-3">
                                        <input id="password" type="password" class="form-control form-control_gray @error('password') is-invalid @enderror" name="password" required=""
                                               autocomplete="new-password">
                                        <label for="password">Password *</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input id="password-confirm" type="password" class="form-control form-control_gray @error('password_confirmation') is-invalid @enderror"
                                               name="password_confirmation" required="" autocomplete="new-password">
                                        <label for="password">Confirm Password *</label>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>

                                    <button class="btn btn-fill-out btn-block w-100 text-uppercase" type="submit">Register</button>

                                </form>

                                <div class="different_login">
                                    <span> or</span>
                                </div>
                                <ul class="btn-login list_none text-center">
                                    <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                    <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                                </ul>
                                <div class="form-note text-center">Already have an account? <a href="{{ route('login') }}">Log in</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END LOGIN SECTION -->
@include('frontend.components.script')
    <script>
        (async () =>{
            $(".preloader").delay(50).fadeOut(100).addClass('loaded')
        })()
    </script>

