<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>Polecany Doktor</title>
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
    
    <div class='Banner MainPageBannerPhoto'>
            <div class='BannerCircle'>
                <div>
                    <p><i class="fas fa-user-nurse"></i>&nbsppolecanydoktor.pl</p>
                    <p>SZYBCIEJ,</p>
                    <p>ŁATWIEJ,</p>
                    <p>BEZPIECZNIEJ!</p>
                </div>
            </div>
        </div>
    </div>

    <div class='PageContent'>
        <div>
            <!-- info 1 -->
            <h2>Inteligentne umawianie wizyt przez internet&nbsp<i class="fas fa-user-nurse"></i></h2>

            <p>Dzięki serwisowi <span>polecanydoktor.pl</span> możesz sprawdzić opnie na temat setek lekarzy w Polsce,
                porównać ceny i błyskawicznie umówić wizytę przez internet.</p>
        </div>
    </div>  
       <div class="ContentAnimation">
       <div class="title1">
                <h2>Zmieniamy medycynę na lepsze.</h2>
                <p>Z naszym serwisem nie poświęcisz więcej niż 5 minut na rejestrację wizyty.</p>
       </div>

        <div class="img1"></div>
        <div class="buisnessCircle1"></div>

        <div class="title2">
                 <h2>Ułatwiamy pracę lekarzom.</h2>
                <p>Jeśli jesteś lekarzem, możesz lepiej planować swoje obowiązki, dzięki liście spotkań z pacjentami.</p>
       </div>
        <div class="img2"></div>
        <div class="buisnessCircle2"></div>
        
       <div class="title3">
                <h2>Wybierz swojego specjalistę.</h2>
                <p>Z nami masz dostęp do profili i ocen setek lekarzy. Właśnie dlatego jesteśmy pewni, 
                    że trafisz do najlepszego możliwego gabinetu.</p>
       </div>
        <div class="img3"></div>
       <div class="buisnessCircle3"></div>
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
        <script src="{{ asset('assets/js/nav.js') }}"></script>
        <script src="{{ asset('assets/js/mainPage.js') }}"></script>
        @if(Session::get('loggedout'))
        <script>
            $(document).ready(function() {
                alert('Zostałeś wylogowany')
            })
        </script>
        @endif
</body>
</html>