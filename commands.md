cd laraprojects/
git clone https://github.com/narunbabu/ameyem-quiz.git
cd ~/public_html/skills/
mkdir quiz
cd quiz
cp -r ~/laraprojects/ameyem-quiz/public .
cp -r ~/laraprojects/ameyem-quiz/public/index.php .
cp -r ~/laraprojects/ameyem-quiz/.htaccess .
as there was no .htaccess 
cp -r ~/laratest/public/.htaccess .
cp -r index.php index1.php
cp -r ~/public_html/api/index.php index.php
vi index.php

in .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=thogativ_quiz
DB_USERNAME=
DB_PASSWORD=

in database/seeds/UserSeed.php
'name'           => 'Arun',
'email'          => 'ab@ameyem.com', and password

chmod -R o+w storage
/opt/cpanel/ea-php70/root/usr/bin/php artisan config:cache
/opt/cpanel/ea-php70/root/usr/bin/php artisan route:cache
/opt/cpanel/ea-php70/root/usr/bin/php artisan env

curl -sS https://getcomposer.org/installer | /opt/cpanel/ea-php70/root/usr/bin/php
/opt/cpanel/ea-php70/root/usr/bin/php composer.phar install


php artisan key:generate
/opt/cpanel/ea-php70/root/usr/bin/php composer install

/opt/cpanel/ea-php70/root/usr/bin/php artisan key:generate
/opt/cpanel/ea-php70/root/usr/bin/php artisan migrate --seed
php artisan serve

##update the env variables with 
php artisan config:cache
## in facebook app, you need to register your app
    #1. update app domains with skills.ameyem.com and ameyem.com
    #2. http://skills.ameyem.com/quiz/facebookcallback
    #3. keep clientauth login and web auth login as "yes"
    #4. Valid OAuth redirect URIs
    http://skills.ameyem.com/quiz/facebookcallback, http://skills.ameyem.com/quiz
## Change following in FacebookProvide.php in vendor/socialite
#from 
return Arr::add($data, 'expires_in', Arr::pull($data, 'expires'));
#to
$json = json_decode(key($data), true);
return Arr::add($json, 'expires_in', Arr::pull($json, 'expires'));


