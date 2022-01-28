git clone https://github.com/kp-makwana/Ecommerce-Laravel
cd Ecommerce-Laravel
composer install
echo 'Composer install successfully'
cp .env.example .env
php artisan key:generate
php artisan storage:link
echo 'CREATE database IF NOT EXISTS AAA'
mysql -u root -p Ecommerce-Laravel

php artisan migrate:fresh --seed
