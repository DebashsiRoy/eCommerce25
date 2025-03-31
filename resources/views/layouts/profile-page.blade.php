@extends('layouts.app')
@section('content')
    <section class="my-account container">
        <h2 class="page-title">Addresses</h2>
        <div class="row">
            {{--      Start user dashboard nsv menu--}}
            @include('frontend.components.user-details')
            {{--    end user dashboard nsv menu--}}
            <div class="col-lg-9">
                <div class="page-content my-account__address">
                    <div class="row">
                        <div class="col-6">
                            <p class="notice">The following addresses will be used on the checkout page by default.</p>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                        </div>
                    </div>
                    <div class="my-account__address-list row">
                        <h5>Shipping Address</h5>

                        <div class="my-account__address-item col-md-6">
                            <div class="my-account__address-item__title">
                                <h5>Sudhir Kumar <i class="fa fa-check-circle text-success"></i></h5>
                                <a href="#">Edit</a>
                            </div>
                            <div class="my-account__address-item__detail">
                                <p>Flat No - 13, R. K. Wing - B</p>
                                <p>ABC, DEF</p>
                                <p>GHJ, </p>
                                <p>Near Sun Temple</p>
                                <p>000000</p>
                                <br>
                                <p>Mobile : 1234567891</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                        <form name="account_edit_form" action="#" method="POST" class="needs-validation" novalidate="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" placeholder="Mobile Number" name="mobile" value=""
                                               required="">
                                        <label for="mobile">Mobile Number</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="email" class="form-control" placeholder="Email Address" name="email" value=""
                                               required="">
                                        <label for="account_email">Email Address</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
