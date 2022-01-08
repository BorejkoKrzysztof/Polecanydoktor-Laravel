<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Użytkownika</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel='stylesheet' href="{{url('css/styles.css')}}">
</head>
<body>
<nav class='Mobile'>
            <i class="fas fa-bars"></i>
        </nav>
        
    <div class="DasboardDesktopNav">
        <ul>
              <li><a href="<?= url('dashboardhandle'); ?>">Moje Konto</a></li>
              <li><a href="<?= url('dashboard/doctor/editprofile'); ?>">Edytuj profil</a></li>
              <li><a href="<?= url('dashboard/doctor/myvisits'); ?>">Moje wizyty</a></li>
        </ul>
        <hr/>
        <ul>
            <li><a href="<?= url('/'); ?>">Strona Główna</a></li>
            <li><a href="<?= url('home/search'); ?>">Znajdź lekarza</a></li>
            <li><a href="<?= url('home/aboutus'); ?>">O nas</a></li>
            <li><a style='color:red;'href="<?= url('logout'); ?>">Wyloguj się</a></li>
        </ul>
    </div>
    <div class='NavMobile'>
        <div class='scrollableInMobileNav'>
            <p><i class="fas fa-user-nurse"></i>&nbsppolecanydoktor.pl</p>
            <hr/>
                <ul>
                    <li><a href="<?= url('dashboardhandle'); ?>">Moje Konto</a></li>
                    <li><a href="<?= url('dashboard/doctor/editprofile'); ?>">Edytuj profil</a></li>
                    <li><a href="<?= url('dashboard/doctor/myvisits'); ?>">Moje wizyty</a></li>
                    <li><a href="<?= url('logout'); ?>">Wyloguj się</a></li>
                </ul>
            <hr/>
                <ul>
                    <li><a href="<?= url('/'); ?>">Strona Główna</a></li>
                    <li><a href="<?= url('home/search'); ?>">Znajdź lekarza</a></li>
                    <li><a href="<?= url('home/aboutus'); ?>">O nas</a></li>
                </ul>
        </div>
    </div>
    <div class="Banner">

        <div class="UserDashboardInfo">
            <h1>Witaj !!!</h1>
            <p>To jest twój panel administracyjny.</p>
            <i class="fas fa-user-nurse"></i>
            <h2>Twoje dane:</h2>
            <div>
                <p>{{ $user->First_name}} {{ $user->Last_name }}</p>
                <p>{{ $user->Email }}</p>
                @if ($user->Sex == 0)
                    <p>Mężczyzna</p>
                @else
                    <p>Kobieta</p>
                @endif
                <p>{{ $user->Birthday }}</p>
            </div>
            <!-- <button href="<?= url('dashboard/user/editprofile'); ?>">Edytuj</button> -->
        </div>
    </div>
        <footer>
        <div>
            <p><i class="fas fa-user-nurse"></i>&nbsppolecanydoktor.pl</p>
        </div>
        <div>
                <a href="<?= url('/'); ?>">Strona Główna</a>
                <a href="<?= url('home/search'); ?>">Znajdź lekarza</a>
                <a href="<?= url('home/aboutus'); ?>">O nas</a>
        </div>

        <div>
            <p><i class="fas fa-user-nurse"></i>&nbsppolecanydoktor.pl 2021 Wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/desktopNav.js') }}"></script>
</body>
</html>