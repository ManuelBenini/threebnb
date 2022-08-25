@include('layouts.partials.header')

<body>
    <div id="app">

        @include('layouts.partials.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
