<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.locations.destroy') }}" method="post">
                @csrf
                <input type="hidden" name="user_delete_id" id = "user_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Hub</h5>
                </div>
                <div class="modal-body">
                    <h5>Do you really want to delete this hub?</h5>
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
        <h2>{{ config('apps.hub.title') }}</h2>
        </h2>
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="active"><strong>Hub Management</strong></li>
        </ol>
    </div>
</div>
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ config('apps.hub.tableHead') }}</h5>
                <div class="ibox-tools">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search hub">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <!-- Thêm nút "Thêm người dùng" -->
                    <a class="btn btn-primary btn-primary" href="{{ route('admin.hub.create') }}">Add user</a>
                    <!-- Thêm nút "Xoá theo lựa chọn" -->
                    <a class="btn btn-primary btn-danger" href="{{ route('admin.hub.destroy') }}">Delete Selected</a>
                </div>

            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
                            <th>ID</th>
                            <th>{{ config('apps.user.Name') }}</th>
                            <th>{{ config('apps.user.Email') }}</th>
                            <th>Avatar</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <input type="checkbox" value="" class="input-checkbox checkBoxItem">
                                </td>
                                <td>{{ $user->id }}</td>
                                <td><a href="{{ route('users.edit', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <img src="{{ $user->photo }}" alt="Avatar" class="avatar">
                                </td>
                                <td>
                                    {{ $user->role }}
                                    {{-- if $user->role =="user" create a button "set admin role" beside with method post to users.setRole --}}
                                    @if ($user->role == 'user')
                                        <form action="{{ route('users.setRole', ['id' => $user->id]) }}"
                                            method="post">
                                            @csrf
                                            <button class="btn btn-primary btn-success" type="submit">Set Admin
                                                Role</button>
                                        </form>
                                    @endif


                                </td>
                                <td>
                                    <a class="btn btn-primary btn-success"
                                        href="{{ route('users.edit', ['id' => $user->id]) }}">Edit</a>
                                    <a class="btn btn-secondary btn-info"
                                        href="{{ route('users.showLocation', ['id' => $user->id]) }}">Room list</a>
                                    <button class="btn btn-primary btn-danger deleteUserBtn" type="button"
                                        value="{{ $user->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
