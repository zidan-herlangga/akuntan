<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\Turnstile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'schedule_slot_id' => ['required', 'integer', Rule::exists('schedule_slots', 'id')],
            'service_id' => ['nullable', 'integer', Rule::exists('services', 'id')->where('is_active', true)],
            'client_name' => ['required', 'string', 'max:150'],
            'client_email' => ['required', 'email', 'max:150'],
            'client_phone' => ['required', 'string', 'max:30', 'regex:/^[0-9+\-\s()]+$/'],
            'company_name' => ['nullable', 'string', 'max:200'],
            'company_npwp' => ['nullable', 'string', 'max:30'],
            'financial_issue_description' => ['nullable', 'string', 'max:5000'],
            'source' => ['nullable', 'string', 'max:30'],
            'turnstile_token' => ['required', 'string', new Turnstile],
        ];
    }
}
