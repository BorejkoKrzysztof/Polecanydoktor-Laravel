echo SEEDOWANIE BAZY DANYCH POLECANYDOKTOR.PL
echo MIGRACJA
pause
php artisan migrate
echo SEEDOWANIE
pause
php artisan db:seed --class=RoleTableSeeder
php artisan db:seed --class=UserTableSeeder
php artisan db:seed --class=DoctorsTableSeeder
php artisan db:seed --class=MedicalSpecialityTypesTableSeeder
php artisan db:seed --class=MedicalSpecialitySeeder
php artisan db:seed --class=SurgeryTableSeeder
php artisan db:seed --class=BuisnessHoursTableSeeder
php artisan db:seed --class=RatingsTableSeeder
php artisan db:seed --class=VisitsTableSeeder
php artisan db:seed --class=UpdateUserTableSeeder
echo KONIEC
pause