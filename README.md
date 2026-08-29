# 🚀 TaskFlow

A modern task management application built with Laravel.

TaskFlow allows authenticated users to create, manage, organize, and track their personal tasks. Each user has their own private workspace and cannot access or modify tasks belonging to other users.

This project was built as a full-stack Laravel application to demonstrate real-world concepts including authentication, authorization, CRUD operations, database relationships, filtering, searching, pagination, and deployment.

---

## ✨ Features

### 🔐 Authentication & User Management

- User registration
- User login and logout
- Email verification
- Password reset
- Profile management
- Secure authentication using Laravel

### 📋 Task Management

Users can:

- Create tasks
- View task details
- Edit tasks
- Delete tasks
- Set task status
- Set task priority
- Add descriptions
- Set due dates

### 🔍 Search & Filtering

- Search tasks by title
- Filter tasks by status
- Filter tasks by priority
- Pagination for task listings

### 📊 Dashboard

The dashboard provides an overview of tasks, including:

- Total tasks
- Pending tasks
- Tasks in progress
- Completed tasks

### 🔒 Authorization & Security

TaskFlow implements authorization to ensure users can only access their own tasks.

Users cannot:

- View another user's task
- Edit another user's task
- Delete another user's task

This is implemented using Laravel authorization policies and user-task relationships.

---

## 🛠️ Tech Stack

### Backend

- PHP 8.2+
- Laravel 12
- Laravel Eloquent ORM

### Frontend

- Blade Templates
- Bootstrap
- Vite

### Database

- MySQL
- PostgreSQL (Production)

### Authentication

- Laravel Authentication
- Laravel Policies
- Email Verification

### Deployment

- Docker
- Render
- PostgreSQL

---

## 🏗️ Project Architecture

TaskFlow follows Laravel's MVC architecture.

```text
app/
├── Http/
│   └── Controllers/
│       └── TaskController.php
│
├── Models/
│   ├── Task.php
│   └── User.php
│
└── Policies/
    └── TaskPolicy.php

resources/
└── views/
    └── tasks/

routes/
└── web.php

database/
├── migrations/
└── factories/
