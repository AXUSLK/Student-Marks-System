<x-app-layout>

    <style>
        td {
            padding: 0 5rem 1rem 1rem;
        }
    </style>

    <!-- Main Content Section -->
    <div class="py-6 pb-32">
        <div class="px-12 flex justify-between">
            <h1 class="text-2xl font-semibold text-gray-900">
                User Name: {{ $user->name }}
            </h1>
            <a href="{{ route('users.index') }}"
                class="ml-3 inline-flex justify-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back</a>
        </div>

        <div class="space-y-8 px-12 py-4">
            <div class="space-y-8 divide-y bg-white px-8 py-8 divide-gray-200 sm:space-y-5">
                <div class="card w-full mx-auto bg-white p-4">
                    <table>
                        <tr>
                            <td>First Name: </td>
                            <td>{{ $user->first_name }}</td>
                        </tr>
                        <tr>
                            <td>Last Name: </td>
                            <td>{{ $user->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Class: </td>
                            <td>{{ $user->userClass?->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Main Content Section -->

</x-app-layout>
