@extends('layouts.master')

@section('title') Add User @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Add User   @endslot
        @slot('title_li') Welcome, Add a new User   @endslot
    @endcomponent

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Recent Packages</h4>

                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="white-box">
                                <p style="text-align: center; background-color: #E12D4F; color: #fff; padding: 1%; letter-spacing: 5px; font-weight: bold;">SENDER INFORMATION</p>
                                <hr />
                                <form class="form-horizontal form-material" method="post" action="{{ url('submit-package') }}" enctype="multipart/form-data">
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-12">Sender Fullname <small id="ast" style="color: red;">*</small></label>
                                        <div class="col-md-12">
                                            <input type="text" name="sender_fullname" placeholder="Johnathan Doe" class="form-control form-control-line" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Sender Email <small id="ast" style="color: red;">*</small></label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="sender_email" id="example-email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Sender Phone No <small>(Optional)</small></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="123 456 7890" name="sender_phone" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Sender Current Address <small>(Optional)</small></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Address" name="sender_address" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Sender Country <small>(Optional)</small></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Country" name="sender_country" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Sender State <small>(Optional)</small></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="State" name="sender_state" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Zip Code <small>(Optional)</small></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Zip Code" name="sender_zip_code" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Secret Question <small id="ast" style="color: red;">*</small></label>
                                        <input type="text" name="secret_question" class="form-control form-control-line" required>
                                    </div>

                                    <p style="text-align: center; background-color: #E12D4F; color: #fff; padding: 1%; letter-spacing: 5px; font-weight: bold;">RECEIVER INFORMATION</p>

                                    <div class="form-group" style="margin-top: 4%;">
                                        <label class="col-md-12">Receiver Fullname <small id="ast" style="color: red;">*</small></label>
                                        <div class="col-md-12">
                                            <input type="text" name="receiver_fullname" placeholder="Johnathan Doe" class="form-control form-control-line" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Receiver Email <small id="ast" style="color: red;">*</small></label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="receiver_email" id="example-email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Receiver Phone No <small>(Optional)</small></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="123 456 7890" class="form-control form-control-line" name="receiver_phone"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Current Address <small>(Optional)</small></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Address" name="receiver_address" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Receiver Country <small>(Optional)</small></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Country" name="receiver_country" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Receiver State <small>(Optional)</small></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="State" name="receiver_state" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Receiver Zip Code <small>(Optional)</small></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Zip Code" name="receiver_zip_code" class="form-control form-control-line"> </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Secret Question Answer <small id="ast" style="color: red;">*</small></label>
                                        <input type="text" name="secret_answer" class="form-control form-control-line" required>
                                    </div>

                                    <p style="text-align: center; background-color: #E12D4F; color: #fff; padding: 1%; letter-spacing: 5px; font-weight: bold;">PACKAGE INFORMATION</p>

                                    <div class="form-group" STYLE="margin-top: 4%;">
                                        <label class="col-md-12">Package Description <small id="ast" style="color: red;">*</small></label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" name="package_description"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Package type <small id="ast" style="color: red;"></small></label>
                                        <div class="col-md-12">
                                            <input type="text" name="package_type" class="form-control form-control-line">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Duration <small id="ast" style="color: red;"></small></label>
                                        <div class="col-md-12">
                                            <input type="text" name="duration" class="form-control form-control-line" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Time Initiated <small id="ast" style="color: red;">*</small></label>
                                        <div class="col-md-12">
                                            <input type="text" name="time_initiated" class="form-control form-control-line"  required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Package Image <small>(Optional)</small></label>
                                        <div class="col-sm-12">
                                            <input type="file" name="image" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group" align="center">
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary" type="submit" name="submit">Create User and Get Tracking Code</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')
    <!-- plugin js -->
    <script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- jquery.vectormap map -->
    <script src="{{ URL::asset('libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>

    <!-- Calendar init -->
    <script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>
@endsection
