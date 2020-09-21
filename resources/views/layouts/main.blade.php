@include('layouts.head')

<body>

    @include('partials.navbar')

    @include('partials.sidebar')

    @yield('content')

    @include('layouts.footer')

</body>