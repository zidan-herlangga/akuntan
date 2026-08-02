<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(ContactFormRequest $request): JsonResponse
    {
        $data = $request->validated();

        Mail::to(config('mail.from.address'))
            ->send(new ContactMail($data));

        return response()->json(['message' => 'Pesan berhasil dikirim. Tim kami akan merespons dalam 1x24 jam kerja.']);
    }
}
