# Tasks-ALSalem

## Overview

This project is a web application built with a Laravel backend, a ReactJS frontend, and a MySQL database. The Laravel server handles API requests, authentication, and data management, while the ReactJS frontend provides a dynamic and responsive user interface.

## Table of Contents

- [Installation](#installation)
  - [Prerequisites](#prerequisites)
  - [Backend Setup](#backend-setup)
  - [Frontend Setup](#frontend-setup)
- [Configuration](#configuration)
  - [Backend Configuration](#backend-configuration)
  - [Frontend Configuration](#frontend-configuration)
- [License](#license)

## Installation

### Prerequisites

Ensure you have the following installed on your machine:

- PHP >= 8.3
- Composer
- Node.js >= 12.x
- npm or Yarn
- MySQL

### Backend Setup

1. **Clone the repository:**

    ```sh
    git clone https://github.com/AzozzALFiras/Tasks-ALSalem.git
    cd Tasks-ALSalem
    ```

2. **Navigate to the Laravel project directory:**

    ```sh
    cd server
    ```

3. **Install dependencies:**

    ```sh
    composer install
    ```

4. **Copy the `.env.example` file to `.env`:**

    ```sh
    cp .env.example .env
    ```

5. **Generate an application key:**

    ```sh
    php artisan key:generate
    ```

6. **Set up your database:**

    - Open the `.env` file and update the database configuration with your MySQL credentials.

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

7. **Run database migrations:**

    ```sh
    php artisan migrate
    ```


### Frontend Setup

1. **Navigate to the ReactJS project directory:**

    ```sh
    cd ../frontend
    ```

2. **Install dependencies:**

    ```sh
    npm install
    # or
    yarn install
    ```

## Configuration

### Backend Configuration

The backend configuration is primarily handled through the `.env` file. Ensure all necessary environment variables are set correctly, including database credentials, mail settings, and other service configurations.

### Frontend Configuration

The frontend configuration can be managed through environment variables. Create a `.env` file in the `frontend` directory and add any necessary configurations, such as the API base URL.

Example `.env` file for the frontend:

```env
REACT_APP_API_URL=http://localhost:8000/api/v1
REACT_APP_TOKEN=9a427cc86da49dca6cc372a4d2992c91bc943a0f
```

## License
MIT License

Copyright (c) 2024 AzozzALFiras

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.




