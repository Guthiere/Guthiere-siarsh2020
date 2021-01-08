<x-app-layout>
    <x-slot name="header">
        <div class="px-2 py-1 my-2 text-sm font-medium whitespace-nowrap">
            <h2 class="text-2xl font-semibold leading-tight text-gray-800">
                {{ __('Listado de Roles') }}
            </h2>
        </div>

    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="py-4 mx-auto text-right mr-7 max-w-7xl sm:px-6 lg:px-8">
                    <a href={{ route('role.create') }} class="px-3 py-1 my-2 text-yellow-600 bg-yellow-300 rounded-md shadow-md hover:bg-yellow-700 hover:text-white">Crear</a>
                </div>
                @if ($errors->any())
                    <x-alert tipo="danger" :mensaje="$errors"/>
                @endif
                <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-300 shadow sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-300">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                                {{ __('Role') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                                {{ __('Slug') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-700 uppercase">
                                                {{ __('Accesos') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                                {{ __('Descripción') }}
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-700 uppercase">
                                                {{ __('Acciones') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap ">
                                                        <div class="flex items-center">
                                                            <div class="text-sm font-medium text-gray-900 ">
                                                            {{ $role->id }}
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $role->name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            {{ $role->slug }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-center text-gray-900">
                                                            {{ $role->full_access }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="inline-flex px-2 text-xs leading-5 text-gray-600 ">
                                                            {{ $role->description }}
                                                        </span>
                                                    </td>

                                                    <td class="max-w-full px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                                                        <a href={{ route('role.show',$role->id) }} class="px-3 py-1 text-green-500 bg-green-300 rounded-md hover:bg-green-700 hover:text-white">Mostrar</a>
                                                        <a href={{ route('role.edit',$role->id) }} class="px-4 py-1 mx-2 text-indigo-500 bg-indigo-300 rounded-md hover:bg-indigo-700 hover:text-white" >Editar</a>
                                                        <form action="{{ route('role.destroy',$role->id) }}" method ="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="px-2 py-1 text-red-500 bg-red-300 rounded-md hover:bg-red-700 hover:text-white">Eliminar</button>

                                                        </form>


                                                    </td>
                                                </tr>
                                        @endforeach

                                        <!-- More rows... -->
                                        </tbody>
                                    </table>

                                    {{ $roles->links() }}
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
    </div>
</x-app-layout>

