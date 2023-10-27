<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 7.x">
    <meta name="author" content="">
    <title>@yield('title') </title>
    @include('admin.layout.style')
    @stack('styles') // dung stack de push code truc tiep vao, khi chay mo f12 thi code se nam o ngoai source cho de nhin
</head>

<body>

    <div id="wrapper">
    @include('admin.layout.header')

        <!-- Page Content -->
    @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    @include('admin.layout.script')
    @stack('scripts')
</body>

</html>
