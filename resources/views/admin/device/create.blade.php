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
                <h5>{{ config('apps.device.form') }} <small>Complete all required informations</small></h5>
                <div class="ibox-tools">
                    <a class="close-link" href="{{ route('admin.devices.index') }}">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="post" class="form-horizontal" action="{{ route('admin.devices.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Device Type</label>
                        <div class="col-sm-10">
                            <!-- Thêm dropdown để chọn loại thiết bị -->
                            <select class="form-control" name="device_category_id" required>
                                @foreach ($deviceCategories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Device Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Device Name" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">IR Code (JSON)</label>
                        <div class="col-sm-10">
                            <textarea name="ir_code" class="form-control" placeholder="IR Code (JSON)" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="photo" class="form-control" accept="image/*" required>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a class="btn btn-white" href="{{ route('admin.devices.index') }}">Cancel</a>
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
