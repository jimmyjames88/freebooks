<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>FreeBooks</title>
        <link rel="stylesheet" href="/css/app.css" />
    </head>
    <body>
        <div id="app" class="layout-wrapper" :class="{ 'sidebar-open' : sidebarOpen }">
            @include('layout._sidebar')
            <main>
                <div class="content">
                    <div class="container is-fluid">
                        @include('widgets._flash')
                        @yield('content')
                    </div>
                </div>
                <footer>
                    &copy; 2019. FreeBooks.
                </footer>
            </main>
        </div>
        <script src="/js/app.js"></script>
        @if(config('app.env') == 'local')
            <!-- <script src="http://127.0.0.1:35729/livereload.js"></script> -->
        @endif
    </body>
</html>
