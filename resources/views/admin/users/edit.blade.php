<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>{{ config('apps.user.title') }}</h2>
        </h2>
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="active"><strong>Edit Information Of {{ $user->name }}</strong></li>
        </ol>
    </div>
</div>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <form method="post" class="form-horizontal">
                @csrf
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="{{ $user->name }}">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Gmail</label>
                    <div class="col-sm-10"><input type="email" class="form-control" placeholder="{{ $user->email }}">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10"><input type="password" class="form-control" name="password"
                            placeholder="**********"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Save
                        changes</strong></button>
            </form>
        </div>
        <div class="col-lg-5">
            {{-- draw a circle view avatar of user and a button to upload a new picture --}}
            <div class="ibox-content text-center">
                {{-- check if $user->photo is null return message "this user does not set avatar" --}}
                @if ($user->photo == null)
                    <div class="alert alert-danger" role="alert">
                        This user does not set avatar
                    </div>
                @else
                    <div class="m-b-sm">
                        <img alt="image" class="img-circle" src="{{ $user->photo }}" width="128px" height="128px">
                    </div>
                    <p class="font-bold">{{ $user->name }}</p>
                    <div class="text-center">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-xs">Change
                            Avatar</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
