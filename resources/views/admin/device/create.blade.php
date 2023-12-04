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
                            {{-- use input file with a text view type json --}}
                            <input type="file" name="ir_code" id="irCodeInput" class="form-control"
                                accept="application/json" required>

                        </div>
                        {{-- a textview of json file when upload file succesfully --}}
                        <div class="col-sm-10 col-sm-offset-2">
                            <textarea class="form-control" rows="10" id="ir_code" name="ir_code" readonly></textarea>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Add change event listener to the file input
        $('#irCodeInput').change(function() {
            // Get the selected file
            var file = this.files[0];

            // Check if a file is selected
            if (file) {
                // Create a FileReader
                var reader = new FileReader();

                // Set a callback function to handle the file reading
                reader.onload = function(e) {
                    // Update the textarea with the content of the file
                    $('#ir_code').val(e.target.result);
                };

                // Read the file as text
                reader.readAsText(file);
            }
        });
    });
</script>
