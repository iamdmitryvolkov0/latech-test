fix:
	tools/php-cs-fixer/vendor/bin/php-cs-fixer fix app

check:
	vendor/bin/phpstan analyse -c phpstan.neon
