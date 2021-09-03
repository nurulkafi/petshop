@include('layouts.head')
<body>
    <div class="app">
        @include('layouts.sidebar')
        <div id="main">
            @include('layouts.navbar')
            <div class="main-content container-fluid">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
    </div>
    @include('layouts.script')
</body>
