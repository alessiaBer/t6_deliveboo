<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



• Gestione dati DB:

Table Plates:
-plate_id | BIGINTEGER(AI, PK)
-name | VARCHAR 30
-img_url | VARCHAR 255
-restaurant_id | BIGINTEGER (FK)
-description | TEXT
-price | DECIMAL (5,2)
-available | BOOLEAN

Table Restaurants:
-restaurant_id | BIGINTEGER(AI, PK)
-phone | VARCHAR
-address | VARCHAR
-description | TEXT
-rating | DECIMAL (numero con decimali)
-statistics | //non so come gestirlo, da chiedere in fase di revisione DB//

Table Orders:
-order_id | BIGINTEGER(AI, PK)
-fullname | VARCHAR
-address | VARCHAR
-cellphone | VARCHAR
-email | VARCHAR
-total_price | DECIMAL (6,2)
-payment_id | BIGINTEGER(FK)

Table RestaurantOwners:
-restaurantOwner_id | BIGINTEGER(AI, PK)
-restaurant_id | BIGINTEGER (FK)
-nome | VARCHAR
-email | VARCHAR
-password | VARCHAR

Table Allergens:
-allergene_id | BIGINTEGER(AI, PK)
-name | VARCHAR

Table Types:
-type_id | BIGINTEGER(AI, PK)
-name | VARCHAR

Table Payment_method:
-payment_method_id | BIGINTEGER(AI, PK)
-name | VARCHAR


• PIVOT TABLES:

Order_Plate:
-order_id: BIGINTEGER (FK)
-plate_id: BIGINTEGER (FK)
-quantity: INTEGER //CHIEDERE SE VA MESSO IL NUMERO DI PIATTI NELLA PIVOT O SE ESISTE UN WORKAROUND
-price: DECIMAL (4,2) 

Restaurant_Type:
-restaurant_id: BIGINTEGER (FK)
-type_id: BIGINTEGER (FK)

Allergene_Plate:
-allergen_id: BIGINTEGER (FK)
-plate_id: BIGINTEGER (FK)

• RELATIONS

Ristoratori->1 to many->Restaurants 

Payment_methods->1 to many->Orders

Orders->many to many->Plates

Types->many to many->Restaurants

Allergenes->many to many->Plates


• INSTRUCTIONS

1 File .env modificare FILESYSTEM_DISK= public

2 Aggiungi `APP_FRONTEND_URL=http://localhost:5173` sotto `APP_URL` (controlla che il tuo URL Frontend sia uguale a questo)
