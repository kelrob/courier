@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Dashboard   @endslot
        @slot('title_li') Welcome to PGE Dashboard   @endslot
    @endcomponent

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Recent Packages</h4>
                    <div class="row" style="border: 1px solid #e6e6e6">
                        <div class="col-md-12" style="padding: 1%; background-color: #fff;">
                            <h5 style="font-weight: 500; ">SHIPPING DETAILS</h5>
                        </div>
                        <div class="col-md-12" style="padding: 1%; background-color: #F5F5F5;">
                            <div class="row">
                                <div class="col-md-5">
                                    <table class="table" style="font-weight: 500;">
                                        <tr>
                                            <td>Package Id</td>
                                            <td>PID{{$detail->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>{{ucwords($detail->status)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Date Initiated</td>
                                            <td>{{ $detail->time_initiated }}</td>
                                        </tr>
                                        <tr>
                                            <td>Package Type</td>
                                            <td>{{ $detail->package_type }}</td>
                                        </tr>
                                        <tr>
                                            <td>Package Duration</td>
                                            <td>{{ $detail->duration}}</td>
                                        </tr>
                                        <tr>
                                            <td>Current Location</td>
                                            <td>{{ $detail->sender_address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Package Description</td>
                                            <td>{{ $detail->package_description }}</td>
                                        </tr>
                                        <tr>
                                            @if($detail->package_image != null)
                                                <td><img src="img/packages/{{ $detail->package_image }}" class="img-fluid"/>
                                                </td>
                                            @else
                                                <td>No Image</td>
                                            @endif
                                        </tr>
                                    </table>
                                </div>

                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-12" style="background-color: #E6E6E6;">
                                            <h5 style="font-weight: 500;" class="text-center">FROM</h5>
                                        </div>
                                        <div class="col-md-12" style="background-color: #FFF; padding: 4%;">
                                            <p style="font-weight: 500;" class="text-center">h</p>
                                            <hr style="margin: 0;"/>
                                            <p style="margin-top: 4%;">
                                                <b>Sender Phone</b> <br/>
                                                {{ $detail->sender_phone }} <br/><br/>

                                                <b>Sender Address</b> <br/>
                                                {{ $detail->sender_address }} <br/><br/>

                                                <b>Sender State</b> <br/>
                                                {{$detail->sender_state}} <br/><br/>

                                                <b>Sender Zip Code</b> <br/>
                                                {{ $detail->sender_zip_code}} <br/><br/>

                                                <b>Sender Country</b> <br/>
                                                {{$detail->sender_country}} <br/><br/>

                                                <b>Secret Question</b> <br/>
                                                {{ $detail->secret_question }}<br/><br/>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3" style="margin-left: 3%;">
                                    <div class="row">
                                        <div class="col-md-12" style="background-color: #E6E6E6;">
                                            <h5 style="font-weight: 500;" class="text-center">TO</h5>
                                        </div>
                                        <div class="col-md-12" style="background-color: #FFF; padding: 4%;">
                                            <p style="font-weight: 500;" class="text-center">i</p>
                                            <hr style="margin: 0;"/>
                                            <p style="margin-top: 4%;">
                                                <b>Receiver Phone</b> <br/>
                                                {{ $detail->receiver_phone }} <br/><br/>

                                                <b>Receiver Address</b> <br/>
                                                {{ $detail->receiver_address }} <br/><br/>

                                                <b>Receiver State</b> <br/>
                                                {{ $detail->receiver_phone }} <br/><br/>

                                                <b>Receiver Zip Code</b> <br/>
                                                {{ $detail->receiver_zip_Code }} <br/><br/>

                                                <b>Receiver Country</b> <br/>
                                                {{$detail->receiver_country}} <br/><br/>

                                                <b>Secret Answer</b> <br/>
                                                {{ $detail->receiver_answer }} <br/><br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row" align="center" style="padding: 2%;">
                        <div class="col-md-12">
                            <a class="btn btn-primary text-white" data-toggle="modal" data-target="#myModal">Change
                                Location / Status</a>
                            &nbsp;&nbsp;
                            <a href="package/delete/{{ $detail->id }}" class="btn btn-danger">Delete Package</a>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" style="font-weight: 500;">Change Status and Current
                                    Location</h5>
                            </div>
                            <div class="modal-body">
                                <form id="packageForm">
                                    <div class="form-group">
                                        <label for="change_status">ChangeStaus</label>
                                        <select name="status" id="change_status" class="form-control">
                                            <option value="Pending">Pending</option>
                                            <option value="Clearing">Clearing</option>
                                            <option value="Checking">Checking</option>
                                            <option value="On Hold">On Hold</option>
                                            <option value="In Transit">In Transit</option>
                                            <option value="Delivered and Received">Delivered and Received</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Current Location</label>
                                        <input type="text" value="{{$detail->sender_address}}" name="sender_address"
                                               class="form-control">
                                    </div>
                                    <div class="form-group" align="center">
                                        <button type="submit" class="btn btn-primary" onclick="updatePackage()">Update Location and Status <i
                                                class="mdi mdi-loading mdi-spin" id="spinner" style="display: none;"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endsection

            @section('script')
                <!-- plugin js -->
                    <script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script>

                    <!-- jquery.vectormap map -->
                    <script src="{{ URL::asset('libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>

                    <!-- Calendar init -->
                    <script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>

                <!-- Page Javascript -->
                    <script>
                        $("#packageForm").unbind('submit').on('submit', (function(e) {
                            e.preventDefault();
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                url: "package/edit/{{$detail->id}}",
                                data: new FormData(this),
                                contentType: false,
                                cache: false,
                                processData: false,
                                beforeSend: function () {
                                    $('#spinner').show();
                                    $('button').attr('disabled', true);
                                },
                                success: function (data) {
                                    if (data) {
                                        $('#spinner').hide();
                                        $('button').removeAttr('disabled');
                                        location.reload();
                                    }
                                }
                            });
                        }));

                    </script>
@endsection
