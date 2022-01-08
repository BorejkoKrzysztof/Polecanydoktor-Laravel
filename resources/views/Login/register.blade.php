<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja konta</title>
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
          <div class="RegisterWrapper">
            <div class="SkewBanner1">
                    <div class="DoctorRegisterBackground"></div>
            </div>
            <div class="SkewBanner2">
                    <div class="UserRegisterBackground"></div>
            </div>
          </div>
        </div>

        <button class="registerUser">Jestem pacjentem</button>
        <button class="registerDoctor">Jestem lekarzem</button>

        <div class="RegisterUserForm">
        <i class="far fa-times-circle"></i>
            <form action="createUser" method="post">
                @csrf
                <label for="Email">Email</label>
                <input type="text" name="Email">
                <label for="Password">Hasło</label>
                <input type="password" name="Password">
                <label for="ConfirmPassword">Powtórz hasło</label>
                <input type="password" name="ConfirmPassword">
                @if ($errors->userError->isEmpty())
                <input type="submit" name="user" value="Zarejestruj">
                @endif
                @if (!$errors->userError->isEmpty())
                <input type="submit" name="doctor" class="RegisterExtra" value="Zarejestruj">
            @Endif
            </form>
            @if (!$errors->userError->isEmpty())
                <div >
                    <ul class="FormErrors">
                    @foreach ($errors->userError->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @Endif
        </div>


        <div class="RegisterDoctorForm">
        <i class="far fa-times-circle"></i>
            <form action="createDoctor" method="post">
                @csrf
                <label for="DoctorEmail">Email</label>
                <input type="text" name="DoctorEmail">
                <label for="DoctorPassword">Hasło</label>
                <input type="password" name="DoctorPassword">
                <label for="DoctorConfirmPassword">Powtórz hasło</label>
                <input type="password" name="DoctorConfirmPassword">
                @if ($errors->doctorError->isEmpty())
                <input type="submit" name="user" value="Zarejestruj">
                @endif
                @if (!$errors->doctorError->isEmpty())
                <input type="submit" name="doctor" class="RegisterExtra" value="Zarejestruj">
            @Endif
            </form>
            @if (!$errors->doctorError->isEmpty())
                <div >
                    <ul class="FormErrors">
                    @foreach ($errors->doctorError->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @Endif
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
        <script src="{{ asset('assets/js/registerPage.js') }}"></script>
        @if (!$errors->doctorError->isEmpty())
            <script>
                $(document).ready(function() {
                    $('.RegisterDoctorForm').css('display', 'block');
                    $('.RegisterWrapper').css('filter', 'grayscale(100%)')
                });
            </script>
        @endif
        @if (!$errors->userError->isEmpty())
            <script>
                $(document).ready(function() {
                    $('.RegisterUserForm').css('display', 'block');
                    $('.RegisterWrapper').css('filter', 'grayscale(100%)')
                });
            </script>
        @endif
</body>
</html>