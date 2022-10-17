@extends('Common.app')
<!-- Content Wrapper. Contains page content -->

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            {{-- <button type="button" class="close" data-dismiss="alert">×</button> --}}
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
                        <h3 class="mb-2">Corporate</h3>


                    </div>
                    @if (!$corporate)
                        <div class="card-tools">
                            <button class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle"
                                style="float: right">Add corporate</button>

                        </div>
                    @endif
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
                                                    <th>FIle</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($corporate)
                                                    <tr>
                                                        <td>{{ $corporate->title }}
                                                        </td>
                                                        <td><a href="{{ $corporate->file_name }}" target="_blank">
                                                                View File</a>
                                                        </td>

                                                        <td> <a class="js-edit-logo" data-bs-toggle="modal"
                                                                href="#editModal" style="cursor:pointer"
                                                                title="edit corporate" data-id="{{ @$corporate->id }}"
                                                                data-title="{{ $corporate->title }}"><i
                                                                    class="fa fa-edit"></i></a>

                                                        </td>
                                                    </tr>
                                                @endif


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
                            <h5 class="modal-title" id="exampleModalToggleLabel">Add Corporate File
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.add.corporate') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="modal-body">
                                <div class="card-body">

                                    {{-- <input class="form-control form-control-lg mb-2" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example"> --}}

                                    <h6>File Title</h6>
                                    <div class="mb-0">
                                        <input class="form-control" type="text" name="title" required>
                                    </div>
                                    <h6>File Input</h6>
                                    <div class="mb-0">
                                        <input class="form-control" type="file" name="file_name"
                                            accept=".excel,.pdf,.doc,.docx,.xlsx,.xls" required>
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
                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Corporate File
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.edit.corporate') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="modal-body">
                                <div class="card-body">
                                    <input type="hidden" name="id" id="corporate_id">

                                    <h6>File Title</h6>
                                    <div class="mb-0">
                                        <input class="form-control" type="text" name="title" id="title" required>
                                    </div>
                                    <h6>File Input</h6>
                                    <div class="mb-0">
                                        <input class="form-control" type="file" name="file_name"
                                            accept=".excel,.pdf,.doc,.docx,.xlsx,.xls">
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
        <!-- /.content -->
    </div>
    <script src="{{ asset('../login/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        $(".js-edit-logo").on('click', function(e) {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');

            $("#editModal .modal-dialog #corporate_id").val(id);
            $("#editModal .modal-dialog #title").val(title);
            // $("#editModal .modal-dialog #gallary_image").attr("src", image);

        });
    </script>
@endsection
