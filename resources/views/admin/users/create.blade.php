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
                <h5>{{ config('apps.user.Form') }} <small>Hoàn thiện các phần thông tin được yêu cầu</small></h5>
                <div class="ibox-tools">
                    {{-- <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#">Config option 1</a>
                </li>
                <li><a href="#">Config option 2</a>
                </li>
            </ul> --}}
                    <a class="close-link" href="{{ route('users.index') }}">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="post" class="form-horizontal" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10"><input type="email" name="email"
                                placeholder="Nhập email của người dùng" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Tên</label>
                        <div class="col-sm-10"><input type="text" name="name" placeholder="Nhập tên người dùng"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Mật khẩu</label>
                        <div class="col-sm-10"><input type="password" name="password" placeholder="Nhập mật khẩu"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a class="btn btn-white" href="{{ route('users.index') }}">Cancel</a>
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
