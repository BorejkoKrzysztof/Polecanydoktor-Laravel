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
              <li><a href="<?= url('dashboard/doctor/editprofile'); ?>">Edytuj profil</a></li>
              <li><a href="<?= url('dashboard/doctor/myvisits'); ?>">Moje wizyty</a></li>
              <!-- <li><a href="<?= url('dashboard/user/ratedoctor'); ?>">Oceń lekarza</a></li> -->
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
                    <!-- <li><a href="<?= url('dashboard/user/ratedoctor'); ?>">Oceń lekarza</a></li> -->
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

    <div class="BannerBig">
    
        <div class="EditProfile">
            <h2><i class="fas fa-user-nurse"></i>&nbsppolecanydoktor.pl</h2>
                <h3>Edytuj swój profil.</h3>
                <p>Podaj kluczowe informacje, które pozwolą ci korzystać w pełni z naszego serwisu.</p>
                <form action='editprofileprocess' method='post' enctype='multipart/form-data' class='DoctorEditProfile'>
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
                        <label for="Price">Cena za godzinę wizyty:</label>
                        <input type="text" name='Price'>
                        @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('Price') }}</p>
                         @endif
                        <label for="NFZ">Współpraca z NFZ:</label>
                        <select name="NFZ" id="">
                            <!-- <option value="Wybierz"></option> -->
                            <option value="0">NIE</option>
                            <option value="1">TAK</option>
                        </select>
                        @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('NFZ') }}</p>
                         @endif
                        <label for="Speciality">Specjalizacja:</label>
                        <select name="Speciality" id="">
                            <option value="0">NIE</option>
                            <option value="1">TAK</option>
                            <option value="0">NIE</option>
                            <option value="1">TAK</option>
                            <option value="0">NIE</option>
                            <option value="1">TAK</option>
                        </select>
                        @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('Speciality') }}</p>
                         @endif
                        <h2 style='text-align:center; padding-left:0;'>Informacje na temat gabinetu:</h2>
                            <label for="Instytution_name">Nazwa instytucji:</label>
                            <input type="text" name='Instytution_name'>
                            @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('Instytution_name') }}</p>
                         @endif
                            <label for="Street">Ulica:</label>
                            <input type="text" name='Street'>
                            @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('Street') }}</p>
                         @endif
                            <label for="Building_number">Numer budynku:</label>
                            <input type="text" name='Building_number'>
                            @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('Building_number') }}</p>
                         @endif
                            <label for="Postal_code">Kod pocztowy:</label>
                            <input type="text" name='Postal_code'>
                            @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('Postal_code') }}</p>
                         @endif
                            <label for="City">Miasto:</label>
                            <input type="text" name='City'>
                            @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('City') }}</p>
                         @endif
                            <label for="Description">Opis działalności:</label>
                            <textarea style='border:solid 2px black; margin-left:3vw; margin-right:3vw;' id="" name="Description" rows="5" cols="50"></textarea>
                            @if(!$errors->editError->isEmpty())
                            <p style='font-size:1.5rem; color:red;'>{{ $errors->editError->first('Description') }}</p>
                         @endif
                            <label for="MonHours">Godzina otwarcia Poniedziałek:</label>
                            <input type="time" name="MonOpen" style='text-align:center;'>
                            <!-- <select name="MonOpen" id="">
                                <option value="00:00">NIE</option>
                                <option value="00:30">NIE</option>
                                <option value="01:00">TAK</option>
                                <option value="01:30">NIE</option>
                                <option value="02:00">TAK</option>
                                <option value="02:30">NIE</option>
                                <option value="03:00">NIE</option>
                                <option value="03:30">TAK</option>
                                <option value="04:00">NIE</option>
                                <option value="04:30">TAK</option>
                                <option value="05:00">NIE</option>
                                <option value="05:30">NIE</option>
                                <option value="06:00">TAK</option>
                                <option value="06:30">NIE</option>
                                <option value="07:00">TAK</option>
                                <option value="07:30">NIE</option>
                                <option value="08:00">TAK</option>
                                <option value="08:30">NIE</option>
                                <option value="09:00">TAK</option>
                                <option value="09:30">NIE</option>
                                <option value="10:00">TAK</option>
                                <option value="10:30">NIE</option>
                                <option value="11:00">NIE</option>
                                <option value="11:30">TAK</option>
                                <option value="12:00">NIE</option>
                                <option value="12:30">TAK</option>
                                <option value="13:00">NIE</option>
                                <option value="13:30">NIE</option>
                                <option value="14:00">TAK</option>
                                <option value="14:30">NIE</option>

                                <option value="04:30">TAK</option>
                                <option value="05:00">NIE</option>
                                <option value="05:30">NIE</option>
                                <option value="06:00">TAK</option>
                                <option value="06:30">NIE</option>
                                <option value="07:00">TAK</option>
                                <option value="07:30">NIE</option>
                                <option value="08:00">TAK</option>
                                <option value="08:30">NIE</option>
                                <option value="09:00">TAK</option>
                                <option value="09:30">NIE</option>
                                <option value="10:00">TAK</option>
                            </select> -->
                            <label for="MonHours">Godzina zamkniecia Poniedziałek:</label>
                            <input type="time" name="MonClose" style='text-align:center;'>
                            <!-- <select name="MonClose" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->

                            <label for="TueHours">Godzina otwarcia Wtorek:</label>
                            <input type="time" name="TueOpen" style='text-align:center;'>
                            <!-- <select name="TueOpen" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->
                            <label for="TueHours">Godzina zamkniecia Wtorek:</label>
                            <input type="time" name="TueClose" style='text-align:center;'>
                            <!-- <select name="TueClose" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->

                            <label for="WedHours">Godzina otwarcia Środa:</label>
                            <input type="time" name="WedOpen" style='text-align:center;'>
                            <!-- <select name="WedOpen" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->
                            <label for="WedHours">Godzina zamkniecia Środa:</label>
                            <input type="time" name="WedClose" style='text-align:center;'>
                            <!-- <select name="WedClose" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->

                            <label for="ThuHours">Godzina otwarcia Czwartek:</label>
                            <input type="time" name="ThuOpen" style='text-align:center;'>
                            <!-- <select name="ThuOpen" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->
                            <label for="ThuHours">Godzina zamkniecia Czwartek:</label>
                            <input type="time" name="ThuOpen" style='text-align:center;'>
                            <!-- <select name="ThuClose" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->

                            <label for="FriHours">Godzina otwarcia Piątek:</label>
                            <input type="time" name="FriOpen" style='text-align:center;'>
                            <!-- <select name="FriOpen" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->
                            <label for="FriHours">Godzina zamkniecia Piątek:</label>
                            <input type="time" name="FriClose" style='text-align:center;'>
                            <!-- <select name="FriClose" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->

                            <label for="SatHours">Godzina otwarcia Sobota:</label>
                            <input type="time" name="SatOpen" style='text-align:center;'>
                            <!-- <select name="SatOpen" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->
                            <label for="SatHours">Godzina zamkniecia Sobota:</label>
                            <input type="time" name="SatClose" style='text-align:center;'>
                            <!-- <select name="SatClose" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->

                            <label for="SunHours">Godzina otwarcia Niedziela:</label>
                            <input type="time" name="SunOpen" style='text-align:center;'>
                            <!-- <select name="SunOpen" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->
                            <label for="SunHours">Godzina zamkniecia Niedziela:</label>
                            <input type="time" name="SunClose" style='text-align:center;'>
                            <!-- <select name="SunClose" id="">
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                                <option value="0">NIE</option>
                                <option value="1">TAK</option>
                            </select> -->
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