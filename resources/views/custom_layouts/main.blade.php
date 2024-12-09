<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>@yield("judul", "Judul website")</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    @includeIf("custom_layouts.partials.style")
</head>
<body>
<!-- Responsive navbar-->
@includeIf("custom_layouts.partials.topbar")
<!-- Page content-->
<div class="container">
    @yield("content")
</div>
@includeIf("custom_layouts.partials.script")
</body>
</html>
