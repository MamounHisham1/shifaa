# Shifaa - Medical Appointment Management System

Shifaa is a comprehensive medical appointment management system built with Laravel 11. It provides a robust API to manage doctors, patients, schedules, appointments, and more.

## Features

*   **User Management:** User registration and authentication for doctors and patients.
*   **Profile Management:** Users can manage their profiles.
*   **Doctor Management:** Create, read, update, and delete doctor records.
*   **Patient Management:** Create, read, update, and delete patient records.
*   **Specialty Management:** Manage medical specialties.
*   **Schedule Management:** Doctors can manage their schedules.
*   **Appointment Management:** Patients can book appointments with doctors.
*   **Search:** Search for doctors by specialty.

## Installation

1.  Clone the repository:
    ```bash
    git clone https://github.com/your-username/shifaa.git
    ```
2.  Install dependencies:
    ```bash
    composer install
    ```
3.  Create a copy of the `.env.example` file and name it `.env`:
    ```bash
    cp .env.example .env
    ```
4.  Generate an application key:
    ```bash
    php artisan key:generate
    ```
5.  Configure your database in the `.env` file.
6.  Run the database migrations:
    ```bash
    php artisan migrate
    ```
7.  Seed the database (optional):
    ```bash
    php artisan db:seed
    ```
8.  Start the development server:
    ```bash
    php artisan serve
    ```

## API Endpoints

All endpoints are prefixed with `/api/v1`.

| Method   | URI                               | Name                      | Description                      | Middleware    |
| -------- | --------------------------------- | ------------------------- | -------------------------------- | ------------- |
| POST     | `/register`                       | `register`                | Register a new user              |               |
| POST     | `/login`                          | `login`                   | Log in a user                    |               |
| GET|HEAD | `/profiles`                       | `profiles.index`          | Display a listing of the resource. | `auth:sanctum` |
| POST     | `/profiles`                       | `profiles.store`          | Store a newly created resource in storage. | `auth:sanctum` |
| GET|HEAD | `/profiles/{profile}`             | `profiles.show`           | Display the specified resource.  | `auth:sanctum` |
| PUT|PATCH| `/profiles/{profile}`             | `profiles.update`         | Update the specified resource in storage. | `auth:sanctum` |
| DELETE   | `/profiles/{profile}`             | `profiles.destroy`        | Remove the specified resource from storage. | `auth:sanctum` |
| GET|HEAD | `/doctors`                        | `doctors.index`           | Display a listing of the resource. |               |
| POST     | `/doctors`                        | `doctors.store`           | Store a newly created resource in storage. |               |
| GET|HEAD | `/doctors/{doctor}`               | `doctors.show`            | Display the specified resource.  |               |
| PUT|PATCH| `/doctors/{doctor}`               | `doctors.update`          | Update the specified resource in storage. |               |
| DELETE   | `/doctors/{doctor}`               | `doctors.destroy`         | Remove the specified resource from storage. |               |
| GET|HEAD | `/specialties`                    | `specialties.index`       | Display a listing of the resource. |               |
| POST     | `/specialties`                    | `specialties.store`       | Store a newly created resource in storage. |               |
| GET|HEAD | `/specialties/{specialty}`        | `specialties.show`        | Display the specified resource.  |               |
| PUT|PATCH| `/specialties/{specialty}`        | `specialties.update`      | Update the specified resource in storage. |               |
| DELETE   | `/specialties/{specialty}`        | `specialties.destroy`     | Remove the specified resource from storage. |               |
| GET|HEAD | `/search-doctors`                 |                           | Search for doctors.              |               |
| GET|HEAD | `/patients`                       | `patients.index`          | Display a listing of the resource. | `auth:sanctum` |
| POST     | `/patients`                       | `patients.store`          | Store a newly created resource in storage. | `auth:sanctum` |
| GET|HEAD | `/patients/{patient}`             | `patients.show`           | Display the specified resource.  | `auth:sanctum` |
| PUT|PATCH| `/patients/{patient}`             | `patients.update`         | Update the specified resource in storage. | `auth:sanctum` |
| DELETE   | `/patients/{patient}`             | `patients.destroy`        | Remove the specified resource from storage. | `auth:sanctum` |
| GET|HEAD | `/schedules`                      | `schedules.index`         | Display a listing of the resource. | `auth:sanctum` |
| POST     | `/schedules`                      | `schedules.store`         | Store a newly created resource in storage. | `auth:sanctum` |
| GET|HEAD | `/schedules/{schedule}`           | `schedules.show`          | Display the specified resource.  | `auth:sanctum` |
| PUT|PATCH| `/schedules/{schedule}`           | `schedules.update`        | Update the specified resource in storage. | `auth:sanctum` |
| DELETE   | `/schedules/{schedule}`           | `schedules.destroy`       | Remove the specified resource from storage. | `auth:sanctum` |
| GET|HEAD | `/slots`                          | `slots.index`             | Display a listing of the resource. | `auth:sanctum` |
| POST     | `/slots`                          | `slots.store`             | Store a newly created resource in storage. | `auth:sanctum` |
| GET|HEAD | `/slots/{slot}`                   | `slots.show`              | Display the specified resource.  | `auth:sanctum` |
| PUT|PATCH| `/slots/{slot}`                   | `slots.update`            | Update the specified resource in storage. | `auth:sanctum` |
| DELETE   | `/slots/{slot}`                   | `slots.destroy`           | Remove the specified resource from storage. | `auth:sanctum` |
| GET|HEAD | `/appointments`                   | `appointments.index`      | Display a listing of the resource. | `auth:sanctum` |
| POST     | `/appointments`                   | `appointments.store`      | Store a newly created resource in storage. | `auth:sanctum` |
| GET|HEAD | `/appointments/{appointment}`     | `appointments.show`       | Display the specified resource.  | `auth:sanctum` |
| PUT|PATCH| `/appointments/{appointment}`     | `appointments.update`     | Update the specified resource in storage. | `auth:sanctum` |
| DELETE   | `/appointments/{appointment}`     | `appointments.destroy`    | Remove the specified resource from storage. | `auth:sanctum` |
| GET|HEAD | `/available-dates`                |                           | Get available appointment dates. | `auth:sanctum` |
| GET|HEAD | `/profile`                        |                           | Get the authenticated user's profile. | `auth:sanctum` |

## Database Schema

The database schema is defined by the migration files in the `database/migrations` directory. The main tables are:

*   `users`: Stores user information.
*   `profiles`: Stores user profiles.
*   `doctors`: Stores doctor information.
*   `patients`: Stores patient information.
*   `specialties`: Stores medical specialties.
*   `schedules`: Stores doctor schedules.
*   `slots`: Stores available appointment slots.
*   `appointments`: Stores appointment information.

## Usage

You can use a tool like [Postman](https://www.postman.com/) or [Insomnia](https://insomnia.rest/) to interact with the API.

## Contributing

Contributions are welcome! Please feel free to submit a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.