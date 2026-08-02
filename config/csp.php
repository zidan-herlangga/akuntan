<?php

use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;

return [

    /*
     * Headers will only be added if this setting is set to true.
     */
    'enabled' => env('CSP_ENABLED', true),

    /*
     * Headers will be added when Vite is hot reloading.
     */
    'enabled_while_hot_reloading' => env('CSP_ENABLED_WHILE_HOT_RELOADING', false),

    /*
     * Nonce-based CSP is not used: neither Filament nor the static frontend
     * inject nonces into their inline scripts/styles, so a nonce in the
     * policy would cause browsers to ignore 'unsafe-inline' and block them.
     */
    'nonce_enabled' => false,

    /*
     * All violations against a policy will be reported to this url.
     * A great service you could use for this is https://report-uri.com/
     */
    'report_uri' => env('CSP_REPORT_URI', ''),

    /*
     * The name of the reporting endpoint that violations should be sent to.
     */
    'report_to' => env('CSP_REPORT_TO', ''),

    /*
     * Strict policy applied to protected areas: the Filament admin panel,
     * API routes, and signed client-document downloads. Inline
     * scripts/styles and 'unsafe-eval' are REQUIRED by Livewire/Alpine:
     * Filament evaluates its x-data/x-on expressions by compiling strings
     * into functions, so removing 'unsafe-eval' blocks the entire admin
     * panel in the browser. Strictness therefore comes from limiting
     * external origins to Cloudflare Turnstile, object-src 'none',
     * form-action 'self', and the absence of the public-only CDNs.
     */
    'admin' => [
        'directives' => [
            [Directive::BASE, Keyword::SELF],
            [Directive::CONNECT, [
                Keyword::SELF,
                'ws://127.0.0.1:8080',
                'http://127.0.0.1:8080',
            ]],
            [Directive::DEFAULT, Keyword::SELF],
            [Directive::FONT, [
                Keyword::SELF,
                'data:',
                'https://cdnjs.cloudflare.com',
            ]],
            [Directive::FORM_ACTION, Keyword::SELF],
            [Directive::FRAME, [Keyword::SELF, 'https://challenges.cloudflare.com']],
            [Directive::IMG, [
                Keyword::SELF,
                'data:',
                'https://ui-avatars.com',
            ]],
            [Directive::MEDIA, Keyword::SELF],
            [Directive::OBJECT, Keyword::NONE],
            [Directive::SCRIPT, [
                Keyword::SELF,
                Keyword::UNSAFE_INLINE,
                Keyword::UNSAFE_EVAL,
                'https://challenges.cloudflare.com',
            ]],
            [Directive::STYLE, [
                Keyword::SELF,
                Keyword::UNSAFE_INLINE,
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.css',
            ]],
        ],
    ],

    /*
     * Relaxed policy for the public marketing pages, which rely on the
     * Tailwind Play CDN (compiled in the browser), Google Fonts, inline
     * scripts/styles, and a data-URI favicon.
     */
    'public' => [
        'directives' => [
            [Directive::BASE, Keyword::SELF],
            [Directive::CONNECT, Keyword::SELF],
            [Directive::DEFAULT, Keyword::SELF],
            [Directive::FONT, [
                Keyword::SELF,
                'data:',
                'https://fonts.gstatic.com',
                'https://cdnjs.cloudflare.com',
            ]],
            [Directive::FORM_ACTION, Keyword::SELF],
            [Directive::FRAME, [
                Keyword::SELF,
                'https://challenges.cloudflare.com',
                'https://www.google.com',
                'https://maps.google.com',
            ]],
            [Directive::IMG, [Keyword::SELF, 'data:', 'https:']],
            [Directive::MEDIA, Keyword::SELF],
            [Directive::OBJECT, Keyword::NONE],
            [Directive::SCRIPT, [
                Keyword::SELF,
                Keyword::UNSAFE_INLINE,
                Keyword::UNSAFE_EVAL,
                'https://cdn.tailwindcss.com',
                'https://challenges.cloudflare.com',
            ]],
            [Directive::STYLE, [
                Keyword::SELF,
                Keyword::UNSAFE_INLINE,
                'https://fonts.googleapis.com',
                'https://fonts.gstatic.com',
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.css',
            ]],
        ],
    ],
];
