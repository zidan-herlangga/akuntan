<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PragmaRX\Google2FA\Google2FA;

class MfaController extends Controller
{
    public function __construct(private readonly Google2FA $google2fa)
    {
        $this->middleware('auth');
    }

    public function showVerify(): View
    {
        return view('mfa.verify');
    }

    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => ['required', 'string', 'max:10'],
        ]);

        $user = $request->user();

        if ($user === null || ! $user->mfa_enabled) {
            return redirect()->route('filament.admin.pages.dashboard');
        }

        if ($this->google2fa->verifyKey($user->mfa_secret, $request->string('code')->toString())) {
            session()->regenerate();
            session(["mfa_verified_{$user->id}" => true]);

            return redirect()->intended(route('filament.admin.pages.dashboard'));
        }

        return back()->withErrors(['code' => 'Kode OTP tidak valid.']);
    }

    public function showSetup(): View
    {
        return view('mfa.setup', [
            'secret' => $this->google2fa->generateSecretKey(),
        ]);
    }

    public function enable(Request $request): RedirectResponse
    {
        $request->validate([
            'secret' => ['required', 'string', 'max:32'],
            'code' => ['required', 'string', 'max:10'],
        ]);

        $user = $request->user();

        if ($user === null || ! $this->google2fa->verifyKey($request->string('secret')->toString(), $request->string('code')->toString())) {
            return back()->withErrors(['code' => 'Kode OTP tidak valid.']);
        }

        $user->forceFill([
            'mfa_secret' => $request->string('secret')->toString(),
            'mfa_enabled' => true,
        ])->save();

        session()->regenerate();
        session(["mfa_verified_{$user->id}" => true]);

        return redirect()->route('filament.admin.pages.dashboard');
    }
}
