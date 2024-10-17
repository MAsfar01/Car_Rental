@extends('layouts.master_layout')
@section('content')
    <!---------------page content--------------->
    <div class="page-content " id="content">
        <!--heading-->
        <div class="container-fluid">
            <h3 class="text-center font-weight-bold">Welcome To AUTOHAUS</h3>
            <hr>
        </div> <!--container-fluid end-->
        <!--line-->


        <div class="container-fluid">
            <div class="container" style="margin-top:28px;">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-12 d-block">
                        <div class="card">
                            <h5 class="card-header">Total Users</h5>
                            <div class="card-body text-right">
                                <!-- Display total employees here -->
                                {{$totalUsers}} <!-- Replace with actual data -->
                            </div>
                        </div> <!--card end-->
                    </div> <!--col end-->

                    <div class="col-lg-4 col-md-5 col-sm-12 col-12 d-block">
                        <div class="card">
                            <h5 class="card-header">Total Cars</h5>
                            <div class="card-body text-right">
                                <!-- Display total tasks here -->
                                {{$totalCars}}<!-- Replace with actual data -->
                            </div>
                        </div> <!--card end-->
                    </div> <!--col end-->
                    <div class="col-lg-4 col-md-5 col-sm-12 col-12 d-block">
                        <div class="card">
                            <h5 class="card-header">Millage Plans</h5>
                            <div class="card-body text-right">
                                <!-- Display total messages here -->
                                {{$totalPlans}} <!-- Replace with actual data -->
                            </div>
                        </div> <!--card end-->
                    </div> <!--col end-->
                </div> <!--row end-->

            </div> <!--container end-->
        </div> <!--container-fluid end-->
    </div> <!--page-content end-->
@endsection
