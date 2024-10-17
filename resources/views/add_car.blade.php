@extends('layouts.master_layout')
@section('content')
    <div class="page-content" id="content">
        <!--heading-->
        <div class="container-fluid">
            <h3 class="ml-4 font-weight-bold">Add Car Details :</h3>
            <hr>
        </div>

        <div class="container-fluid">
            <div class="container mt-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-sm-11 m-auto">
                    <form id="form_add_car" method="post" action="{{ route('add_car')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Car Name -->
                            <div class="col-sm-2 mb-3">
                                <label for="car_name" class="font-weight-bold">
                                    Car Name <span style="color:red;font-size:10.5pt;">*</span>
                                </label>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <input type="text" class="form-control" placeholder="Enter Car Name" id="car_name" name="name" autocomplete="off">
                            </div>

                            <!-- Car Model -->
                            <div class="col-sm-2 mb-3">
                                <label for="car_model" class="font-weight-bold">
                                    Car Model <span style="color:red;font-size:10.5pt;">*</span>
                                </label>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <input type="text" class="form-control" placeholder="Enter Car Model" id="car_model" name="model" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Car Brand -->
                            <div class="col-sm-2 mb-3">
                                <label for="car_brand" class="font-weight-bold">
                                    Car Brand <span style="color:red;font-size:10.5pt;">*</span>
                                </label>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <input type="text" class="form-control" placeholder="Enter Car Brand" id="car_brand" name="brand" autocomplete="off">
                            </div>

                            <!-- Car Price -->
                            <div class="col-sm-2 mb-3">
                                <label for="car_price" class="font-weight-bold">
                                    Car Price <span style="color:red;font-size:10.5pt;">*</span>
                                </label>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <input type="text" class="form-control" placeholder="Enter Car Price" id="car_price" name="price" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Car Color -->
                            <div class="col-sm-2 mb-3">
                                <label for="car_color" class="font-weight-bold">
                                    Car Color <span style="color:red;font-size:10.5pt;">*</span>
                                </label>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <input type="text" class="form-control" placeholder="Enter Car Color" id="car_color" name="color" autocomplete="off">
                            </div>
                            <!-- Car Image -->
                            <div class="col-sm-2 mb-3">
                                <label for="car_image" class="font-weight-bold">
                                    Car Image <span style="color:red;font-size:10.5pt;">*</span>
                                </label>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <input type="file" class="form-control-file" id="car_image" name="image">
                            </div>

                            
                        </div>

                        <div class="col-sm-6 text-right mt-2 mb-4">
                            <button type="submit" name="submit" id="btn_save">Save</button>
                            <button type="button" id="btn_reset_form">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
