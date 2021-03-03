# task_manager
При разработке использовались: Ubuntu 20.04, PHP 7.4.7 (cli), Composer version 1.10.8, mySQL  Ver 8.0.20-0ubuntu0.20.04.1 for Linux on x86_64 ((Ubuntu))

#### Настройка проекта и установка всех необходимых компонентов:
Клонирование локального репозитория:
```
git clone https://github.com/wherevlad/task-manager.git
cd task-manager/
```

Установка зависимостей:  
```
composer install
```

Открыть файл .env и заполнить/изменить в нем нужные переменные  
Пример создание БД и пользователя с необходимыми правами доступами к ней: 
```
mysql -uroot -p
CREATE DATABASE home CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'user'@'localhost' identified by 'password';
GRANT ALL on home.* to 'user'@'localhost';
quit
```
Для создания таблиц в БД и тестовых данных выполнить команду:
```
php dbseed.php
```

Запустить сервер командой:
```
php -S 127.0.0.1:8000 -t public
```
