<!-- Mainly scripts -->
<script src="/backend/js/jquery-3.1.1.min.js"></script>
<script src="/backend/js/bootstrap.min.js"></script>
<script src="/backend/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/backend/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Bootstrap CSS và JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function(e) {
        $('.deleteUserBtn').click(function(e) {
            e.preventDefault();
            var userId = $(this).val();
            $('#user_id').val(userId);
            $('#deleteModal').modal('show');

        });
    })
</script>

<script>
    $(document).ready(function(e) {
        $('.deleteLocationBtn').click(function(e) {
            e.preventDefault();
            var locationId = $(this).val();
            $('#location_id').val(locationId);
            $('#deleteModal').modal('show');

        });
    })
</script>

@if (isset($config['js'])) && is_array($config['js'])
    @foreach ($config['js'] as $js)
        <script src="{{ $js }}"></script>
    @endforeach
@endif
<meta name="_token" content="{{ csrf_token() }}">
