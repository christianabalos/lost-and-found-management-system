
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- First Name -->
        <div>
            <x-input-label for="first_name" value="First Name" />
            <x-text-input
                id="first_name"
                class="block mt-1 w-full"
                type="text"
                name="first_name"
                :value="old('first_name')"
                required
                autofocus
            />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Middle Name -->
        <div class="mt-4">
            <x-input-label for="middle_name" value="Middle Name" />
            <x-text-input
                id="middle_name"
                class="block mt-1 w-full"
                type="text"
                name="middle_name"
                :value="old('middle_name')"
            />
            <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" value="Last Name" />
            <x-text-input
                id="last_name"
                class="block mt-1 w-full"
                type="text"
                name="last_name"
                :value="old('last_name')"
                required
            />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- ID Number -->
        <div class="mt-4">
            <x-input-label for="student_id" value="ID Number" />
            <x-text-input
                id="student_id"
                class="block mt-1 w-full"
                type="text"
                name="student_id"
                :value="old('student_id')"
                required
            />
            <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
        </div>

        <!-- Contact Number -->
        <div class="mt-4">
            <x-input-label for="contact_number" value="Contact Number" />
            <x-text-input
                id="contact_number"
                class="block mt-1 w-full"
                type="text"
                name="contact_number"
                :value="old('contact_number')"
                required
            />
            <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" value="Address" />
            <textarea
                id="address"
                name="address"
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                rows="3"
                required>{{ old('address') }}</textarea>

            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" value="Email" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label
                for="password_confirmation"
                value="Confirm Password"
            />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />
        </div>

        <div class="mt-6">

            <x-primary-button class="w-full justify-center">
                Register
            </x-primary-button>

            <div class="text-center mt-4">
                <a
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                    href="{{ route('login') }}"
                >
                    Already registered? Log in
                </a>
            </div>

        </div>

    </form>
</x-guest-layout>
```
