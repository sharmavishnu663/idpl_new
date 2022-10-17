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
                        <h3 class="mb-2">Contact Address</h3>
                    </div>
                    <div class="card-tools">
                        <button class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle"
                            style="float: right">Add Contact Address</button>

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
                                                    <th>Office</th>
                                                    <th>Phone No</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Tag</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($addresses as $address)
                                                    <tr>
                                                        <td>{{ $address->office }}
                                                        </td>
                                                        <td>{{ $address->phone_no }}
                                                        </td>
                                                        <td>{{ $address->email }}
                                                        </td>
                                                        <td>{{ $address->address1 }} ,{{ $address->address2 }},
                                                            {{ $address->address3 }}
                                                        </td>
                                                        <td>{{ $address->tag }}
                                                        </td>
                                                        <td> <a class="js-edit-logo" data-bs-toggle="modal"
                                                                href="#editModal" style="cursor:pointer"
                                                                title="edit Contact Address" data-id="{{ @$address->id }}"
                                                                data-office="{{ @$address->office }}"
                                                                data-email="{{ @$address->email }}"
                                                                data-address1="{{ @$address->address1 }}"
                                                                data-address2="{{ @$address->address2 }}"
                                                                data-address3="{{ @$address->address3 }}"
                                                                data-phone_no="{{ @$address->phone_no }}"
                                                                data-tag1="{{ @$address->tag }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                            {{-- <a class="delete-material"
                                                        href="{{ route('delete.office', @$gallary->id) }}"
                                                        data-id="{{ @$office->id }}" title="delete logo"
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
                            <h5 class="modal-title" id="exampleModalToggleLabel">Add Contact Address
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.add.contact.address') }}" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            <div class="modal-body">
                                <label for="maskPhone" class="form-label">Office</label>
                                <input class="form-control mb-2" type="text" placeholder="office" name="office"
                                    required>

                                <label for="maskPhone" class="form-label">Email</label>
                                <input class="form-control mb-2" type="email" placeholder="email" name="email" required>

                                <label for="maskPhone" class="form-label">Phone No</label>
                                <input class="form-control mb-2" type="text" placeholder="phone_no" name="phone_no"
                                    required>

                                <label for="maskPhone" class="form-label">Address1</label>
                                <input class="form-control mb-2" type="text" placeholder="Street number" name="address1"
                                    required>
                                <label for="maskPhone" class="form-label">address2</label>
                                <input class="form-control mb-2" type="text" placeholder="Post and district"
                                    name="address2">
                                <label for="maskPhone" class="form-label">Address3</label>
                                <input class="form-control mb-2" type="text" placeholder="City and state"
                                    name="address3">
                                <label for="maskPhone" class="form-label">Tag</label>
                                <input class="form-control mb-2" type="text" placeholder="tag" name="tag">

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
                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Contact Address
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.edit.contact.address') }}" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="contact_id" id="contact_id">
                            <div class="modal-body">
                                <label for="maskPhone" class="form-label">Office</label>
                                <input class="form-control mb-2" type="text" placeholder="office" name="office"
                                    id="office_id" required>

                                <label for="maskPhone" class="form-label">Email</label>
                                <input class="form-control mb-2" type="email" placeholder="email" name="email"
                                    id="email" required>

                                <label for="maskPhone" class="form-label">Phone No</label>
                                <input class="form-control mb-2" type="text" placeholder="phone_no" name="phone_no"
                                    id="phone_no" required>

                                <label for="maskPhone" class="form-label">Address1</label>
                                <input class="form-control mb-2" type="text" placeholder="Street number"
                                    id="address1" name="address1" required>
                                <label for="maskPhone" class="form-label">address2</label>
                                <input class="form-control mb-2" type="text" placeholder="Post and district"
                                    name="address2" id="address2">
                                <label for="maskPhone" class="form-label">Address3</label>
                                <input class="form-control mb-2" type="text" id="address3"
                                    placeholder="City and state" name="address3">
                                <label for="maskPhone" class="form-label">Tag</label>
                                <input class="form-control mb-2" type="text" placeholder="tag" name="tag"
                                    id="tag1">

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
            var office = $(this).attr('data-office');
            var email = $(this).attr('data-email');
            var phone_no = $(this).attr('data-phone_no');
            var address1 = $(this).attr('data-address1');
            var address2 = $(this).attr('data-address2');
            var address3 = $(this).attr('data-address3');
            var tag = $(this).attr('data-tag1');


            $("#editModal .modal-dialog #contact_id").val(id);
            $("#editModal .modal-dialog #office_id").val(office);
            $("#editModal .modal-dialog #email").val(email);
            $("#editModal .modal-dialog #phone_no").val(phone_no);
            $("#editModal .modal-dialog #address1").val(address1);
            $("#editModal .modal-dialog #address2").val(address2);
            $("#editModal .modal-dialog #address3").val(address3);
            $("#editModal .modal-dialog #tag1").val(tag);



        });
    </script>
@endsection
