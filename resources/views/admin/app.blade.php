<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - @yield('title')</title>
    @includeIf('admin.partials.css')
</head>

<body class="sb-nav-fixed">
    @includeIf('admin.partials.topbar')
    <div id="layoutSidenav">
        @includeIf('admin.partials.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    @includeIf('admin.partials.flash')
                </div>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">@yield('title', 'Table')</h1>

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-body">
                            DataTables is a third party plugin that is used to generate the demo table below. For more
                            information about
                            DataTables, please visit the
                            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                            .
                        </div>
                    </div>
                </div>

                <div class="container-fluid px-4">
                    @yield('content')
                </div>
            </main>
            @includeIf('admin.partials.footer')
        </div>
    </div>

    @includeIf('admin.partials.js')
</body>

</html>
