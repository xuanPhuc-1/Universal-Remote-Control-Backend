<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('users.destroy') }}" method="post">
                @csrf
                <input type="hidden" name="user_delete_id" id = "user_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                </div>
                <div class="modal-body">
                    <h5>Do you really want to delete this user?</h5>
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
            <li class="active"><strong>User Management</strong></li>
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
                        <input type="text" class="form-control" placeholder="Search User" id="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <!-- Thêm nút "Thêm người dùng" -->
                    <a class="btn btn-primary btn-primary" href="{{ route('users.create') }}">Add user</a>
                    <!-- Thêm nút "Xoá theo lựa chọn" -->
                    <a class="btn btn-primary btn-danger" href="{{ route('users.destroy') }}">Delete Selected</a>
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
                            <th>Status</th>
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
                                    <img src="{{ asset('storage/profiles/' . $user->photo) }}" alt="Image"
                                        width="100px" height="100px">
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
                                    <i class="is-size-6 fa fa-user p-r-6 {{ isOnline($user->id) }}"></i>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script type="text/javascript">
    $('#search').on('keyup', function() {
        var value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ route('users.search') }}',
            data: {
                'search': encodeURIComponent(value) // Mã hóa giá trị tìm kiếm
            },
            success: function(data) {
                $('tbody').html(data);
            }
        });
    })
</script>


<meta name="_token" content="{{ csrf_token() }}">
