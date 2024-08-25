@extends('layout.home-layout')

@section('nav-list')
<li><a class="nav-active prompt-medium" href="http://127.0.0.1:8000/home">Home</a></li>
<li><a class="nav-nonactive prompt-normal" href="">Event</a></li>
<li><a class="nav-nonactive prompt-normal" href="">Rank</a></li>
<li><a class="nav-nonactive prompt-normal" href="">Gallery</a></li>
@endsection

@section('nav-list-mobile')
<div class="hamburger-list active">
    <a href="http://127.0.0.1:8000/home" class="prompt-medium">Home</a>
</div>
<div class="hamburger-list nonactive">
    <a href="event.html" class="prompt-medium">Events</a>
</div>
<div class="hamburger-list nonactive">
    <a href="#" class="prompt-medium">Ranks</a>
</div>
<div class="hamburger-list nonactive bottom">
    <a href="#" class="prompt-medium">Gallery</a>
</div>
@endsection

@section('content')
<body>
        <!-- Hero Section -->

    <div class="hero-gradient">
        <div class="hero-section items-center pl-2">
            <img class="logo" src="img/logo.png" alt="logo" draggable="false">
            <p class="hero-title prompt-semibold antialiased text-slate-50">
                interaSMP NEWERA
                <p class="hero-subtitle prompt-medium antialiased text-slate-400">
                    Nikmati pengalaman bermain anda di interaSMP!
                </p>
        </div>
    </div>

    <div class="home-content">
        <div class="server-status">
            <div class="server">
                <div class="server-info text ip">
                    <p class="prompt-normal">IP</p>
                </div>
                <div class="server-info address">
                    <p class="prompt-normal" id="ipServer">interasmp.ddns.net</p>
                </div>
                <div class="server-info text port">
                    <p class="prompt-normal">Port</p>
                </div>
                <div class="server-info port">
                    <p class="prompt-normal" id="portServer">25602</p>
                </div>
            </div>
            <div class="server-other">
                <div class="server-info text">
                    <p class="prompt-normal">Players Online</p>
                </div>
                <div class="server-info info">
                    <p class="prompt-normal" id="playerCount">10/20</p>
                </div>
            </div>
            <div class="server-other">
                <div class="server-info text">
                    <p class="prompt-normal">Server Status</p>
                </div>
                <div class="server-info info">
                    <p class="prompt-normal" id="serverStats">Online</p>
                </div>
            </div>
            <div class="server-other">
                <div class="server-info text">
                    <p class="prompt-normal">Server Version</p>
                </div>
                <div class="server-info info">
                    <p class="prompt-normal" id="versionServer">1.21.20 +</p>
                </div>
            </div>
        </div>
    </div>

   

    <img class="hero-img" src="img/home-img.png" alt="">



        <!-- Bug Report Button -->

    <a href="http://127.0.0.1:8000/bug-report" class="bugreport-button">
        <p class="bugreport-button text prompt-semibold">Report Bug</p>
    </a>

    <script>
        
        function fetchData() {
            fetch('https://api.mcstatus.io/v2/status/bedrock/interasmp.ddns.net:25602')
            // fetch('status.php')
                .then(response => response.json())
                .then(data => {
                    let onlineStatus = 'Offline';
                    if (data.online === true) {
                        onlineStatus = 'Online';
                    }
                    document.getElementById('serverStats').innerHTML = onlineStatus;
                    document.getElementById('playerCount').innerHTML = `${data.players.online}/${data.players.max}`;
                    document.getElementById('ipServer').innerHTML = data.host;
                    document.getElementById('portServer').innerHTML = data.port;
                    document.getElementById('versionServer').innerHTML = data.version.name;

                    console.log('Data updated successfully');
                })
                .catch(error => {
                    document.getElementById('serverStats').innerHTML = 'Error fetching data.';
                    document.getElementById('playerCount').innerHTML = 'Error fetching data.';
                    document.getElementById('ipServer').innerHTML = 'Error fetching data.';
                    document.getElementById('portServer').innerHTML = 'Error fetching data.';

                    console.error('Error:', error);
                });
        }

        document.addEventListener("DOMContentLoaded", function () {
            fetchData();
            setInterval(fetchData, 10000);

            // Toggle mobile menu visibility
            const hamburger = document.querySelector('.nav-hamburger');
            const mobileMenu = document.querySelector('.hamburger-menu');
            const navbar = document.querySelector('nav');

            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) {
                    navbar.classList.add('bg-color')
                } else if (window.scrollY <= 100) {
                    navbar.classList.remove('bg-color')
                }
            });

            hamburger.addEventListener('click', function() {
                mobileMenu.classList.toggle('open');
                hamburger.classList.toggle('open');
            });

        });
    </script>
</body>
@endsection






