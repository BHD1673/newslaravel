<x-guest-layout >
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
                <x-application-logo/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Họ và tên')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mật khẩu')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Nhập lại mật khẩu')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Đã có tài khoản?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Đăng ký') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
