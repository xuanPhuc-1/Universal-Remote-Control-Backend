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
                <h5>{{ config('apps.user.Form') }} <small>Complete all required informations</small></h5>
                <div class="ibox-tools">
                    <a class="close-link" href="{{ route('users.index') }}">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="post" class="form-horizontal" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10"><input type="email" name="email" placeholder="Email"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10"><input type="text" name="name" placeholder="User name"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Mật khẩu</label>
                        <div class="col-sm-10"><input type="password" name="password" placeholder="Password"
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
