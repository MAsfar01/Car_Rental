@extends('layouts.master_layout')
@section('content')
<div class="float-end">
    <button type="button" id="add_btn" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Mileage Plans
    </button>
</div>

<div class="page-content py-1" id="content">
    <!--heading-->
    <div class="container-fluid">
        <h3 class="ml-4 font-weight-bold">View Millage-Plans|Details :</h3>
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
                                
                                <th scope="col">Name</th>
                                <th scope="col">Added</th>
                               
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <!--table body-->
                        <tbody>
                            @foreach ($data as $plan )
                                
                            
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    
                                    <td>{{$plan->name}}</td>
                                    
                                    <td>{{$plan->created_at}}</td>
                                    <td>
                                        <button type="button" id="btn_edit" class="btn_edit" data-bs-toggle="modal" data-id ="{{$plan->id}}" data-name="{{$plan->name}}"  data-bs-target="#editModal">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <!-- Button to trigger delete modal -->
                                        <button type="button" id="btn_delete" class="btn_delete " data-bs-toggle="modal" data-id="{{$plan->id}}"  data-bs-target="#deleteModal"
                                            >
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

<!-- Modal Structure -->
<div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="mileagePlanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mileagePlanModalLabel">Mileage Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.Plan') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="planName" class="form-label">Plan Name</label>
                        <input type="text" class="form-control" id="planName" name="name" placeholder="Enter plan name" required>
                    </div>
                    <!-- Add more input fields here if needed -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- The submit button should be inside the form -->
                <button type="submit" class="btn btn-primary">Add Plan</button>
            </div>
                </form> <!-- Closing the form here -->
        </div>
    </div>
</div>
<!-- Edit Plan Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.plan') }}" method="post">
                    @csrf
                    <input type="hidden" id="editPlanId" name="id">
                    <div class="mb-3">
                        <label for="editPlanName" class="form-label">Plan Name</label>
                        <input type="text" class="form-control" id="editPlanName" name="name" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Plan</button>
            </div>
                </form>
        </div>
    </div>
</div>
<!-- Delete Plan Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('delete.plan') }}" method="post">
                    @csrf
                    <input type="hidden" id="deletePlanId" name="id">
                    <p>Are you sure you want to delete this plan?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete Plan</button>
            </div>
                </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#add_btn').on('click',function(){
            $('#add_modal').modal('show');
        });
        // Fill the edit modal with plan data
        $('.btn_edit').on('click', function() {
            $('#editPlanId').val($(this).data('id'));
            $('#editPlanName').val($(this).data('name'));
        });
         // Fill the delete modal with plan id
         $('.btn_delete').on('click', function() {
            $('#deletePlanId').val($(this).data('id'));
        });
    });
</script>
@endsection
