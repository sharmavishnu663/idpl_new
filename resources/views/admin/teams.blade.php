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
                        <h3 class="mb-2">Teams</h3>


                    </div>
                    <div class="card-tools">
                        <button class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle"
                            style="float: right">Add Team</button>

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
                                                    <th>Position</th>
                                                    <th>Image</th>
                                                    <th>LinkedIn Link</th>
                                                    <th>Twitter Link</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($teams as $team)
                                                    <tr>
                                                        <td>{{ $team->name }} </td>

                                                        <td>{{ $team->positions }}

                                                        </td>
                                                        <td><img src="{{ asset('storage/' . $team->profile_image) }}"
                                                                class="avatar lg rounded-circle me-2 mb-2" alt="">
                                                        </td>
                                                        <td>{{ $team->linked_link }}

                                                        </td>
                                                        <td>{{ $team->twitter_link }}

                                                        </td>

                                                        <td> <a class="js-edit-logo" data-bs-toggle="modal"
                                                                href="#editModal" style="cursor:pointer" title="edit state"
                                                                data-id="{{ @$team->id }}"
                                                                data-name="{{ @$team->name }}"
                                                                data-position="{{ @$team->positions }}"
                                                                data-linked_link="{{ @$team->linked_link }}"
                                                                data-twitter_link="{{ @$team->twitter_link }}"
                                                                data-image="{{ asset('storage/' . $team->profile_image) }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <a class="delete-material"
                                                                href="{{ route('delete.team', @$team->id) }}"
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
                            <h5 class="modal-title" id="exampleModalToggleLabel">Add Team
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.add.team') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="modal-body">
                                <div class="card-body">
                                    <label for="maskPhone" class="form-label">Name</label>
                                    <input class="form-control mb-2" type="text" placeholder="Name" name="name"
                                        required>
                                    <label for="maskPhone" class="form-label">Position</label>
                                    <input class="form-control mb-2" type="text" placeholder="position" name="positions"
                                        required>
                                    <label for="maskPhone" class="form-label">Linked Link</label>
                                    <input class="form-control mb-2" type="url" placeholder="Linked Link"
                                        name="linked_link" required>
                                    <label for="maskPhone" class="form-label">Twitter Link</label>
                                    <input class="form-control mb-2" type="url" placeholder="Twitter Link"
                                        name="twitter_link" required>
                                    {{-- <input class="form-control form-control-lg mb-2" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example"> --}}

                                    <label for="maskPhone" class="form-label">Image</label>
                                    <div class="mb-0">
                                        <input class="form-control" type="file" name="profile_image"
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
                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Team
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.edit.team') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="modal-body">
                                <div class="card-body">
                                    <input type="hidden" type="hidden" name="team_id" id="team_id">
                                    <label for="maskPhone" class="form-label">Name</label>
                                    <input class="form-control mb-2" type="text" placeholder="Name" name="name"
                                        id="name" required>
                                    <label for="maskPhone" class="form-label">Position</label>
                                    <input class="form-control mb-2" type="text" placeholder="position"
                                        name="positions" id="position" required>
                                    <label for="maskPhone" class="form-label">Linked Link</label>
                                    <input class="form-control mb-2" type="url" placeholder="Linked Link"
                                        name="linked_link" id="linked_link" required>
                                    <label for="maskPhone" class="form-label">Twitter Link</label>
                                    <input class="form-control mb-2" type="url" placeholder="Twitter Link"
                                        name="twitter_link" id="twitter_link" required>
                                    {{-- <input class="form-control form-control-lg mb-2" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example"> --}}

                                    <label for="maskPhone" class="form-label">Image</label>
                                    <div class="mb-0">
                                        <input class="form-control" type="file" name="profile_image"
                                            accept="image/png, image/gif, image/jpeg">
                                        <img src="{{ asset('storage/' . $team->profile_image) }}"
                                            class="avatar lg rounded-circle me-2 mb-2" alt="" id="team_image">
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
            var position = $(this).attr('data-position');
            var image = $(this).attr('data-image');
            var linked_link = $(this).attr('data-linked_link');
            var twitter_link = $(this).attr('data-twitter_link');

            $("#editModal .modal-dialog #team_id").val(id);
            $("#editModal .modal-dialog #name").val(name);
            $("#editModal .modal-dialog #position").val(position);
            $("#editModal .modal-dialog #linked_link").val(linked_link);
            $("#editModal .modal-dialog #twitter_link").val(twitter_link);
            $("#editModal .modal-dialog #team_image").attr("src", image);

        });
    </script>
@endsection
