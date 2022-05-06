## Запуск проекта

```shell
git clone git@github.com:andrey-silivanov/yellow_media_lumen.git
cd yellow_media_lumen
cp .env.example .env
```
### Запуск докера
```shell
docker-compose up -d
docker-compose exec php bash
composer install
php artisan db:create
php artisan migrate
php artisan db:seed
```
Также нужно настроить хост

Для linux: отредактировать файл /etc/hosts

```shell
127.0.0.1     lumen-test.local
```
## Тестовый пользователь

```json
{
    "email": "test@mail.com",
    "password": "123456"
}
```

## Почта

При сбросе пароля отправялется письмо пользователю с токеном для восстановления:
Письмо можно проверить http://localhost:8025/

## Postman

Коллекция для postman находится в папке postman
