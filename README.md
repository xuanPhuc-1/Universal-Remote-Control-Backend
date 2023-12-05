<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# UNIVERSAL IR REMOTE CONTROL SYSTEM

## Description

The **UNIVERSAL IR REMOTE CONTROL SYSTEM** project is an IoT (Internet of Things) system built with Laravel, designed to manage and interact with IoT devices. This system provides APIs for data collection, user management, and various tasks related to IoT.

## Features

-   **User Management:** Register, login, and manage user information.
-   **Device Management:** Register, delete, and update information for IoT devices.
-   **Data Collection:** APIs for collecting data from IoT devices.
-   **Device Interaction:** APIs for tasks like turning devices on/off, configuring, etc.
-   **Security:** User authentication and authorization, API protection.

## Installation

1. **System Requirements:**

    - PHP >= 7.4
    - Composer
    - MySQL or another database management system
    - ...

2. **Clone the Project:**
    ```bash
    git clone
    ```
3. **Install Dependencies:**
    ```bash
    composer install
    ```
4. **Generate Key:**
    ```bash
    php artisan key:generate
    ```
5. **Create Database:**
    ```bash
    php artisan migrate
    ```
6. **Publish Vendor:**
    ```bash
    php artisan vendor:publish
    ```
    **Pick Provider number of Provider: Tymon\JWTAuth\Providers\LaravelServiceProvider**
7. **generate screte key:**
    ```bash
    php artisan jwt:secret
    ```
8. **Create Storage Link:**
    ```bash
    mkdir -p storage/[folders] ex:profiles, images, ...
    php artisan storage:link
    ```
9. **Run the Project:**
    ```bash
    php artisan serve
    ```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Contributors

-   [Ngô Lê Xuân Phúc](https://github.com/xuanPhuc-1)
-   [Lê Đức](https://github.com/DuCLeK65t)
-   [Nguyễn Phương Nga](https://github.com/phuongnga28)
-   [Nguyễn Huy Tú](https://github.com/renadayne)
-   [Đinh Triệu Đan](https://github.com/trd02)

# Contact

# References

-   [Laravel](https://laravel.com/)
-   [JWT](https://jwt-auth.readthedocs.io/en/develop/)
-   [UNIVERSAL IR REMOTE CONTROL SYSTEM - EMBEDDED SYSTEM](https://github.com/DuCLeK65t/Universal-IR-Remote-Control-System.git)
-   [UNIVERSAL IR REMOTE CONTROL SYSTEM - Mobile Application](https://github.com/xuanPhuc-1/Universal-Remote-Control-App)
-   [Deploy Laravel Project on Raspberry Pi 4](https://github.com/aschmelyun/docker-compose-laravel)
-   [MySQL](https://www.mysql.com/)
-   [Postman](https://www.postman.com/)
-   [Docker](https://www.docker.com/)