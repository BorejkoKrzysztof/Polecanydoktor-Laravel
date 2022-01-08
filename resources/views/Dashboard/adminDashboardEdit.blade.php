<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj profil</title>
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
              <li><a href="<?= url('dashboard/admin/editprofile'); ?>">Edytuj profil</a></li>
              <li><a href="<?= url('dashboard/admin/makeadmin'); ?>">Zrób adminem</a></li>
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
                     <li><a href="<?= url('dashboard/admin/editprofile'); ?>">Edytuj profil</a></li>
                     <li><a href="<?= url('dashboard/admin/makeadmin'); ?>">Zrób adminem</a></li>
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
    
        <div class="EditProfile">
            <h2><i class="fas fa-user-nurse"></i>&nbsppolecanydoktor.pl</h2>
                <h3>Edytuj swój profil.</h3>
                <p>Podaj kluczowe informacje, które pozwolą ci korzystać w pełni z naszego serwisu.</p>
                <form action='editprofileprocess' method='post' enctype='multipart/form-data'>
                    @csrf
                        <label for="First_name">Imie:</label>
                        <input type="text" name="First_name" id="">
                        @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('First_name') }}</p>
                         @endif
                        <label for="Last_name">Nazwisko:</label>
                        <input type="text" name='Last_name'>
                        @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('Last_name') }}</p>
                         @endif
                        <label for="Plec">Płeć:</label>
                        <select name="Plec" id="">
                            <!-- <option value="Wybierz"></option> -->
                            <option value="0">Mężczyzna</option>
                            <option value="1">Kobieta</option>
                        </select>
                        @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('Plec') }}</p>
                         @endif
                        <label for="Urodziny">Data urodzin:</label>
                        <input type="date" name='birthday'>
                        @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('birthday') }}</p>
                         @endif
                        <label for="Zdjecie">Dodaj zdjęcie profilowe:</label>
                        <input type="file" name='Photo'>
                        <input type="submit" value='Edytuj'>
                </form>
                <br><br>
                <button><a href="/dashboard/deleteaccount">Kliknij tutaj, aby usunąć konto</a></button>
        </div>
        <!-- <div class="Space"></div> -->
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