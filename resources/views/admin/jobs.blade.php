@extends('Common.app')
<!-- Content Wrapper. Contains page content -->

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif
    <div class="content-wrapper" style="min-height: 1244.06px;">
        <!--//Page Toolbar//-->
        <div class="toolbar p-4 pb-0">
            <div class="position-relative container-fluid px-0">
                <div class="row align-items-center position-relative">
                    <div class="col-md-8 mb-4 mb-md-0">
                        <h3 class="mb-2">Jobs</h3>
                    </div>
                    <div class="card-tools">
                        <button class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle"
                            style="float: right">Add Job</button>

                    </div>
                </div>
            </div>
        </div>
        <!--//Page Toolbar End//-->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="content p-4 d-flex flex-column-fluid">

                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table mt-0 table-striped table-card table-nowrap">
                                            <thead class="text-uppercase small text-muted">
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Department</th>
                                                    <th>Location</th>
                                                    <th>Role</th>
                                                    <th>Description</th>
                                                    <th>Job Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jobs as $job)
                                                    <tr>
                                                        <td>{{ $job->title }}
                                                        </td>
                                                        <td>{{ $job->department }}
                                                        </td>
                                                        <td>{{ $job->location }}
                                                        </td>
                                                        <td>{{ $job->role }}
                                                        </td>
                                                        <td>{{ $job->description }}
                                                        </td>
                                                        <td>{{ $job->status ? 'Open' : 'Close' }}
                                                        </td>
                                                        <td> <a class="js-edit-logo" data-bs-toggle="modal"
                                                                href="#editModal" style="cursor:pointer" title="edit state"
                                                                data-id="{{ @$job->id }}"
                                                                data-title="{{ @$job->title }}"
                                                                data-department="{{ @$job->department }}"
                                                                data-location="{{ @$job->location }}"
                                                                data-role="{{ @$job->role }}"
                                                                data-description="{{ @$job->description }}"
                                                                data-status="{{ @$job->status }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                            {{-- <a class="delete-material"
                                                                href="{{ route('delete.job', @$job->id) }}"
                                                                title="delete logo"
                                                                onClick="return  confirm('Are you sure you want to delete ?')"><i
                                                                    class="fa fa-trash-alt"></i></a> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>

            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Add Job
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.add.job') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="modal-body">
                                <label for="maskPhone" class="form-label">Title</label>
                                <input class="form-control mb-2" type="text" placeholder="title" name="title" required>

                                <label for="maskPhone" class="form-label">Department</label>
                                <input class="form-control mb-2" type="text" placeholder="Department" name="department"
                                    required>

                                <label for="maskPhone" class="form-label">Location</label>
                                <input class="form-control mb-2" type="text" placeholder="location" name="location"
                                    required>

                                <label for="maskPhone" class="form-label">Role</label>
                                <select class="form-control mb-2" name="role" required>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                </select>

                                <label for="maskPhone" class="form-label">Description</label>
                                <textarea class="form-control mb-2" placeholder="description" name="description" required> </textarea>

                                <label for="maskPhone" class="form-label">Status</label>
                                <select class="form-control mb-2" name="status" required>
                                    <option value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>


                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="editModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Job
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.edit.job') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="id" id="job_id">
                            <div class="modal-body">
                                <label for="maskPhone" class="form-label">Title</label>
                                <input class="form-control mb-2" type="text" placeholder="title" name="title"
                                    id="title" required>

                                <label for="maskPhone" class="form-label">Department</label>
                                <input class="form-control mb-2" type="text" placeholder="Department"
                                    name="department" id="department" required>

                                <label for="maskPhone" class="form-label">Location</label>
                                <input class="form-control mb-2" type="text" placeholder="location" name="location"
                                    id="location" required>

                                <label for="maskPhone" class="form-label">Role</label>
                                <select class="form-control mb-2" name="role" id="role" required>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                </select>

                                <label for="maskPhone" class="form-label">Description</label>
                                <textarea class="form-control mb-2" placeholder="description" name="description" id="description"> </textarea>

                                <label for="maskPhone" class="form-label">Status</label>
                                <select class="form-control mb-2" name="status" id="status" required>
                                    <option value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>


                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




        </section>
    </div>
    <script src="{{ asset('../login/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        $(".js-edit-logo").on('click', function(e) {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var department = $(this).attr('data-department');
            var location = $(this).attr('data-location');
            var role = $(this).attr('data-role');
            var description = $(this).attr('data-description');
            var status = $(this).attr('data-status');


            $("#editModal .modal-dialog #job_id").val(id);
            $("#editModal .modal-dialog #title").val(title);
            $("#editModal .modal-dialog #department").val(department);
            $("#editModal .modal-dialog #location").val(location);
            $("#editModal .modal-dialog #description").val(description);
            $('#editModal .modal-dialog #role option[value="' + role + '"]').attr("selected",
                "selected");
            $('#editModal .modal-dialog #status option[value="' + status + '"]').attr("selected",
                "selected");



        });
    </script>
@endsection
