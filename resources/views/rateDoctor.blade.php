<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oceń lekarza</title>
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
              <li><a href="<?= url('dashboard/user/editprofile'); ?>">Edytuj profil</a></li>
              <li><a href="<?= url('dashboard/user/myvisits'); ?>">Moje wizyty</a></li>
              <li><a href="<?= url('dashboard/user/ratedoctor'); ?>">Oceń lekarza</a></li>
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
                    <li><a href="<?= url('dashboard/user/editprofile'); ?>">Edytuj profil</a></li>
                    <li><a href="<?= url('dashboard/user/myvisits'); ?>">Moje wizyty</a></li>
                    <li><a href="<?= url('dashboard/user/ratedoctor'); ?>">Oceń lekarza</a></li>
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
        <div class="ScrollDoctors">
        <h2><i class="fas fa-user-nurse"></i>&nbsppolecanydoktor.pl</h2>

        @foreach($usersDoctors as $doctor)
        <div class="RateContent">
            @if(!is_null($doctor->Image_path))
            <img src="{$doctor->Image_path}" alt="lekarz">
            @else
            <img src="" alt="zdjecie lekarza">
            @endif
            <h2>dr {{ $doctor->First_name }} {{$doctor->Last_name}}</h2>
                <form action="rateDoctorProcess/{{ $doctor->Id }}" method='post'>
                    @csrf
                    <div>
                    <label for="">Ocena:</label>
                    <input type="checkbox" id="one" name="Rate" value="1">
                    <label for="one">1</label><br>
                    <input type="checkbox" id="two" name="Rate" value="2">
                    <label for="two">2</label><br>
                    <input type="checkbox" id="three" name="Rate" value="3">
                    <label for="three">3</label><br>
                    <input type="checkbox" id="four" name="Rate" value="4">
                    <label for="four">4</label><br>
                    <input type="checkbox" id="five" name="Rate" value="5">
                    <label for="five">5</label><br><br>
                    </div>
                    <label for="">Komentarz:</label><br>
                    <textarea id="" name="Comment" rows=4></textarea><br>
                    <input type="submit" value="Oceń">
                </form>
        </div>
        @endforeach
        <!-- foreach -->
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