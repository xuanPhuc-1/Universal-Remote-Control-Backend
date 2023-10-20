<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.locations.destroy') }}" method="post">
                @csrf
                <input type="hidden" name="location_delete_id" id = "location_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Room</h5>
                </div>
                <div class="modal-body">
                    <h5>Do you really want to delete this room?</h5>
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
            <li class="active"><strong>Room Management</strong></li>
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
                        <input type="text" class="form-control" placeholder="Search Room">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <a class="btn btn-primary btn-primary" href="{{ route('admin.locations.create') }}">Add room</a>
                    <a class="btn btn-primary btn-danger" href="{{ route('admin.locations.destroy') }}">Delete
                        Selected</a>s
                </div>

            </div>
            <div class="ibox-content">

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
                                <td><a>{{ $location->name }}</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-success"
                                        href="{{ route('admin.locations.edit', ['id' => $location->id]) }}">Edit</a>
                                    <button class="btn btn-primary btn-danger deleteUserBtn" type="button"
                                        value="{{ $location->id }}">
                                        Delete
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
