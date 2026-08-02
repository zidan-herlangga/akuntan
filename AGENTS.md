# AGENTS.md
## Guidelines & Directives for AI Coding Agents

Document Version: 1.0  
Project: Website Company Portfolio & Sistem Reservasi Konsultan Akuntansi (Laravel Stack)  
Target Framework: Laravel 12, FilamentPHP v4, Tailwind CSS, Alpine.js / Inertia.js  

---

## 1. Project Overview & Context

This document serves as the primary instructions and constraints guide for any AI coding agent (e.g., Cursor, Claude Dev, Copilot, Aider) working on this repository.

The goal of this project is to build a high-performance, SEO-optimized **Company Portfolio** and **Online Booking System** tailored for an **Accounting Consulting Firm**.

---

## 2. Technical Stack & Conventions

* **Backend:** Laravel 1.x / 11.x (PHP 8.2+)
* **Admin Panel:** FilamentPHP v4
* **Frontend:**
  * **Public Pages / SEO Focus:** Laravel Blade + Tailwind CSS v3 + Alpine.js
  * **Booking Form (Interactive UI):** Livewire v3 / Alpine.js or Inertia.js + Vue 3
* **Database:** MySQL 8.0 / PostgreSQL 15
* **Queue & Caching:** Redis + Laravel Queues
* **Third-Party Integrations:**
  * Google Calendar API (`spatie/laravel-google-calendar`)
  * WhatsApp API Gateway (Fonnte / Twilio)
  * Payment Gateway (Midtrans / Xendit - Optional)

---

## 3. Architecture & Coding Directives

### 3.1. Code Architecture Rules
1. **Skinny Controllers, Rich Services/Actions:**
   * Keep Controllers light. Business logic for booking, calendar sync, and notification dispatch MUST be encapsulated inside dedicated Action classes (e.g., `App\Actions\Booking\CreateBookingAction`).
2. **Form Requests & Validation:**
   * Always validate input via custom `FormRequest` classes (`App\Http\Requests\*`). Never write validation logic directly inside Controllers.
3. **Database Migrations & Models:**
   * Strict type declaration (`declare(strict_types=1);`) on model methods where applicable.
   * Define explicit mass-assignment `$fillable` array or `$guarded = []`.
   * Include clear Foreign Key constraints and indexes on high-query columns (e.g., `booking_date`, `status`, `consultant_id`).
4. **Queue & Asynchronous Execution:**
   * All external API calls (WhatsApp notifications, Google Calendar sync, Email dispatch) **MUST** be handled inside queued Jobs (`App\Jobs\*`).
   * Never execute external HTTP requests synchronously inside the HTTP response cycle.

---

## 4. Primary Domain Models & Modules

AI Agents modifying or extending the code must align with the following module boundaries:

### Module 1: Portfolio & CMS (Filament Managed)
* `Services`: Accounting service details, pricing tiers, icons.
* `CaseStudies`: Client portfolio, success metrics, NDA compliance filters.
* `TeamMembers`: Consultant profiles, CPA/CA certifications, avatars.
* `Articles`: SEO blog posts, categories, tags, dynamic slug generators.

### Module 2: Booking Engine & Schedules
* `Consultants`: Work schedules, slot durations (e.g., 45 mins), buffer times.
* `Schedules`: Available/blocked dates and daily time windows.
* `Bookings`: Client info, selected service, booking time, status (`pending`, `confirmed`, `completed`, `cancelled`), meeting links (Google Meet/Zoom), uploaded initial financial documents.

---

## 5. Security & Data Protection Guidelines

* **Document Upload Safety:** Validate file types strictly for initial document uploads (`pdf`, `xlsx`, `docx`, max 10MB). Store uploaded client files in private storage buckets (`storage/app/private`), never in the public root.
* **Data Privacy (Accounting Context):** Encrypt sensitive business info fields (e.g., Company NPWP, financial issues description) using Laravel's native `Crypt` or Eloquent Attribute Casting (`'encrypted'`).
* **CSRF & Rate Limiting:** Apply `throttle` middleware on public booking endpoints to prevent slot hoarding attacks.

---

## 6. Testing Directives

AI agents generating new features or refactoring code MUST include tests:

* **Unit Tests:** For Action classes and calculation helpers (e.g., available slot algorithm).
* **Feature Tests (PestPHP or PHPUnit):**
  * Test complete booking submission flow.
  * Test validation errors on overlapping booking slots (double-booking prevention).
  * Test Filament Admin CRUD operations for portfolio items.
* Command to execute: `php artisan test` or `./vendor/bin/pest`.

---

## 7. AI Agent Execution Checklist

When tasked with implementing a feature, the AI Agent must follow this workflow:

1. **Check Existing Code:** Review schema and existing models before creating new ones.
2. **Migration & Model:** Generate well-indexed migration and Eloquent model with proper relationships.
3. **Action / Service:** Write the core business logic.
4. **Form Request & Controller/Livewire:** Build input handler with validation.
5. **Filament Resource:** Register admin management components in `App\Filament\Resources`.
6. **Tests:** Provide PHPUnit/Pest test coverage for the feature.
7. **Code Style:** Format code according to Laravel Pint (`vendor/bin/pint`).

---

## 8. Communication & Commit Style

* Use concise commit messages in conventional commit format:
  * `feat(booking): implement slot availability calculation action`
  * `fix(cms): fix image upload field on Filament team resource`
  * `docs(prd): update architectural specs in AGENTS.md`