# Web Development Project Requirements

## Machine Problems (20pts each)

- [ ] MP1
- [ ] MP2
- [ ] MP3
- [ ] MP4
- [ ] MP5

_Each machine problem requires the following:_

- [ ] CRUD functions with single image upload (15pts)
- [ ] CRUD functions using datatables with multiple image uploads (20pts)

## User/Customer Registration (15pts)

- [ ] User/customer profile should only be updated by the authenticated user
- [ ] Upload an image of the user
- [ ] Administrator can deactivate the user
- [ ] Upon user registration, the user will receive an email and confirm it (20pts)

## Term Test Lab (30pts)

- [ ] Transaction CRUD
- [ ] Send an email after the user completes the buying process
- [ ] The administrator/employee updates the status of the customer's order/s (20pts)
- [ ] The customer can now post a review/comment of the product/s bought. Only customers that bought the products/service can write a review (10pts)

## Unit 1 (20pts)

- [ ] Database design. Database should be normalized to at least 2NF (10pts)
- [ ] Create all database tables using migration scripts (5pts)
- [ ] Create database seeders for parent tables (5pts)

## Unit Test 2 (20pts)

- [ ] Program execution (errors) (10pts)
- [ ] UI/UX Design (10pts)

## Quizzes

- [ ] Quiz 1 (15pts): Form Validation. Check for validation errors on create and edit forms on MP1 - MP4
- [ ] Quiz 2 (15pts): Search function. Search for products or services on the homepage. The result of the search is a list of products/services with links to its details. Datatables search is not applicable.
- [ ] Quiz 3 (15pts): 3 charts (bar, line, pie) (10pts). 3 charts (bar, line, pie) with join query (15pts)
- [ ] Quiz 4 (15pts): Basic authentication. Authenticated users can access CRUD pages (10pts). Manual user authentication with roles. Only admin users can access CRUD pages. Only authenticated users can complete a transaction (15pts)

## Term Test

- [ ] Functional Requirements completeness (10pts)
- [ ] Code contribution (10pts)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation

```bash
composer install
composer update
cp .env.example .env
php artisan key:generate
npm install
php artisan mary:install
// no (wag iinstall ung livewire volt)
php artisan icons:cache
php artisan views:cache
php artisan config:cache
php artisan route:cache
php artisan cache:clear
php artisan icons:clear
php artisan serve | npm run dev
```

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

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
