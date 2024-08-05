# 7-blog-backend
## Overview
The 7-blog-backend is a Laravel-based API backend for a blog platform. It provides RESTful endpoints for managing blog posts, comments, and user authentication. This backend is designed to work with a Nuxt.js frontend, which consumes the provided API for displaying and managing content.

## Features
- User Authentication: Register, login, and logout functionalities with API tokens managed by Laravel Sanctum.
- Blog Posts: Create, read, update, and delete blog posts.
- Comments: Add and manage comments on posts.
- API Documentation: Comprehensive API documentation for developers.
## Prerequisites
PHP ^8.0
Composer
MySQL or compatible database
Node.js & NPM (for running frontend or other dependencies)
## Installation
1. Clone the repository:

```bash
# npm
git clone https://github.com/yourusername/7-blog-backend.git
cd 7-blog-backend
```

 2. Install dependencies:
```bash
# npm
composer install
```

 3. Copy the .env.example file to .env and configure your environment variables:
```bash
# npm
cp .env.example .env
```
 4. Generate an application key:
```bash
# npm
php artisan key:generate
```


 5. Set up your database and update your .env file accordingly:
```bash
# makefile
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

 6. Run database migrations:
```bash
# npm
php artisan migrate
```

 7. Run database seeders (optional):
```bash
# npm
php artisan db:seed
```
## Usage
 1. Start the development server:
```bash
# npm
php artisan serve
```

 2. Access the API at http://localhost:8000/api.

## API Endpoints
Authentication
 * Register: POST /api/register
 * Login: POST /api/login
 * Logout: POST /api/logout
Posts
 * List Posts: GET /api/posts
 * Get Single Post: GET /api/posts/{id}
 * Create Post: POST /api/posts (authenticated)
 * Update Post: PUT /api/posts/{id} (authenticated)
 * Delete Post: DELETE /api/posts/{id} (authenticated)
Comments
 * List Comments: GET /api/posts/{postId}/comments
 * Create Comment: POST /api/posts/{postId}/comments (authenticated)
 * Delete Comment: DELETE /api/comments/{id} (authenticated)