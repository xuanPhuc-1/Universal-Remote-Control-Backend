<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('users.destroy') }}" method="post">
                @csrf
                <input type="hidden" name="user_delete_id" id = "user_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User's Room</h5>
                </div>
                <div class="modal-body">
                    <h5>Do you really want to delete this user's room?</h5>
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
        <h2>{{ config('apps.user.title') }}</h2>
        </h2>
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="active"><strong>Room Management {{ $user->name }}</strong></li>
        </ol>
    </div>
</div>
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ config('apps.user.tableHead') }}</h5>
                <div class="ibox-tools">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập tên người dùng">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <!-- Thêm nút "Thêm người dùng" -->
                    <a class="btn btn-primary btn-primary" href="{{ route('admin.locations.create') }}">Add room</a>
                    <!-- Thêm nút "Xoá theo lựa chọn" -->
                    <a class="btn btn-primary btn-danger" href="{{ route('admin.locations.destroy') }}">Delete
                        Selected</a>
                </div>

            </div>
            <div class="ibox-content">
                {{-- check if location is null return message "This user doesn't have any rooms" --}}
                @if ($locations->isEmpty())
                    <div class="alert alert-danger" role="alert">
                        This user doesn't have any rooms
                    </div>
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" value="" id="checkAll" class="input-checkbox">
                            <th>Id</th>
                            <th>{{ config('apps.location.Name') }}</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ($locations as $location)
                        <tbody>

                            <div class="col">
                                <td>
                                    <input type="checkbox" value="" class="input-checkbox checkBoxItem">
                                </td>
                                <td>{{ $location->id }}</td>
                                {{-- i want when click on user name, go to route('users.show') with user id --}}
                                <td><a>{{ $location->name }}</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-success"
                                        href="{{ route('locations.edit', ['id' => $location->id]) }}">Sửa</a>
                                    <button class="btn btn-primary btn-danger deleteUserBtn" type="button"
                                        value="{{ $location->id }}">
                                        Xoá
                                    </button>
                                </td>
                            </div>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
