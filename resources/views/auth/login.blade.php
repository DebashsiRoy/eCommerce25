@include('frontend.components.head')
    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Login</h3>
                            </div>

                            <form method="post"  action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" required="" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email"  value="{{ old('email') }}" autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control @error('password') is-invalid @enderror" required="" type="password" name="password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="login_footer form-group mb-3">
{{--                                    <div class="chek-form">--}}
{{--                                        <div class="custome-checkbox">--}}
{{--                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">--}}
{{--                                            <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <a href="#">Forgot password?</a>
                                </div>
                                <input type="hidden" name="last_location" id="last_location" />
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                                </div>
                            </form>


                            <div class="different_login">
                                <span> or</span>
                            </div>
                            <ul class="btn-login list_none text-center">
                                <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                            </ul>
                            <div class="form-note text-center">Don't Have an Account? <a href="{{ route('register') }}">Sign up now</a></div>
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
        document.addEventListener("DOMContentLoaded", function () {
            const lastLocation = sessionStorage.getItem("last_location");
            if (lastLocation) {
                document.getElementById("last_location").value = lastLocation;
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('form');
            const lastLocation = sessionStorage.getItem('last_location');
            if (form && lastLocation) {
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'last_location';
                input.value = lastLocation;
                form.appendChild(input);
                sessionStorage.removeItem('last_location');
            }
        });
    </script>
