<x-auth-layout>
    <x-slot name="title">
        @lang('Register')
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Social login -->
        <x-auth-social-login />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- First Name -->
            <div class="mt-4">
                <x-label for="first_name" :value="__('First Name')" />

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-label for="last_name" :value="__('Last Name')" />

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        
                <div class="mt-4">
                <x-label for="image" :value="__('Image')" />

                <x-input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
                </div>
                <div class="mt-4">
    <x-label for="User Type" :value="__('User Type')" />

    <div class="mt-1">
        <label for="doctor" class="inline-flex items-center">
            <input type="radio" id="doctor" name="user" value="doctor" required>
            <span class="ml-2">Doctor</span>
        </label>
    </div>

    <div class="mt-1">
        <label for="patient" class="inline-flex items-center">
            <input type="radio" id="patient" name="user" value="patient"  required>
            <span class="ml-2">Patient</span>
        </label>
    </div>
</div>
<div id="additionalInfo" class="mt-4" style="display: none;">
<x-label for="mbbsid" :value="__('Doctor MBBS ID')" />

<x-input id="mbbsid" class="block mt-1 w-full" type="text" name="mbbsid" :value="old('mbbsid')" required autofocus />
</div>
<script>
    // Get the male radio button
    const doctorRadioButton = document.getElementById('doctor');

    // Get the div for additional info
    const additionalInfoDiv = document.getElementById('additionalInfo');

    // Add an event listener to the doctor radio button
    doctorRadioButton.addEventListener('change', function () {
        if (this.checked) {
            additionalInfoDiv.style.display = 'block';
        } else {
            additionalInfoDiv.style.display = 'none';
        }
    });
</script>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> -->

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        <x-slot name="extra">
            <p class="text-center text-gray-600 mt-4">
                Already have an account? <a href="{{ route('login') }}" class="underline hover:text-gray-900">Login</a>.
            </p>
        </x-slot>
    </x-auth-card>
</x-auth-layout>