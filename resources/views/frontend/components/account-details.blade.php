@extends('layouts.app')
@section('content')
    <section class="my-account container">
        <h2 class="page-title">Account Details</h2>
        <div class="row">
            @include('frontend.components.user-details')
            <div class="col-lg-9">
                <div class="page-content my-account__edit">
                    <div class="my-account__edit-form">
                        <form name="account_edit_form" action="#" method="POST" class="needs-validation" novalidate="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" id="name" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Mobile Number" id="userMobile" name="mobile" value=""
                                               required="">
                                        <label for="mobile">Mobile Number</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input readonly type="email" class="form-control" placeholder="Email Address" id="email" name="email" value=""
                                               required="">
                                        <label for="account_email">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="my-3">
                                        <h5 class="text-uppercase mb-0">Password Change</h5>
                                    </div>
                                </div>
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="form-floating my-3">--}}
{{--                                        <input type="password" class="form-control" id="old_password" name="old_password"--}}
{{--                                               placeholder="Old password" required="">--}}
{{--                                        <label for="old_password">Old password</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="New password" required="">
                                        <label for="account_new_password">New password</label>
                                    </div>
                                </div>
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="form-floating my-3">--}}
{{--                                        <input type="password" class="form-control" cfpwd="" data-cf-pwd="#new_password"--}}
{{--                                               id="new_password_confirmation" name="new_password_confirmation"--}}
{{--                                               placeholder="Confirm new password" required="">--}}
{{--                                        <label for="new_password_confirmation">Confirm new password</label>--}}
{{--                                        <div class="invalid-feedback">Passwords did not match!</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-12">
                                    <div class="my-3">
                                        <button id="onUpdate()" type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        getProfile();
        async function getProfile(){
            let res=await axios.get("/user-profile")
            
            if (res.status===200 && res.data['status']==='success'){
                let data=res.data['data'];
                document.getElementById('name').value=data["name"];
                document.getElementById('mobile').value=data["mobile"];
                document.getElementById('email').value=data["email"];
                document.getElementById('password').value=data["password"];
            }
            else {
                errorToast(res.data['message'])
            }
        }

        async function onUpdate(){
            let email = document.getElementById('email').value;
            let name = document.getElementById('name').value;
            let mobile = document.getElementById('mobile').value;
            let password = document.getElementById('password').value;

            if (email.length===0){
                errorToast('Enter your email')
            }
            else if(name.length===0){
                errorToast('Name is required')
            }
            else if(mobile.length===0){
                errorToast("Mobile is required")
            }
            else if(password.length===0){
                errorToast("Mobile is required")
            }
            else {
                showLoader();
                let res=await axios.post("/user-profile-update",{
                    email:email,
                    name:name,
                    mobile:mobile,
                    password:password
                })
                hideLoader();
                if (res.status===200 && res.data['status']==='success'){
                    successToast(res.data['messages']);
                    await getProfile();
                    setTimeout(function (){
                        window.location.href='/login'
                    },2000)
                }
                else {
                    errorToast(res.data['messages'])
                }
            }
        }

    </script>
@endsection

