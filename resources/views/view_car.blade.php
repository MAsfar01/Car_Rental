@extends('layouts.master_layout')
@section('content')
    <div class="page-content py-1" id="content">
        <!--heading-->
        <div class="container-fluid">
            <h3 class="ml-4 font-weight-bold">View Car Details :</h3>
        </div> <!--container-fluid end-->

        <!--line-->
        <div class="line mt-2"></div>
        <div class="container-fluid">
            <div class="container mt-0">
                <div class="col-sm-12 m-auto">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-fixed text-center" id="example">
                            <!--table head-->
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Car Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Added At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <!--table body-->
                            <tbody>
                                @foreach ($cars as $car)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('images/Car-pics/' . $car->image) }}" alt="Car Image"
                                                style="width:50px;height:50px;"></td>
                                        <td>{{ $car->name }}</td>
                                        <td>{{ $car->model }}</td>
                                        <td>{{ $car->brand }}</td>
                                        <td>{{ $car->price }}</td>
                                        <td>{{ $car->color }}</td>
                                        <td>{{ $car->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <button type="button" id="btn_edit" class="btn_edit" data-bs-toggle="modal"
                                                data-bs-target="#modal_edit" data-car_id="{{ $car->id }}"
                                                data-name="{{ $car->name }}" data-model="{{ $car->model }}"
                                                data-brand="{{ $car->brand }}" data-price="{{ $car->price }}"
                                                data-color="{{ $car->color }}">
                                                <i class="far fa-edit"></i>
                                            </button>
                                            <!-- Button to trigger delete modal -->
                                            <button type="button" id="btn_delete" class="btn_delete " data-bs-toggle="modal"
                                                data-bs-target="#modal_delete" data-car_id="{{ $car->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> <!--table end-->
                    </div> <!--table-responsive end-->
                </div> <!--col end-->
            </div> <!--container end-->
        </div> <!--container-fluid end-->
    </div>
    <!--edit modal-->
    <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="modal_edit_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_edit_label">Edit Car</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('car.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" id="edit_car_id" name="car_id">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="car_name" class="form-label">Car Name</label>
                                <input type="text" class="form-control" id="car_name" name="name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="car_model" class="form-label">Model</label>
                                <input type="text" class="form-control" id="car_model" name="model">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="car_brand" class="form-label">Brand</label>
                                <input type="text" class="form-control" id="car_brand" name="brand">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="car_price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="car_price" name="price">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="car_color" class="form-label">Color</label>
                                <input type="text" class="form-control" id="car_color" name="color">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="modal_delete" tabindex="-1" aria-labelledby="modal_delete_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_delete_label">Delete Car</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this car?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('car.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" id="delete_car_id" name="car_id">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            $('.btn_edit').on('click', function() {
                $('#modal_edit').modal('show');
            });
        });
    </script>
    <script>
        $('.btn_delete').on('click', function() {
            $('#delete_car_id').val($(this).data('car_id'));
        });

    </script>
    <script>
        $(document).ready(function() {
    $('.btn_edit').on('click', function() {
        var car_id = $(this).data('car_id');
        var name = $(this).data('name');
        var model = $(this).data('model');
        var brand = $(this).data('brand');
        var price = $(this).data('price');
        var color = $(this).data('color');

        $('#edit_car_id').val(car_id);
        $('#car_name').val(name);
        $('#car_model').val(model);
        $('#car_brand').val(brand);
        $('#car_price').val(price);
        $('#car_color').val(color);
    });
});


    </script>
@endsection
