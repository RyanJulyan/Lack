# blastHUB
iMining BlastHUB system

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
##Run in console inside location "blastHUB"
	http://localhost:8000/
	$ cd blastHUB
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