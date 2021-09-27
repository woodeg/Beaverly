# Beaverly

Customer relationship manegment WebApp for small companies

Programm Languages and Components: PHP, TWIG, JS, HTML, CSS, SASS, Bootstrap, FontAwesome

Framework: Symfony

## MD Syntax

[Correct link syntax](https://www.example.com/)

`some text`

```php
# Fenced code
```

### Start

#### 27.09.2021

* New project: *composer create-project symfony/website-skeleton Beaverly*
* GIT:

>git init
>git add --all
>git commit -m"v0.0.1. Start"
>git remote add origin <https://github.com/woodeg/Beaverly.git>
>git pull
>git push origin master
>
>[Beaverly on GIT](https://github.com/woodeg/Beaverly.git)

* Add User entity: *symfony console make:user*
* Add attributs **firstName, lastName, isActive, userDescription** to User entity: *symfony console make:entity User*
* Add attribut **plainPassword** to User entity
* Add to GIT
* Adjust database link at .env
* Create database *symfony console doctrine:database:create*
* Force database *symfony console doctrine:schema:update --force*
* Add to GIT
