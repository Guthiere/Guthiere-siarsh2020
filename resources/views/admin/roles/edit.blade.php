<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Crear Roles ') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div>
                    <form action={{ route('role.store') }} method="POST">
                        @csrf

                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900 pt-9 px-7">Crear Roles</h3>
                                        <p class="mt-1 text-sm text-gray-600 px-7">
                                        Esa sección es para la creacion de Roles.
                                        </p>
                                </div>
                            </div>

                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="company_website" class="block mb-3 text-sm font-medium text-gray-700">
                                                    Rol
                                                </label>
                                                <div class="flex mt-1 rounded-md shadow-sm">
                                                    <input type="text" name="name" id="name" class="block w-full mt-1 border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm" placeholder="Nombre Role">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="company_website" class="block mb-3 text-sm font-medium text-gray-700">
                                                    Slug
                                                </label>
                                                <div class="flex mt-1 rounded-md shadow-sm">
                                                    <input type="text" name="slug" id="slug" class="block w-full mt-1 border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm" placeholder="Role Slug">
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="description" class="block mb-3 text-sm font-medium text-gray-700">
                                                Descripción
                                            </label>
                                            <div class="mt-1">
                                                <textarea id="description" name="description" rows="3" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Descripcion acerca del rol."></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hidden sm:block" aria-hidden="true">
                            <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                            </div>
                        </div>

                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="pt-4 text-lg font-medium leading-6 text-gray-900 px-7">Asignación de Permisos</h3>
                                    <p class="mt-1 text-sm text-gray-600 px-7">
                                        Asignación de Permisos de Control.
                                    </p>
                                </div>
                            </div>

                            <div class="shadow sm:rounded-md sm:overflow-hidden md:col-span-2">

                                <div class="grid grid-cols-3 gap-6 px-5 py-5">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="company_website" class="block mb-3 text-sm font-medium text-gray-700">
                                            Acceso Administrador
                                        </label>
                                        <div class="flex mt-1 ">
                                            <div class="flex items-center h-5">
                                                <input value="yes" id="full_accessyes" name="full_access" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                                <label for="full_accessyes" class="mx-4 font-medium" >Yes</label>
                                            </div>
                                            <div class="flex items-center h-5">
                                                <input checked value="no"  id="full_accessno" name="full_access" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                                <label for="full_accessno" class="mx-4 font-medium" >No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-t border-b border-gray-200 md:rounded-lg">
                                    <h1 class="px-5 py-5 text-xl font-semibold">Permisos Disponibles</h1>
                                </div>


                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                            Permiso
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                            Descripción
                                                            </th>

                                                        </tr>
                                                        </thead>
                                                        <tbody class="bg-white divide-y divide-gray-200">
                                                            @foreach ($permisos as $permiso)
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">

                                                                        <div class="flex items-center h-5">
                                                                            <input id="permiso_{{ $permiso->id }}" value="{{ $permiso->id }}" name="permiso[]" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                                                        </div>

                                                                        <div class="ml-4">
                                                                            <div class="text-sm font-medium text-gray-900">
                                                                                {{ $permiso->name }}
                                                                            </div>
                                                                            <div class="text-sm text-gray-500">
                                                                                {{ $permiso->slug }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $permiso->description }}
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    <!-- More rows... -->
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="min-w-full md:col-span-3">
                                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
