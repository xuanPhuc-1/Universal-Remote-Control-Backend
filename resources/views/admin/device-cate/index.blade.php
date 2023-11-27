<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.locations.destroy') }}" method="post">
                @csrf
                <input type="hidden" name="user_delete_id" id = "user_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete device category</h5>
                </div>
                <div class="modal-body">
                    <h5>Do you really want to delete this device category?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>{{ config('apps.device-category.title') }}</h2>
        </h2>
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="active"><strong>Device Category Management</strong></li>
        </ol>
    </div>
</div>
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ config('apps.device-category.tableHead') }}</h5>
                <div class="ibox-tools">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search device category">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <!-- Thêm nút "Thêm người dùng" -->
                    <a class="btn btn-primary btn-primary" href="{{ route('admin.device-category.create') }}">Add device
                        category</a>
                    <!-- Thêm nút "Xoá theo lựa chọn" -->
                    <a class="btn btn-primary btn-danger" href="{{ route('admin.device-category.destroy') }}">Delete
                        Selected</a>
                </div>

            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
                            <th>ID</th>
                            <th>Device Category Name</th>
                            <th>Photo</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deviceCates as $deviceCate)
                            <tr>
                                <td><input type="checkbox" value="{{ $deviceCate->id }}" name="id[]"
                                        class="input-checkbox"></td>
                                <td>{{ $deviceCate->id }}</td>
                                <td>{{ $deviceCate->name }}</td>
                                <td><img src="{{ asset('storage/categories/' . $deviceCate->photo) }}"}}" alt="Image"
                                        width="100px" height="100px">
                                </td>
                                <td>{{ $deviceCate->created_at }}</td>
                                <td>{{ $deviceCate->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.device-category.edit', $deviceCate->id) }}"
                                        class="btn btn-primary btn-xs">Edit</a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#deleteModal" onclick="handleDelete({{ $deviceCate->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
