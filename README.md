<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>Lamoda Tech Test Project</h1>
    Документация доступна по ссылке <a href="http://127.0.0.1:8000/api/documentation">Swagger</a>
<h2>Запуск проекта</h2>
    В корне проекта вызовите команду<code>make up</code>

<h2>Альтернатива</h2>
<ol>
<li>Запустите контейнеры <code>docker compose up -d</code></li>
<li>Скопируйте .env <code>cp .env.example .env</code>
<li>Для работы с командной строкой <code>docker compose exec laravel sh</code></li>
<li>Установите требуемые зависимости командой <code>composer install</code></li>
<li>Выполните миграции <code>php artisan migrate</code>, чтобы создать в БД необходимые таблицы.</li>
<li>Запустите Seeders <code>php artisan db:seed</code>, чтобы БД данными.</li>
</ol>
</body>
