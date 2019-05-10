<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>

        <style>

            * {
                box-sizing: border-box;
                padding: 0;
                margin: 0;
            }

            .grid-container {
                display: grid;
                min-height: 100vh;
                grid-gap: 20px;
                grid-template-areas:
                    'sbleft header sbright'
                    'sbleft main sbright'
                    'sbleft footer footer';
            }

            .grid-container > * {
                background-color: pink;
            }

            header {
                grid-area: header;
            }

            .sidebar-left {
                grid-area: sbleft;
            }

            .sidebar-right {
                grid-area: sbright;
            }

            main {
                grid-area: main;
            }

            footer {
                grid-area: footer;
            }

        </style>
    </head>
    <body>

        <div class="grid-container">

            <header>header</header>
            <div class="sidebar-left">sb-left</div>
            <main>main</main>
            <div class="sidebar-right">sb-right</div>
            <footer>footer</footer>

        </div>

    </body>
</html>
