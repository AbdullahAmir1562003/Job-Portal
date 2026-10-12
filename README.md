<div align="center">

# 💼 Job Portal Engine

A full-stack, responsive employment and recruitment platform powered by a clean Laravel MVC architecture, role-based workflows, and modern Tailwind CSS design.

<p align="center">
  <img src="https://skillicons.dev/icons?i=php,laravel,js,html,css,tailwind,mysql,vite&theme=dark" alt="Tech Stack Badges" />
</p>

</div>

---

### 🌟 Key Features

* **Role-Based Access Control (RBAC):** Distinct dashboards and guarded routes for both Employers and Job Seekers.
* **Job Posting & Lifecycle Management:** Comprehensive recruiter controls to create, publish, edit, and delete openings with structured requirements and salary parameters.
* **Candidate Application Pipeline:** Real-time job seeker application submissions and direct candidate tracking for employers.
* **Modern Reactive Interface:** Sleek, accessible UI styled with Tailwind CSS, Blade components, and Vite-accelerated asset compilation.
* **Enterprise Security Defaults:** Built-in protection against CSRF and SQL injection, paired with Laravel Breeze session authentication and bcrypt password hashing.

---

### 🛠️ Tech Stack

* **Backend:** PHP & Laravel 11
* **Frontend:** Laravel Blade Components & Tailwind CSS
* **Build System:** Vite
* **Database:** MySQL / SQLite
* **Authentication:** Laravel Breeze

---

### 📂 Directory Overview

```text
Job-Portal/
├── app/
│   ├── Http/
│   │   ├── Controllers/     # JobPostController, JobApplicationController, Breeze Auth
│   │   ├── Middleware/      # EnsureUserIsEmployer & session guards
│   │   └── Requests/        # Form validation handlers
│   └── Models/              # User, JobPost, JobApplication Eloquent models
├── database/
│   └── migrations/          # Relational database schemas
├── resources/
│   ├── views/
│   │   ├── jobs/            # Job board, application views, employer management
│   │   └── layouts/         # Master Blade layout components
│   └── css / js             # Tailwind configuration & Vite entrypoints
├── routes/
│   ├── web.php              # Web application routes
│   └── auth.php             # Authentication route endpoints
└── README.md
