# Task Management API

This project provides an API for managing tasks. You can create, list, update (mark as complete), and delete tasks. The API is built using Laravel and provides the following routes:

- POST /api/v1/tasks - Create a new task
- GET /api/v1/tasks - List all tasks
- PUT /api/v1/tasks/{id} - Mark a task as complete
- DELETE /api/v1/tasks/{id} - Delete a task

## Table of Contents
- [Setup](#setup)
- [API Endpoints](#api-endpoints)
- [Testing](#testing)


### 1. Clone the Project

Clone this repository to your local machine using Git.

(https://github.com/TapasSahoo78/laravel-assignment-elevator-system.git)

### 2. Setup the Environment File

Navigate to the project directory and copy the `.env.example` file to create your `.env` file.

cp .env.example .env

### 3. Install Dependencies

Run the following command to install all necessary dependencies using Composer:

composer install

### 4. Setup the Database

Make sure your database is configured in the `.env` file.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_assignment
DB_USERNAME=root
DB_PASSWORD=

### 5. Run Migrations

Run the migrations to create the necessary tables in your database:

php artisan migrate

### 6. Generate Application Key

Generate a new application key:

php artisan key:generate


## API Endpoints

### 1. POST /api/v1/tasks

This endpoint allows you to create a new task.

#### Request Body:
{
  "title": "New Task Title",
  "description": "Description of the task."
}

#### Response:
{
  "status": true,
  "statusCode": 201,
  "message": "Record created successfully",
  "data": {
    "id": 1,
    "title": "New Task Title",
    "description": "Description of the task",
    "is_completed": false,
    "created_at": "2024-11-17T12:34:56",
    "updated_at": "2024-11-17T12:34:56"
  }
}

### 2. GET /api/v1/tasks

This endpoint returns a list of all tasks.

#### Response:
{
  "status": true,
  "statusCode": 200,
  "message": "Record fetched successfully",
  "data": [
    {
      "id": 1,
      "title": "Task 1",
      "description": "First task description",
      "is_completed": false,
      "created_at": "2024-11-17T12:34:56",
      "updated_at": "2024-11-17T12:34:56"
    },
    {
      "id": 2,
      "title": "Task 2",
      "description": "Second task description",
      "is_completed": true,
      "created_at": "2024-11-16T12:00:00",
      "updated_at": "2024-11-16T12:30:00"
    }
  ]
}

### 3. PUT /api/v1/tasks/{id}

This endpoint allows you to mark a task as complete.

#### Request Body:
{
  "status": true
}

#### Response:
{
  "status": true,
  "statusCode": 200,
  "message": "Record updated successfully",
  "data": {
    "id": 1,
    "title": "Task 1",
    "description": "First task description",
    "is_completed": true,
    "created_at": "2024-11-17T12:34:56",
    "updated_at": "2024-11-17T12:45:00"
  }
}

### 4. DELETE /api/v1/tasks/{id}

This endpoint deletes a task.

#### Response:
{
  "status": true,
  "statusCode": 200,
  "message": "Task deleted successfully"
}
