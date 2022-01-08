<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil lekarza</title>
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
        <div class="DoctorProfile">
        <img src='{{url("{$doctor->img}")}}' alt="Zdjęcie lekarza"
                            class='searchDoctorAvatarBig'>
        <h2>dr {{ $doctor->First_name }} {{ $doctor->Last_name }}</h2>
        <h3>Specjalizacja: {{ $doctor->Speciality_name }}</h3>
        <p>{{ $doctor->Description }}</p>
        <P style='font-weight: bold;'>Gabinet:</P>
        <p>{{ $doctor->Institution_name }}</p>
        <!-- <br/> -->
        <p>{{ $doctor->Street }} {{ $doctor->Building_number }}</p>
        <!-- <br/> -->
        <p>{{ $doctor->Postal_code }} {{ $doctor->City }}</p>
        <h1>Komentarze:</h1>
        @foreach($doctor->Comments as $comment)
            <p>{{ $comment->Comment }}</p>
        @endforeach
        <h3>Ocena:</h3>
        <h3> {{ $doctor->sumOfRatings / $doctor->Amount_ratings }}/5</h3>
        <button style='background-color: white; border: solid 2px green; margin-bottom: 5vh;font-size:1.5rem; border-radius:10px;'>
            <a style='border:none; color:green' href="/home/doctor/registervisit/{{ $doctor->Id }}">Zapisz się</a>
        </button>
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
        <script src="{{ asset('assets/js/nav.js') }}"></script>
        <script src="{{ asset('assets/js/mainPage.js') }}"></script>
</body>
</html>