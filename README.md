# Lack
Lack Backend system.
Latch will give you real cash rewards just for using our lockscreen. We will be showing you the latest trending news and interesting personalized ads on the first screen of your phone. There’s no need for you to do anything more - just go about your normal day - swipe, unlock, use and finally redeem the cash rewards or gift cards.

The Backend will assist with the Company and Advert upload management

# Server Requirements
- PHP >= 7.1.3
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

# Install Laravel:
https://laravel.com/docs/5.8

# Ensure you are updated, create optimization files, migrate DB, Seed and run server
## Run in console inside location "Lack"

	$ cd Lack
	$ composer update
	$ php artisan clear-compiled
	$ composer dump-autoload
	$ php artisan optimize
	$ php artisan view:clear
	$ php artisan migrate:fresh
	$ php artisan db:seed
	$ php artisan serve
	
# Connect
	http://localhost:8000/