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
        <h4 class="error-msg">{{ $errors->first() }}</h4>
    @endif
    <div class="content-wrapper" style="min-height: 1244.06px;">
        <!--//Page Toolbar//-->
        <div class="toolbar p-4 pb-0">
            <div class="position-relative container-fluid px-0">
                <div class="row align-items-center position-relative">
                    <div class="col-md-8 mb-4 mb-md-0">
                        <h3 class="mb-2">Testinomials</h3>


                    </div>
                    <div class="card-tools">
                        <button class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle"
                            style="float: right">Add Testinomial</button>

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
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($userTestinomial as $team)
                                                    <tr>
                                                        <td>{{ $team->name }} </td>

                                                        <td>{{ $team->designation }}

                                                        </td>
                                                        <td>{{ $team->description }}

                                                        </td>
                                                        <td><img src="{{ asset('storage/' . $team->image) }}"
                                                                class="avatar lg rounded-circle me-2 mb-2" alt="">
                                                        </td>

                                                        <td> <a class="js-edit-logo" data-bs-toggle="modal"
                                                                href="#editModal" style="cursor:pointer" title="edit state"
                                                                data-id="{{ @$team->id }}"
                                                                data-name="{{ @$team->name }}"
                                                                data-designation="{{ @$team->designation }}"
                                                                data-description="{{ @$team->description }}"
                                                                data-image="{{ asset('storage/' . $team->image) }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <a class="delete-material"
                                                                href="{{ route('delete.user.testimonial', @$team->id) }}"
                                                                title="delete logo"
                                                                onClick="return  confirm('Are you sure you want to delete ?')"><i
                                                                    class="fa fa-trash-alt"></i></a>
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
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Add Testinomial
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.add.user.testimonial') }}" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            <div class="modal-body">
                                <div class="card-body">
                                    <label for="maskPhone" class="form-label">Name</label>
                                    <input class="form-control mb-2" type="text" placeholder="Name" name="name"
                                        required>
                                    <label for="maskPhone" class="form-label">Designation</label>
                                    <input class="form-control mb-2" type="text" placeholder="designation"
                                        name="designation" required>
                                    <label for="maskPhone" class="form-label">Description</label>
                                    <input class="form-control mb-2" type="text" placeholder="Description"
                                        name="description" required>
                                    <label for="maskPhone" class="form-label">Image</label>
                                    <div class="mb-0">
                                        <input class="form-control" type="file" name="image"
                                            accept="image/png, image/gif, image/jpeg" required>
                                    </div>
                                </div>
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
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Testinomial
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.edit.user.testimonial') }}" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            <div class="modal-body">
                                <div class="card-body">
                                    <input type="hidden" type="hidden" name="id" id="team_id">
                                    <label for="maskPhone" class="form-label">Name</label>
                                    <input class="form-control mb-2" type="text" placeholder="Name" name="name"
                                        id="name" required>
                                    <label for="maskPhone" class="form-label">Position</label>
                                    <input class="form-control mb-2" type="text" placeholder="designation"
                                        name="designation" id="designation" required>
                                    <input class="form-control mb-2" type="text" placeholder="description"
                                        name="description" id="description" required>
                                    {{-- <input class="form-control form-control-lg mb-2" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example"> --}}

                                    <label for="maskPhone" class="form-label">Image</label>
                                    <div class="mb-0">
                                        <input class="form-control" type="file" name="image"
                                            accept="image/png, image/gif, image/jpeg">
                                        <img class="avatar lg rounded-circle me-2 mb-2" alt="" id="team_image">
                                    </div>
                                </div>
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
            var name = $(this).attr('data-name');
            var designation = $(this).attr('data-designation');
            var description = $(this).attr('data-description');
            var image = $(this).attr('data-image');

            $("#editModal .modal-dialog #team_id").val(id);
            $("#editModal .modal-dialog #name").val(name);
            $("#editModal .modal-dialog #designation").val(designation);
            $("#editModal .modal-dialog #description").val(description);
            $("#editModal .modal-dialog #team_image").attr("src", image);

        });
    </script>
@endsection
