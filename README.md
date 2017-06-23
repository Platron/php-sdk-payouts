Platron Atol SDK
===============
## Установка

Проект предполагает через установку с использованием composer
<pre><code>composer require platron/php-sdk-payout</pre></code>

## Тесты
Для работы тестов необходим PHPUnit, для установки необходимо выполнить команду
```
composer install
```
Для того, чтобы запустить интеграционные тесты нужно скопировать файл tests/integration/MerchantSettingsSample.php удалив 
из названия Sample и вставив настройки магазина. После выполнить команду из корня проекта
```
vendor/bin/phpunit tests/integration
```

## Примеры использования

