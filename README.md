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

#### 11.10.2021

* New project: *composer create-project symfony/website-skeleton Beaverly*
* GIT:

>git init
>
>git add --all
>
>git commit -m"v0.0.1. Start"
>
>git remote add origin <https://github.com/woodeg/Beaverly.git>
>
>git pull
>
>git push origin master
>
>[Beaverly on GIT](https://github.com/woodeg/Beaverly.git)

* Add User entity: *symfony console make:user*
* Add attributs **firstName, lastName, isActive, userDescription** to User entity: *symfony console make:entity User*
* Add attribut **plainPassword** to User entity
* Add to GIT
* Adjust database link at .env
* Create database: *symfony console doctrine:database:create*
* Force database: *symfony console doctrine:schema:update --force*
* Add to GIT
* Create Authorization: *symfony console make:auth*
* Change SecurityController and UserAuthenticator
* Set roles at security.yaml
* Create MainController
* Add Bootstrap 5
* Tests
* Add to GIT
* Install fixtures *composer require --dev orm-fixtures*
* Make fixtures
* Load fixtures: *symfony console doctrine:fixtures:load*
* Make registration form *symfony console make:registration-form*
* Change role hierarchy
* Delete default "ROLE_USER" role from User entity
* Add to GIT

#### 12.10.2021

* Udpade login template
* Change depricated UserPasswordEncoderInterface to new UserPasswordHasherInterface
* Change RegistrationController
* Change AppFixtures
* Add background to login template
* Udpade login template
* Add custom.scss
* Add to GIT
* Create Group entity *symfony console make:entity Group*
* Force database *symfony console doctrine:schema:update --force*
* Create TestController *symfony console make:controller TestController*
* Tests
* Add groups to Registration form
* Make Contact entity *symfony console make:entity Contact*
* Force database *symfony console doctrine:schema:update --force*
* Tests
* Add to GIT
