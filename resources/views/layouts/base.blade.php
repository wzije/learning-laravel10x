<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->

    @includeIf('layouts.partials.css')

</head>

<body>
    <header class="mb-5">
        @include('layouts.partials.topbar')
    </header>
    <main class="container ">
        @yield('content')
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    @includeIf('layouts.partials.script')
</body>

</html>
