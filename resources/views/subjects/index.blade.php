<x-app-layout>

    <!-- Main Content Section -->
    <div class="py-6">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">All Subjects</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the subjects of student management system
                        including the name, passmark and other data.
                    </p>
                </div>
                @if (Auth::check() && Auth::user()->hasAnyRole(['Admin', 'Teacher']))
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <a href="{{ route('subjects.create') }}"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                            Add Subject
                        </a>
                    </div>
                @endif
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
                            <table id="dashboardDataTable" class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                            No
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Subject
                                        </th>

                                        <th scope="col"
                                            class="text-center py-3.5 pl-4 pr-4 text-sm font-semibold text-gray-900 sm:pl-6 ">
                                            Pass Mark
                                        </th>

                                        <th scope="col"
                                            class="text-center py-3.5 pl-4 pr-4 text-sm font-semibold text-gray-900 sm:pl-6 ">
                                            Assignment
                                        </th>

                                        <th scope="col"
                                            class="text-center py-3.5 pl-4 pr-4 text-sm font-semibold text-gray-900 sm:pl-6 ">
                                            Source
                                        </th>

                                        @if (Auth::check() && Auth::user()->IsAdmin())
                                            <th scope="col"
                                                class="text-center px-4 py-3.5 text-sm font-semibold text-gray-900">
                                                Status
                                            </th>
                                        @endif

                                        <th scope="col" style="text-align: center"
                                            class="py-3.5 pl-4 pr-4 text-center text-sm font-semibold text-gray-900 sm:pr-6">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-400 bg-white">
                                    @forelse($subjects as $subject)
                                        <tr class="divide-x divide-y divide-gray-400">
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ $subject->id }}
                                            </td>

                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ $subject->name }}
                                            </td>

                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ $subject->pass_mark }}
                                            </td>

                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                @if ($subject->assignment)
                                                    <img src="{{ '/storage' . $subject->assignment }}" width="100px"
                                                        class="img-fluid">
                                                @else
                                                    <img src="/assets/images/no-image.png" width="50px"
                                                        class="img-fluid">
                                                @endif
                                            </td>

                                            <td
                                                class="whitespace-nowrap text-center py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                @if ($subject->source)
                                                    <img src="{{ '/storage' . $subject->source }}" width="100px"
                                                        class="img-fluid">
                                                @else
                                                    <img src="/assets/images/no-image.png" width="50px"
                                                        class="img-fluid">
                                                @endif
                                            </td>

                                            @if (Auth::check() && Auth::user()->IsAdmin())
                                                <td
                                                    class="whitespace-nowrap text-center py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                    @if ($subject->status)
                                                        <span
                                                            class="inline-flex bg-green-500 text-center px-3 py-1 text-xs font-bold leading-5 text-green-200">
                                                            Active
                                                        </span>
                                                    @else
                                                        <span
                                                            class="inline-flex bg-red-500 text-center px-3 py-1 text-xs font-bold leading-5 text-red-200">
                                                            De-active
                                                        </span>
                                                    @endif
                                                </td>
                                            @endif

                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">

                                                <div class="flex justify-center">
                                                    <a href="{{ route('subjects.show', $subject->id) }}"
                                                        class="flex mx-2 space-x-2 items-center px-3 py-2 bg-indigo-600 text-white rounded-md drop-shadow-md">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                            </path>
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    @if (Auth::check() && Auth::user()->IsAdmin())
                                                        <a href="{{ route('subjects.edit', $subject->id) }}"
                                                            class="flex mx-2 space-x-2 items-center px-3 py-2 bg-black text-white rounded-md drop-shadow-md">
                                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['subjects.destroy', $subject->id],
                                                            'style' => 'display:inline',
                                                        ]) !!}
                                                        <button
                                                            class="delete_list_item_btn flex mx-2 space-x-2 items-center px-3 py-2 bg-red-600 text-white rounded-md drop-shadow-md">
                                                            <svg class="fill-white" xmlns="http://www.w3.org/2000/svg"
                                                                fill="white" x="0px" y="0px"
                                                                width="20" height="20" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                        {!! Form::close() !!}
                                                    @endif
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <h3 class="py-4">No subjects found</h3>
                                    @endforelse
                                    <!-- More people... -->
                                </tbody>
                            </table>
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
                jsDataTable('dashboardDataTable', 'Subjects');

                $(document).on('click', '.delete_list_item_btn', function(event) {
                    event.preventDefault();
                    var form = $(this).closest('form');
                    deleteSingleItem(form);
                });
            })
        </script>
    @endsection

</x-app-layout>
