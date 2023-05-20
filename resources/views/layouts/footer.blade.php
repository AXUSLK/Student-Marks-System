<section class="max-h-screen">
    <footer class="fixed bottom-0 w-full bg-white mx-auto py-10 text-center text-sm text-gray-500">
        <div class="sm:flex sm:items-center sm:justify-around">
            <div class="ml-4">
                <p>&copy; {{ Carbon\Carbon::now()->format('Y') }} Student Management System All Rights Reserved.
                    Made with ❤️ by
                    <a class="hover:text-teal-600" target="_blank" href="https://saradabhagya.me/">
                        <strong>Sarada Bhaya</strong>
                    </a>
                </p>
            </div>
            <div class="ml-20 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </footer>
</section>
