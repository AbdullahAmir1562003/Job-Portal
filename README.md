# 💼 Job Portal — Full-Stack Employment & Recruitment Platform

A modern, full-stack recruitment platform built with Laravel, Blade, and Tailwind CSS. Designed with role-based access control (RBAC) to serve two distinct user experiences: job seekers applying for positions and employers managing listings and applicants.

---

## 🌟 Key Features

### 🏢 For Employers
* **Job Posting & Management:** Create, update, publish, and delete job openings with rich descriptions, requirements, and salary details.
* **Applicant Tracking:** Review candidates, view submitted details, and track application pipelines.
* **Role-Based Guards:** Dedicated middleware ensuring employer-only routes remain protected.

### 👨‍💻 For Job Seekers
* **Live Job Feed:** Search, browse, and filter available job postings across industries.
* **Direct Applications:** Streamlined single-click application workflow.
* **Application Dashboard:** Track the status of submitted applications in real time.

### 🛡️ Authentication & Security
* **Breeze-Powered Authentication:** Email verification, secure registration, password hashing (bcrypt), and password reset flows.
* **CSRF & SQL Injection Protection:** Built-in Laravel CSRF token verification and Eloquent ORM parameter binding.

---

## 🛠️ Tech Stack

### Backend & Architecture
* **Framework:** [Laravel 11](https://laravel.com/) (PHP)
* **ORM:** Eloquent ORM
* **Database:** MySQL / SQLite
* **Authentication:** Laravel Breeze

### Frontend
* **Templating:** Blade Components
* **Styling:** [Tailwind CSS](https://tailwindcss.com/)
* **Build Tool:** Vite

---

## 📂 Project Architecture

```text
Job-Portal/
├── app/
│   ├── Http/
│   │   ├── Controllers/     # JobPostController, JobApplicationController, Auth
│   │   ├── Middleware/      # EnsureUserIsEmployer & route protection
│   │   └── Requests/        # Form validation rules
│   └── Models/              # User, JobPost, JobApplication
├── database/
│   └── migrations/          # Schema migrations for users, jobs, applications
├── resources/
│   ├── views/
│   │   ├── jobs/            # Job index, create, show, applicants views
│   │   ├── layouts/         # Base application layouts (App & Guest)
│   │   └── dashboard.blade.php
│   └── css / js             # Tailwind & Vite frontend assets
├── routes/
│   ├── web.php              # Application web routes
│   └── auth.php             # Authentication routes
└── README.md
