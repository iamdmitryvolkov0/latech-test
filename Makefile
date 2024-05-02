fix:
	tools/php-cs-fixer/vendor/bin/php-cs-fixer fix app

check:
	vendor/bin/phpstan analyse -c phpstan.neon

up:
	docker compose up -d
	cp .env.example .env
	docker compose exec laravel composer i
	docker compose exec laravel php artisan migrate --seed
