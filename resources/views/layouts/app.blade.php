@include('layouts.partials.header')
<body style="direction:rtl">
    <div id="app">
     @include('layouts.partials.navbar')

        @yield('content')
    </div>

@include('layouts.partials.footer')
