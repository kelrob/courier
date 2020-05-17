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

                    <div class="table-responsive">
                        <table class="table table-centered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tracking ID .</th>
                                <th scope="col">Package Type</th>
                                <th scope="col">Status</th>
                                <th scope="col" colspan="2">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($packages as $package)
                                    <tr>
                                        <td>{{ $package->id }}</td>
                                        <td>
                                            <a href="#" class="text-body font-weight-medium">{{ $package->tracking_key }}</a>
                                        </td>
                                        <td>{{ $package->package_type }}</td>
                                        <td> <small><i class="fa fa-circle"></i></small> {{ ucwords($package->status) }}</td>
                                        <td><a href="package-details?id={{$package->id}}" class="btn btn-primary btn-sm">See More</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


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
