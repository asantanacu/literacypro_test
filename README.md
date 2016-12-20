# literacypro_test
LiteracyPro Test

#Step 1 Get source code
Clone the project from https://github.com/asantanacu/literacypro_test.git
or download and unzip the files.

#Step 2 Install vendors
Run composer install

#Step 3 Create .env file
linux: cp .env.example .env  
windows: copy .env.example .env

#Step 4 generate key
php artisan key:generate

#Step 5 Config database
Open file .env and configure the database (it works with default configuration for vagrant homestead)  
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=homestead  
DB_USERNAME=homestead  
DB_PASSWORD=secret

#Step 6 run migrations
php artisan migrate

#Step 7 run seeds to insert dummy inital data
php artisan db:seed

#Step 8 point the host to the publi folder

#Step 9 navigate to the website and login with the seeds data
user: literacypro_test@gmail.com  
password: secret
