<x-guest-layout>
    <div class="login-container">
        <div class="login-card">
            <h2 class="login-heading">Sistem Pelaporan Pengaduan Pemerintah</h2>
            <p class="text-center mb-6">
                {{ __('Lupa kata sandi Anda? Tidak masalah. Masukkan alamat email Anda, dan kami akan mengirimkan tautan untuk mereset kata sandi.') }}
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="login-form">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Alamat Email')" />
                    <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="btn btn-primary">
                        {{ __('Kirim Tautan Reset Kata Sandi') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
