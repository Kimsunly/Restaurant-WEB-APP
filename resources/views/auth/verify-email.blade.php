<x-guest-layout>
    <div class="auth-card-header">
        <span class="auth-chip">Verify email</span>
        <h2>Check your inbox</h2>
        <p>Verify your email address before continuing.</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="auth-form">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-primary-button>
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="auth-inline-link" style="background:none;border:0;padding:0;">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>