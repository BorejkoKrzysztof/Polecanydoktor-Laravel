<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Zaloguj się</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel='stylesheet' href="{{url('css/styles.css')}}">
</head>
<body>
    <nav class='Mobile'>
            <i class="fas fa-bars"></i>
        </nav>

        @if(!Session::get('logged'))
    <nav class='Desktop'>
        <ul>
            <li><a href="<?= url('/'); ?>">Strona Główna</a></li>
            <li><a href="<?= url('home/search'); ?>">Znajdź lekarza</a></li>
            <li><a href="<?= url('home/aboutus'); ?>">O nas</a></li>
            <li><a href="<?= url('login'); ?>">Zaloguj się</a></li>
        </ul>
    </nav>
    @else
    <nav class='Desktop'>
        <ul>
            <li><a href="<?= url('/'); ?>">Strona Główna</a></li>
            <li><a href="<?= url('home/search'); ?>">Znajdź lekarza</a></li>
            <li><a href="<?= url('home/aboutus'); ?>">O nas</a></li>
            <li><a href="<?= url('dashboardhandle'); ?>">Moje Konto</a></li>
            <li><a href="<?= url('logout'); ?>">Wyloguj się</a></li>
        </ul>
    </nav>
    @endif
    @if(!Session::get('logged'))
    <div class='NavMobile'>
    <p><i class="fas fa-user-nurse"></i>&nbsppolecanydoktor.pl</p>
    <hr/>
        <ul>
            <li><a href="<?= url('/'); ?>">Strona Główna</a></li>
            <li><a href="<?= url('home/search'); ?>">Znajdź lekarza</a></li>
            <li><a href="<?= url('home/aboutus'); ?>">O nas</a></li>
            <li><a href="<?= url('login'); ?>">Zaloguj się</a></li>
        </ul>
    </div>
    @else
    <div class='NavMobile'>
    <p><i class="fas fa-user-nurse"></i>&nbsppolecanydoktor.pl</p>
    <hr/>
        <ul>
            <li><a href="<?= url('/'); ?>">Strona Główna</a></li>
            <li><a href="<?= url('home/search'); ?>">Znajdź lekarza</a></li>
            <li><a href="<?= url('home/aboutus'); ?>">O nas</a></li>
            <li><a href="<?= url('dashboardhandle'); ?>">Moje Konto</a></li>
            <li><a href="<?= url('logout'); ?>">Wyloguj się</a></li>
        </ul>
    </div>
    @endif


        <div class="Banner LoginBanner">
            <div class="LoginBannerImg">
            </div>
            
            <div class="LoginForm">
                <h2>Logowanie&nbsp<i class="fas fa-user-nurse"></i></h2>
                <div>
                    <form action="/login" method="post">
                        @csrf
                        <label for="email">Email</label>
                        <!-- <br> -->
                        <input type="text" name="email">
                        <!-- <br> -->
                        <label for="password">Hasło</label>
                        <!-- <br> -->
                        <input type="password" name="password">
                        @if(Session::get('fail'))
                            <p>{{ Session::get('fail') }}</p>
                        @endif
                        <input type="submit" value="Zaloguj">
                    </form>
                    <p>Nie masz jeszcze konta? <a href="<?= url('login/register'); ?>">Zarejestruj się!</a></p>
                </div>
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