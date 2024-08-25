<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>interaSMP</title>
    @vite('resources/css/app.css')

    <script src="https://kit.fontawesome.com/93d2979243.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/universal.css">
    <link rel="stylesheet" href="css/bug-report.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

</head>
<body  class="not-home">
    <nav class="bg-color">
        <div>
            <i class="nav-hamburger fa-solid fa-bars"></i>            
        </div>
        <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 15px;">
            <div class="nav-title prompt-semibold">
                <p>interaSMP</p>
            </div>
            <div class="nav-menu">
                <ul style="display: flex; margin-right: 50px;">
                    @yield('nav-list')
                </ul>
            </div>
        </div>
    </nav>

    <div class="hamburger-menu">
        @yield('nav-list-mobile')
    </div>

    @yield('content')
    
</body>
</html>