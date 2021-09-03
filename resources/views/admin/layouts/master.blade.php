<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.head')
<body>
    <div id="app">
        @include('admin.layouts.sidebar')
        <div id="main">
            @include('admin.layouts.header')
            @yield('content')
            @include('admin.layouts.footer')
        </div>
    </div>
    @include('admin.layouts.script')
</body>
