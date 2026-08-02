# AGENTS.md
## Guidelines & Directives for AI Coding Agents (Hardened Security Edition)

Document Version: 1.0
Project: Website Company Portfolio & Sistem Reservasi Konsultan Akuntansi (Laravel Stack)  
Target Framework: Laravel 12.x, FilamentPHP v3, Tailwind CSS, Livewire v3, Redis, Spatie Security Packages  

---

## 1. Security First Directives & Code Safety Baseline

ALL AI coding agents (Cursor, Claude Dev, Aider, Copilot) operating on this repository MUST strictly enforce the following security rules. **Failing to follow these security rules is considered a critical bug.**

### 1.1. Absolute Security Mandates
1. **Never Expose Direct Storage Paths:** ALL uploaded client files MUST be stored in `storage/app/private` or a private S3 bucket (`BlockPublicAccess: True`). NEVER use `Storage::disk('public')` for client financial documents.
2. **Short-Lived Signed URLs:** Admin/Consultant document access MUST use Temporary Signed URLs expiring in $\le 15$ minutes (`Storage::temporaryUrl()`).
3. **Sensitive Data Encryption:** Database attributes storing sensitive financial data (NPWP, omzet, deskripsi kasus) MUST use Eloquent Attribute Casting `'encrypted'` or Laravel `Crypt::encrypt()`.
4. **Enforce Rate Limiting & Captcha:** ALL public endpoints (Booking submit, Contact form) MUST be protected with `throttle:5,1` middleware and Cloudflare Turnstile validation.
5. **Multi-Factor Authentication (MFA):** ALL Filament Admin/Consultant users MUST have MFA enabled. Never bypass 2FA checks in code.

---

## 2. Technical Stack & Security Packages

* **Backend:** Laravel 12.x (PHP 8.3+)
* **Admin Panel:** FilamentPHP v3
* **Security & Audit Packages:**
  * `spatie/laravel-activitylog` (Audit Trail & Logging)
  * `spatie/laravel-permission` (Role-Based Access Control)
  * `spatie/laravel-csp` (Content Security Policy)
* **Storage & File Security:**
  * AWS S3 / MinIO (Private Bucket)
  * ClamAV Virus Scanner (`spatie/laravel-medialibrary` pipeline)
* **Authentication:** Fortify / Filament 2FA (TOTP / Authenticator App)

---

## 3. Code Architecture & Hardening Rules

### 3.1. Controller & Action Architecture
1. **Strict Type Declarations:** Every PHP file MUST start with `declare(strict_types=1);`.
2. **Encapsulated Business Logic:** Controllers and Livewire components MUST be thin. Use Action classes (`App\Actions\Booking\CreateBookingAction`).
3. **Form Request Validation:** Validate all input via `FormRequest`. Enforce strict file extension (`mimes:pdf,xlsx,docx`), MIME-type validation, and max file size ($\le 10	ext{ MB}$).

### 3.2. Database & Query Safety
1. **No Raw SQL Vulnerabilities:** ALWAYS use Eloquent ORM or Query Builder parameterized bindings. Raw SQL with variable concatenation is BANNED.
2. **Atomic Transactions & Locks:** Use `DB::transaction()` with pessimistic locking (`lockForUpdate()`) on schedule slots during booking creation to prevent double-booking race conditions.
3. **Mass-Assignment Protection:** Use explicit `$fillable` arrays. Never use `$guarded = []`.

### 3.3. Asynchronous & Queue Isolation
1. **Queued Jobs:** External HTTP integrations (Google Calendar, WhatsApp API Gateway, Email Notifications) MUST run asynchronously via Laravel Queue & Redis.
2. **Encrypted Queue Payloads:** Ensure sensitive data inside Queue Jobs is encrypted or minimized to IDs.

---

## 4. Domain Models & Security Implementations

### Module 1: Portfolio & CMS (Public Facing)
* `Service`, `CaseStudy`, `TeamMember`, `Article`.
* **Requirement:** Escape all HTML output (`{{ $content }}`). If rich text is required, pass it through an HTML Sanitizer (e.g., HTMLPurifier).

### Module 2: Booking Engine & Client Data (Private & Encrypted)
* `Consultant`, `ScheduleSlot`, `Booking`, `ClientDocument`.
* **Model Configuration Example:**
```php
class Booking extends Model
{
    protected $casts = [
        'company_npwp' => 'encrypted',
        'financial_issue_description' => 'encrypted',
        'status' => BookingStatus::class,
    ];
}
```

---

## 5. Audit Trail & Logging Directives

Every mutating action on client data MUST generate an audit log via `spatie/laravel-activitylog`:
* Log action name (`view_document`, `create_booking`, `update_status`, `delete_record`).
* Log actor ID, IP Address, and User-Agent.
* Mask or exclude encrypted fields from activity log properties.

---

## 6. Testing & Quality Assurance Rules

AI Agents adding or updating code MUST include test coverage (PestPHP or PHPUnit):

1. **Security Feature Tests:**
   * Test unauthorized access to private document downloads (MUST return 403/404).
   * Test double-booking race conditions.
   * Test file upload validation (reject `.php`, `.exe`, `.sh`, `.svg` files).
   * Test Rate Limiter execution on public booking APIs.
2. **Execution Command:** `php artisan test --parallel` or `./vendor/bin/pest`.

---

## 7. AI Agent Execution Checklist

Before submitting code changes, the AI Agent MUST verify:

- [ ] `declare(strict_types=1);` present in all new files.
- [ ] No unencrypted sensitive fields in database migrations/models.
- [ ] Private storage used for client files with temporary signed URLs for access.
- [ ] Rate limiting and Turnstile Captcha applied to public inputs.
- [ ] Activity Log attached to sensitive model changes.
- [ ] Code formatted with Laravel Pint (`vendor/bin/pint`).
- [ ] All tests passing with Zero security regressions.