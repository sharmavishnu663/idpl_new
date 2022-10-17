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
                        <h3 class="mb-2">User Counts</h3>
                    </div>
                    @if (!$userCount)
                        <div class="card-tools">
                            <button class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle"
                                style="float: right">Add Details</button>

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
                                                    <th>Website Users</th>
                                                    <th>Page Views</th>
                                                    <th>Website Video</th>
                                                    <th>Youtube Subscriber</th>
                                                    <th>Youtube Video</th>
                                                    <th>Social Followers</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($userCount)
                                                    <tr>
                                                        <td>{{ $userCount->website_user }}
                                                        </td>
                                                        <td>{{ $userCount->page_views }}
                                                        </td>
                                                        <td>{{ $userCount->website_video }}
                                                        </td>
                                                        <td>{{ $userCount->youtube_subscriber }}
                                                        </td>
                                                        <td>{{ $userCount->youtube_video }}
                                                        </td>
                                                        <td>{{ $userCount->social_followers }}
                                                        </td>
                                                        <td> <a class="js-edit-logo" data-bs-toggle="modal"
                                                                href="#editModal" style="cursor:pointer" title="edit state"
                                                                data-id="{{ @$userCount->id }}"
                                                                data-website_user="{{ @$userCount->website_user }}"
                                                                data-page_views="{{ @$userCount->page_views }}"
                                                                data-website_video="{{ @$userCount->website_video }}"
                                                                data-youtube_subscriber="{{ @$userCount->youtube_subscriber }}"
                                                                data-youtube_video="{{ @$userCount->youtube_video }}"
                                                                data-social_followers="{{ @$userCount->social_followers }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                            {{-- <a class="delete-material"
                                                        href="{{ route('delete.office', @$gallary->id) }}"
                                                        data-id="{{ @$office->id }}" title="delete logo"
                                                        onClick="return  confirm('Are you sure you want to delete ?')"><i
                                                            class="fa fa-trash-alt"></i></a> --}}
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
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Details
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.add.user.counts') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="modal-body">
                                <label for="maskPhone  allow_numeric" class="form-label">Website Users Per Month</label>
                                <input class="form-control mb-2 allow_numeric" type="text"
                                    placeholder="Website Users Per Month" name="website_user" required>
                                <label for="maskPhone  allow_numeric" class="form-label">Page Views Per Month</label>
                                <input class="form-control mb-2 allow_numeric" type="text"
                                    placeholder="Page Views Per Month" name="page_views" required>
                                <label for="maskPhone  allow_numeric" class="form-label">Website Videos View Per
                                    Month</label>
                                <input class="form-control mb-2 allow_numeric" type="text"
                                    placeholder="Website Videos View Per" name="website_video" required>
                                <label for="maskPhone  allow_numeric" class="form-label">Youtube Subscribers</label>
                                <input class="form-control mb-2 allow_numeric" type="text"
                                    placeholder="Youtube Subscribers" name="youtube_subscriber" required>
                                <label for="maskPhone" class="form-label">Youtube Video views</label>
                                <input class="form-control mb-2 allow_numeric" type="text"
                                    placeholder="Youtube Video views" name="youtube_video" required>
                                <label for="maskPhone" class="form-label">Social Followers</label>
                                <input class="form-control mb-2 allow_numeric" type="text" placeholder="Social Followers"
                                    name="social_followers" required>


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
                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit User Count
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.edit.user.counts') }}" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="id" id="count_id">
                            <div class="modal-body">
                                <label for="maskPhone" class="form-label">Website Users Per Month</label>
                                <input class="form-control mb-2 allow_numeric" type="text"
                                    placeholder="Website Users Per Month" name="website_user" id="website_user" required>
                                <label for="maskPhone" class="form-label">Page Views Per Month</label>
                                <input class="form-control mb-2 allow_numeric" type="text"
                                    placeholder="Page Views Per Month" name="page_views" id="page_views" required>
                                <label for="maskPhone" class="form-label">Website Videos View Per Month</label>
                                <input class="form-control mb-2 allow_numeric" type="text"
                                    placeholder="Website Videos View Per Month" name="website_video" id="website_video"
                                    required>
                                <label for="maskPhone" class="form-label">Youtube Subscribers</label>
                                <input class="form-control mb-2 allow_numeric" type="text"
                                    placeholder="Youtube Subscribers" name="youtube_subscriber" id="youtube_subscriber"
                                    required>
                                <label for="maskPhone" class="form-label">Youtube Video views</label>
                                <input class="form-control mb-2 allow_numeric" type="text"
                                    placeholder="Youtube Video views" name="youtube_video" id="youtube_video" required>
                                <label for="maskPhone" class="form-label">Social Followers</label>
                                <input class="form-control mb-2 allow_numeric" type="text"
                                    placeholder="Social Followers" name="social_followers" id="social_followers"
                                    required>
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
    <script src="{{ asset('/login/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        $(".js-edit-logo").on('click', function(e) {
            var id = $(this).attr('data-id');
            var website_user = $(this).attr('data-website_user');
            var page_views = $(this).attr('data-page_views');
            var website_video = $(this).attr('data-website_video');
            var youtube_subscriber = $(this).attr('data-youtube_subscriber');
            var youtube_video = $(this).attr('data-youtube_video');
            var social_followers = $(this).attr('data-social_followers');

            $("#editModal .modal-dialog #count_id").val(id);
            $("#editModal .modal-dialog #website_user").val(website_user);
            $("#editModal .modal-dialog #page_views").val(page_views);
            $("#editModal .modal-dialog #website_video").val(website_video);
            $("#editModal .modal-dialog #youtube_subscriber").val(youtube_subscriber);
            $("#editModal .modal-dialog #youtube_video").val(youtube_video);
            $("#editModal .modal-dialog #social_followers").val(social_followers);


        });
    </script>
    <script>
        $(".allow_numeric").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });
    </script>
@endsection
