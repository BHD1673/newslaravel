<x-guest-layout>
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #9b59b6); /* Xanh tím */
            min-height: 100vh; /* Đảm bảo nền phủ toàn bộ màn hình */
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
    </style>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="h-12 w-auto text-green-500" />
                            </a>
        </x-slot>

        <div class="bg-gradient-to-r from-blue-500 to-purple-500 p-6 rounded-lg shadow-md">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" class="text-white font-semibold" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full rounded-lg" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" class="text-white font-semibold" :value="__('Mật khẩu')" />
                    <x-input id="password" class="block mt-1 w-full rounded-lg"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-white">{{ __('Nhớ mật khẩu') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-gray-200 hover:text-gray-300" href="{{ route('register') }}">
                        {{ __('Đăng ký tài khoản') }}
                    </a>
                    <span class="mx-2 text-gray-300">|</span> <!-- Thêm dấu gạch đứng để phân biệt -->
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-200 hover:text-gray-300" href="{{ route('password.request') }}">
                            {{ __('Quên mật khẩu?') }}
                        </a>
                    @endif
                </div>
                

                <div class="mt-6">
                    <x-button class="w-full bg-black text-white hover:bg-gray-700 font-bold py-2 px-4 rounded-lg">
                        {{ __('Đăng nhập') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
