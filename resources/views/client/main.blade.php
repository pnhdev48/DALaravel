<!doctype html>
<html class="no-js" lang="en">
@include('client.header')

<body>
@include('client.head')

@yield('content')

@include('client.footer')
@yield('footer')
@include('client.modal')

</body>

</html>
