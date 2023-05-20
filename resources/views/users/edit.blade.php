<x-app-layout>

    <!-- Main Content Section -->
    <div class="py-6">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Edit {{ $user->name }}</h1>
                    <p class="mt-2 text-sm text-gray-700">Use here to block or enable and edit users of student
                        management system including the name, email and other data.
                    </p>
                </div>
            </div>

            @if (Session::has('success') || count($errors) > 0)
                <div class="p-4">
                    @if (Session::has('success'))
                        <div class="rounded-md bg-green-100 pl-12 p-8">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <div class="mt-1 text-sm text-gray-800">
                                        <p class="font-bold">{{ Session::get('success') }}
                                        </p>
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="rounded-md bg-red-100 pl-12 p-8">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">Whoops! There were some
                                        problems with your input.
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul role="list" class="list-disc pl-5 space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden p-8 bg-white shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">

                            <div class="col-md-8">
                                <form method="POST" action="{{ route('users.update', $user->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <!--First Name -->
                                    <div class="mt-4">
                                        <x-input-label for="first_name" :value="__('First Name')" />
                                        <x-text-input id="first_name" class="block mt-1 w-full" type="text"
                                            name="first_name" value="{{ $user->first_name }}" required autofocus
                                            autocomplete="first_name" />
                                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                    </div>

                                    <!-- Last Name -->
                                    <div class="mt-4">
                                        <x-input-label for="last_name" :value="__('Last Name')" />
                                        <x-text-input id="last_name" class="block mt-1 w-full" type="text"
                                            name="last_name" value="{{ $user->last_name }}" required autofocus
                                            autocomplete="last_name" />
                                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email"
                                            name="email" value="{{ $user->email }}" required
                                            autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Status -->
                                    <div class="mt-4">
                                        <input type="checkbox" id="status" name="status" value="1"
                                            {{ $user->status ? 'checked' : '' }} />
                                        <label class="ml-4" for="status">Enable user</label>
                                        <span class="mt-2 text-danger">{{ $errors->first('status') }}</span>
                                    </div>

                                    @if ($user->qualifications)
                                        <!-- Qualifications -->
                                        <div id="teacher-form" style="display: none;">
                                            <div class="mt-4">
                                                <x-input-label for="qualifications" :value="__('Qualifications')" />
                                                <textarea id="qualifications" class="block mt-1 w-full" name="qualifications" :value="{{ $user->qualifications }}"
                                                    required></textarea>
                                                <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
                                            </div>
                                        </div>
                                    @endif

                                    <div class="py-4">
                                        <button type="submit"
                                            class="max-w-sm flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Section -->

    @section('custom-js')
        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- Datatables CSS CDN -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <!-- Sweet Alert2 CDN -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="/assets/js/dataTable.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                jsDataTable('dashboardDataTable', 'Students');

                $(document).on('click', '.delete_list_item_btn', function(event) {
                    event.preventDefault();
                    var form = $(this).closest('form');
                    deleteSingleItem(form);
                });
            })
        </script>
    @endsection

</x-app-layout>
