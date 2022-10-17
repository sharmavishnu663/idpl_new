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
                        <h3 class="mb-2">Products</h3>


                    </div>
                    <div class="card-tools">
                        <button class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle"
                            style="float: right">Add Products</button>

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
                                                    <th>Category</th>
                                                    <th>Name</th>
                                                    <th>Theme</th>
                                                    <th>Logo</th>
                                                    <th>Description</th>
                                                    <th>Play Store Link</th>
                                                    <th>Play Store Rate</th>
                                                    <th>App Store Link</th>
                                                    <th>App Store Rate</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td>{{ $product->category ? $product->category->name : '' }} </td>
                                                        <td>{{ $product->name }} </td>
                                                        <td>{{ $product->theme ? $product->theme->name : '' }} </td>

                                                        <td><img src="{{ $product->logo }}" width="25%">

                                                        </td>
                                                        <td>{{ substr($product->description, 0, 100) }}
                                                        </td>
                                                        <td>{{ $product->play_store }}</td>
                                                        <td>{{ $product->play_store_value }}</td>
                                                        <td>{{ $product->app_store }}</td>
                                                        <td>{{ $product->app_store_value }}</td>


                                                        <td> <a class="js-edit-logo" data-bs-toggle="modal"
                                                                href="#editModal" style="cursor:pointer"
                                                                title="edit product" data-id="{{ @$product->id }}"
                                                                data-name="{{ @$product->name }}"
                                                                data-logo="{{ @$product->logo }}"
                                                                data-play_store="{{ @$product->play_store }}"
                                                                data-description="{{ @$product->description }}"
                                                                data-play_store_value="{{ $product->play_store_value }}"
                                                                data-app_store="{{ $product->app_store }}"
                                                                data-app_store_value="{{ $product->app_store_value }}"
                                                                data-category="{{ $product->category_id }}"
                                                                data-theme="{{ $product->theme_id }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <a class="delete-material"
                                                                href="{{ route('delete.product', @$product->id) }}"
                                                                title="delete product"
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
                            <h5 class="modal-title" id="exampleModalToggleLabel">Add Product
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.add.product') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="modal-body">
                                <div class="card-body">
                                    <label for="maskPhone" class="form-label">Category</label>
                                    <select class="form-control mb-2" name="category_id" id="category_id" required>
                                        <option value="" disabled selected> Select Category </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="category_error" style="display: none">please select at least one
                                        category</span>
                                    <label for="maskPhone" class="form-label">Name</label>
                                    <input class="form-control mb-2" type="text" placeholder="Name" name="name"
                                        required>
                                    <label for="maskPhone" class="form-label">Description</label>
                                    <textarea class="form-control mb-2" col="100" row="10" placeholder="Description" name="description" required>
                                    </textarea>
                                    <label for="maskPhone" class="form-label">Play Store Link</label>
                                    <input class="form-control mb-2" type="url" placeholder="Play Store Link"
                                        name="play_store" required>
                                    <label for="maskPhone" class="form-label">Play Store Rating</label>
                                    <input class="form-control mb-2" type="text" placeholder="Play Store Rating"
                                        name="play_store_value" required>
                                    <label for="maskPhone" class="form-label">App Store Link</label>
                                    <input class="form-control mb-2" type="url" placeholder="App Store Link"
                                        name="app_store" required>
                                    <label for="maskPhone" class="form-label">App Store Rating</label>
                                    <input class="form-control mb-2" type="text" placeholder="App Store Rating"
                                        name="app_store_value" required>
                                    <label for="maskPhone" class="form-label">Logo</label>
                                    <div class="mb-0">
                                        <input class="form-control" type="file" name="logo"
                                            accept="image/png, image/gif, image/jpeg" required>
                                    </div>
                                    <label for="maskPhone" class="form-label">Themes</label>

                                    <select class="form-control mb-2" name="theme_id" id="theme_id" required>
                                        <option value="" disabled selected> Select theme </option>
                                        @foreach ($themes as $theme)
                                            <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="theme_error" style="display: none">please select at least one theme</span>

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
                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Product
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.edit.product') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="modal-body">
                                <div class="card-body">
                                    <input type="hidden" name="id" id="product_id">
                                    <label for="maskPhone" class="form-label">Category</label>
                                    <select class="form-control mb-2" name="category_id" id="category_edit_id" required>
                                        <option value="" disabled selected> Select Category </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="maskPhone" class="form-label">Name</label>
                                    <input class="form-control mb-2" type="text" placeholder="Name" name="name"
                                        id="name" required>
                                    <label for="maskPhone" class="form-label">Description</label>
                                    <textarea class="form-control mb-2" type="text" placeholder="Description" name="description" id="description"
                                        required> </textarea>
                                    <label for="maskPhone" class="form-label">Play Store Link</label>
                                    <input class="form-control mb-2" type="url" placeholder="Play Store Link"
                                        name="play_store" id="play_store" required>
                                    <label for="maskPhone" class="form-label">Play Store Rating</label>
                                    <input class="form-control mb-2" type="text" placeholder="Play Store Rating"
                                        name="play_store_value" id="play_store_value" required>
                                    <label for="maskPhone" class="form-label">App Store Link</label>
                                    <input class="form-control mb-2" type="text" placeholder="App Store Link"
                                        name="app_store" id="app_store" required>
                                    <label for="maskPhone" class="form-label">App Store Rating</label>
                                    <input class="form-control mb-2" type="text" placeholder="App Store Rating"
                                        name="app_store_value" id="app_store_value" required>
                                    <label for="maskPhone" class="form-label">Logo</label>
                                    <div class="mb-0">
                                        <input class="form-control" type="file" name="logo" id="logo"
                                            accept="image/png, image/gif, image/jpeg">
                                        <img src="" id="logo_id" width="50%">
                                    </div>

                                    <label for="maskPhone" class="form-label">Themes</label>

                                    <select class="form-control mb-2" name="theme_id" id="theme_edit_id" required>
                                        <option value="" disabled selected> Select theme </option>
                                        @foreach ($themes as $theme)
                                            <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                                        @endforeach
                                    </select>
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
            var logo = $(this).attr('data-logo');
            var description = $(this).attr('data-description');
            var play_store = $(this).attr('data-play_store');
            var play_store_value = $(this).attr('data-play_store_value');
            var app_store = $(this).attr('data-app_store');
            var app_store_value = $(this).attr('data-app_store_value');
            var category = $(this).attr('data-category');
            var theme = $(this).attr('data-theme');

            $("#editModal .modal-dialog #product_id").val(id);
            $("#editModal .modal-dialog #name").val(name);
            $("#editModal .modal-dialog #play_store").val(play_store);
            $("#editModal .modal-dialog #play_store_value").val(play_store_value);
            $("#editModal .modal-dialog #app_store").val(app_store);
            $("#editModal .modal-dialog #app_store_value").val(app_store_value);
            $("#editModal .modal-dialog #description").val(description);
            $("#editModal .modal-dialog #logo_id").attr("src", logo);
            $('#editModal .modal-dialog #category_edit_id option[value="' + category + '"]').attr("selected",
                "selected");
            $('#editModal .modal-dialog #theme_edit_id option[value="' + theme + '"]').attr("selected",
                "selected");

        });
    </script>
@endsection
