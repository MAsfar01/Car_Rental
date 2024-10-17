@extends('layouts.master_layout')
@section('content')
<div class="float-end">
    <button type="button" id="add_btn" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add User
    </button>
</div>

<!---------------page content--------------->
<div class="page-content " id="content">

    <!--heading-->
    <div class="container-fluid">
        <h3 class="ml-4 font-weight-bold">Add Users Details :</h3>
        <hr>
    </div> <!--container-fluid end-->

</div> <!--page-content end-->
<div class="page-content py-1" id="content">
        <div class="container-fluid">
        <div class="container mt-0">
            <div class="col-sm-12 m-auto">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-fixed text-center" id="example">
                        <!--table head-->
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                
                                <th scope="col">Name</th>
                                <th scope="col">email</th>
                                <th scope="col">Added</th>                             
                                
                            </tr>
                        </thead>
                        <!--table body-->
                        <tbody>
                            @foreach ($data_users  as $user )
                                
                            
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    
                                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                                    
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                    
                                </tr>
                                @endforeach
                        </tbody>
                    </table> <!--table end-->
                </div> <!--table-responsive end-->
            </div> <!--col end-->
        </div> <!--container end-->
    </div> <!--container-fluid end-->
</div>
<!-- Modal Structure for Adding a User -->
<div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    @if ($errors->any())
    <script>
        $(document).ready(function(){
            $('#add_modal').modal('show');
        });
    </script>
    @endif
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               
                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('addUser') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!--First-Name-->
                        <div class="col-sm-2 mb-3">
                            <label for="first_name" class="font-weight-bold">
                                First Name <span style="color:red;font-size:10.5pt;">*</span>
                            </label>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <input type="text" class="form-control" placeholder="Enter First name" id="first_name" name="first_name"  >
                        </div>
                        <!--Last-Name-->
                        <div class="col-sm-2 mb-3">
                            <label for="last_name" class="font-weight-bold">
                                Last Name <span style="color:red;font-size:10.5pt;">*</span>
                            </label>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <input type="text" class="form-control" placeholder="Enter Last name" id="last_name" name="last_name">
                        </div>

                        <!--Email ID-->
                        <div class="col-sm-2 mb-3">
                            <label for="email" class="font-weight-bold">
                                Email ID <span style="color:red;font-size:10.5pt;">*</span>
                            </label>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <input type="email" class="form-control" placeholder="Enter the email Id" id="email" name="email">
                        </div>
                        <!--Set Password-->
                        <div class="col-sm-2 mb-3">
                            <label for="password" class="font-weight-bold">
                                Password <span style="color:red;font-size:10.5pt;">*</span>
                            </label>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <input type="password" class="form-control" placeholder="Set the password" id="password" name="password"  >
                        </div>
                        <!--Confirmed Password-->
                        <div class="col-sm-2 mb-3">
                            <label for="password_confirmation" class="font-weight-bold">
                                Confirm Password <span style="color:red;font-size:10.5pt;">*</span>
                            </label>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <input type="password" class="form-control" placeholder="Confirm the password" id="password_confirmation" name="password_confirmation"  >
                        </div>
                    </div> <!--row end-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add User</button>
            </div>
                </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#add_btn').on('click', function(){
            $('#add_modal').modal('show');
        });
    });
</script>
@endsection
