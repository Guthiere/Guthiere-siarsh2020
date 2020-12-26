<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Lista de Roles') }}
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="mx-auto max-w-8xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">

                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>

                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Slug
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Full Access
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Permisions
                                        </th>
                                        <th scope="col" class="relative px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                            Acciones
                                        <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $role->name }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $role->slug }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $role->description }}</div>
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                    @if ($role->full_access=='yes')
                                                        <span  class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                            {{ $role->full_access }}
                                                        </span>
                                                    @else
                                                        <span  class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                            {{ $role->full_access }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                    <div class="text-center">
                                                        221
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">show</a>
                                                <a href="#" class="mx-1 text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    <!-- More rows... -->
                                    </tbody>
                                </table>
                                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                                    {{ $roles->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
