<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szukaj lekarza</title>
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

        

        

        <div class="SearchPageLayout">

            <div class="DoctorFiltering">
                <h2><i class="fas fa-user-nurse"></i>&nbsppolecanydoktor.pl</h2>
                <form action="search" method="post">
                    @csrf
                    <!-- specjalizacja -->
                    <label for="Specjalizacja">Specjalizacja</label>
                    <input type="text" name="Specjalizacja" id="">
                    <!-- miasto -->
                    <label for="Miasto">Miasto</label>
                    <input type="text" name='Miasto'>
                    <!-- data od -->
                    <label for="Od">Wizyta od</label>
                    <input type="date" name="Od" id="">
                    <!-- data do -->
                    <label for="Do">Wizyta do</label>
                    <input type="date" name='Do'>
                    @if(!$errors->dateError->isEmpty())
                            <p style='font-size:.7rem; color:red;'>{{ $errors->dateError->first('Do') }}</p>
                        @endif
                    <input type="submit" value="Szukaj">
                </form>
                <div class="VerticalPanel"></div>
                <div class="FilteringButton">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </div>

            <div class="Banner">

                    <div class="SearchResultsContent">
                        <h2><i class="fas fa-user-nurse"></i>&nbsppolecanydoktor.pl</h2>

                        <div class="listSpace"></div>

                        @foreach($doctorsInfo as $doctor)
                        <div class="DoctorInfo">

                            <img src='{{url("{$doctor->img}")}}' alt="Zdjęcie lekarza"
                            class='searchDoctorAvatar'
                            >

                            <h3 class="FirstName">dr {{$doctor->First_name}} {{$doctor->Last_name}}</h3>
                            <p class="DoctorsDescription">{{ $doctor->Description }}</p>

                            <div class="LineBreak"></div>
                            <div class="DoctorsRating">
                                <div class="DoctorsStars"> {{ $doctor->sumOfRatings / $doctor->Amount_ratings }}/5 z </div>
                                <p class="RatingsAmount">&nbsp{{$doctor->Amount_ratings}} opinii</p>
                            </div>
                            <div class="LineBreak"></div>
                            <div class="doctorButtons">
                                <button><a style='border:none;'href="doctor/{{ $doctor->Id }}">Profil</a></button>
                                <button>
                                    <a style='border:none; color:green'
                                    href="doctor/registervisit/{{ $doctor->Id }}">Zapisz się</a>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
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
        <script src="{{ asset('assets/js/nav.js') }}"></script>
        <script src="{{ asset('assets/js/searchDoctor.js') }}"></script>
</body>
</html>