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
                        <h3 class="mb-2">Resumes</h3>
                    </div>
                    {{-- <div class="card-tools">
                        <button class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle"
                            style="float: right">Add Job</button>

                    </div> --}}
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
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Department</th>
                                                    <th>Location</th>
                                                    <th>Position</th>
                                                    <th>Resume</th>
                                                    {{-- <th>Action</th> --}}

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($resumes as $resume)
                                                    <tr>
                                                        <td>{{ $resume->first_name }} {{ $resume->last_name }}
                                                        </td>
                                                        <td>{{ $resume->email }}
                                                        </td>
                                                        <td>{{ $resume->mobile }}
                                                        </td>
                                                        <td>{{ $resume->department }}
                                                        </td>
                                                        <td>{{ $resume->location }}
                                                        </td>

                                                        <td>{{ $resume->position }}
                                                        </td>
                                                        <td>
                                                            @if ($resume->resume)
                                                                <a href="{{ asset('storage/' . $resume->resume) }}"
                                                                    target="_blank"> Resume </a>
                                                            @endif
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
        @endsection
