<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.devices.destroy') }}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="device_delete_id" id="device_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Device</h5>
                </div>
                <div class="modal-body">
                    <h5>Do you really want to delete this device?</h5>
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
        <h2>{{ config('apps.device.title') }}</h2>
        </h2>
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="active"><strong>Device Management</strong></li>
        </ol>
    </div>
</div>
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ config('apps.device.tableHead') }}</h5>
                <div class="ibox-tools">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search device">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <!-- Thêm nút "Thêm thiết bị" -->
                    <a class="btn btn-primary btn-primary" href="{{ route('admin.devices.create') }}">Add Device</a>
                    <!-- Thêm nút "Xoá theo lựa chọn" -->
                    <a class="btn btn-primary btn-danger" href="{{ route('admin.devices.destroy') }}">Delete
                        Selected</a>
                </div>
            </div>
            <div class="ibox-content">
                <!-- ... (giữ nguyên phần còn lại) ... -->
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
                            <th>ID</th>
                            <th>Device Category ID</th>
                            <th>Name</th>
                            <th>IR Codes</th>
                            <th>Photo</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($devices as $device)
                            <tr>
                                <td><input type="checkbox" value="{{ $device->id }}" name="id[]"
                                        class="input-checkbox"></td>
                                <td>{{ $device->id }}</td>
                                <td>{{ $device->device_category_id }}</td>
                                <td>{{ $device->name }}</td>
                                <td>{{ $device->ir_codes }}</td>
                                <td><img src="{{ asset('storage/devices/' . $device->photo) }}" alt="Image"
                                        width="100px" height="100px">
                                </td>
                                <td>{{ $device->created_at }}</td>
                                <td>{{ $device->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.device-category.edit', $device->id) }}"
                                        class="btn btn-primary btn-xs">Edit</a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#deleteModal" onclick="handleDelete({{ $device->id }})">
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
