<!DOCTYPE html>
<html>

<head>
    @include('admin.components.head')
</head>

<body class="pace-done">
    <div id="wrapper">
        @include('admin.components.sidebar')

        <div id="page-wrapper" class="gray-bg">
            @include('admin.components.nav')
            @include($template)
            @include('admin.components.footer')
        </div>

    </div>

    @include('admin.components.script')
</body>

</html>
