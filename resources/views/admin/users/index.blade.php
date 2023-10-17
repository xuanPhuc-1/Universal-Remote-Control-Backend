<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>{{ config('apps.user.title') }}</h2>
        </h2>
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="active"><strong>Quản lý người dùng</strong></li>
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
                    <button class="add-user-button " type="button">Thêm người dùng</button>
                    <!-- Thêm nút "Xoá theo lựa chọn" -->
                    <button class="delete-selected-button" type="button">Xoá theo lựa chọn</button>
                </div>

            </div>
            <div class="ibox-content">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" value="" id="checkAll" class="input-checkbox">
                            <th>{{ config('apps.user.Name') }}</th>
                            <th>{{ config('apps.user.Email') }}</th>
                            <th>Avatar</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody>

                            <div class="col">
                                <td>
                                    <input type="checkbox" value="" class="input-checkbox checkBoxItem">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <img src="{{ $user->photo }}" alt="Avatar" class="avatar">
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm" type="button">Sửa</button>
                                    <button class="btn btn-danger btn-sm" type="button">Xoá</button>
                                </td>
                            </div>


                        </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>
