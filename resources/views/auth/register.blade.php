<x-guest-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Register your account</h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Student Management System
        </p>
    </div>


    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!--First Name -->
        <div class="mt-4">
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="mt-4">
            <x-input-label for="dob" :value="__('Date of Birth')" />
            <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <div class="mt-2">
                <label for="student" class="inline-flex items-center ml-6">
                    <input id="student" type="radio" name="role" value="3" required>
                    <span class="ml-2">Student</span>
                </label>
                <label for="teacher" class="inline-flex items-center ml-6">
                    <input id="teacher" type="radio" name="role" value="2" required>
                    <span class="ml-2">Teacher</span>
                </label>
            </div>
        </div>

        <!-- Teacher Form -->
        <div id="teacher-form" style="display: none;">
            <!-- Qualifications Address -->
            <div class="mt-4">
                <x-input-label for="qualifications" :value="__('Qualifications')" />
                <textarea id="qualifications" class="block mt-1 w-full" name="qualifications" :value="old('qualifications')" required></textarea>
                <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>

        <div class="py-2">
            <button type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Register') }}
            </button>
        </div>
    </form>

    <script>
        const roleRadios = document.querySelectorAll('input[name="role"]');
        const teacherForm = document.getElementById('teacher-form');
        const qualificationsInput = document.getElementById('qualifications');

        function handleRoleChange() {
            if (this.value === '2') {
                teacherForm.style.display = 'block';
                qualificationsInput.required = true;
            } else {
                teacherForm.style.display = 'none';
                qualificationsInput.required = false;
            }
        }

        roleRadios.forEach(radio => {
            radio.addEventListener('change', handleRoleChange);
        });
    </script>
</x-guest-layout>
