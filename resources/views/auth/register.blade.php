<x-guest-layout>
    <div class="login-container">
        <div class="login-card">
            <h2 class="login-heading">Sistem Pelaporan Pengaduan Pemerintah</h2>
            <p class="text-center mb-6">Daftar untuk membuat akun baru.</p>

            <form method="POST" action="{{ route('register') }}" class="login-form">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <x-input-label for="name" :value="__('Nama')" />
                    <x-text-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Alamat Email')" />
                    <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <x-input-label for="password" :value="__('Kata Sandi')" />
                    <x-text-input id="password" class="block w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
                    <x-text-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a class="text-indigo-600 hover:text-indigo-800 text-sm" href="{{ route('login') }}">
                        {{ __('Sudah memiliki akun?') }}
                    </a>

                    <x-primary-button class="btn btn-primary">
                        {{ __('Daftar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
