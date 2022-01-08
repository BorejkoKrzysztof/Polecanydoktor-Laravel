<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O nas</title>
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
    
    <div class="Banner">
        <div class="AboutUs">
            <!-- zdjecie -->
        </div>    
    </div>

    <div class="CircleAboutUsButton">
    <p><a href="#content"><i class="fas fa-arrow-down"></i></a></p>
    </div>

    <div class="AboutUsContent" id='content'>
        <h2>O nas</h2>
        <p><span>polecanydoktor.pl</span> – serwis internetowy z segmentu e-usług, 
        umożliwiający pacjentom publikowanie opinii o lekarzach oraz umawianie się 
        na wizyty lekarskie przez Internet. W serwisie każdy lekarz ma swój profil, gdzie znajdują się jego dane kontaktowe, 
        opis kwalifikacji zawodowych, badania i zabiegi, jakie wykonuje oraz choroby, które leczy. Oprócz tych informacji na profilu 
        lekarza można znaleźć opinie pacjentów. Warunkiem umieszczenia opinii o lekarzu jest rejestracja w serwisie lub zalogowanie się za 
        pomocą konta w serwisie. Opinie są widoczne dla wszystkich użytkowników internetu.
        Za pośrednictwem serwisu można umówić się na wizytę do wybranego lekarza, wybierając termin w kalendarzu internetowym. 
        Lekarz może dodać kalendarz wizyt na swoim profilu po wykupieniu abonamentu w serwisie polecanydoktor.pl. Usługa internetowego 
        umawiania wizyt została uruchomiona w październiku 2021 roku. To innowacyjne rozwiązanie organizacyjne zostało wprowadzone 
        wtedy po raz pierwszy na polskim rynku, gdy świat został zagrożony przez wirus COVID19. </p>
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
</body>
</html>