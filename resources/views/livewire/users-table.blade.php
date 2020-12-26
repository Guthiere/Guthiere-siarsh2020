<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Lista de Usuarios') }}
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
                            <div class="flex px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                                <input
                                wire:model="search"
                                class="block w-full mt-1 rounded-md shadow-sm form-input"
                                type="text"
                                placeholder="search">

                                <div class="block mt-1 ml-4 rounded-md shadow-sm form-input">
                                    <select wire:model="usrPerPage" class="text-sm text-gray-500 outline-none">
                                        <option value="5">5 por página</option>
                                        <option value="5">10 por página</option>
                                        <option value="5">15 por página</option>
                                        <option value="5">20 por página</option>
                                        <option value="5">25 por página</option>
                                        <option value="5">50 por página</option>
                                        <option value="5">100 por página</option>
                                    </select>
                                </div>
                                @if ($search!=='')
                                    <button wire:click="clear" class="block mt-1 ml-4 rounded-md shadow-sm form-input">X</button>
                                @endif
                            </div>
                        @if ($users->count())
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Id
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Teams
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Role
                                    </th>
                                    <th scope="col" class="relative px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase align-middle">
                                    <span class="sr-only">Edit</span>
                                        Accions
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $user->id }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full" src="{{ $user->profile_photo_url }}&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="{{ $user->name }}">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $user->name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $user->email }}
                                                    </div>
                                                </div>
                                            </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">

                                            <div class="text-sm text-gray-500">{{ $user->allTeams()->pluck('name')->join(', ') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{-- agregar estado Activo / Inactivo --}}
                                                @if (true)
                                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                        Active
                                                    </span>
                                                @else
                                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-200 rounded-full">
                                                        Inactive
                                                    </span>
                                                @endif

                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            Admin
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900" >Show</a>
                                                <a href="#" class="mx-1 text-indigo-600 hover:text-indigo-900" >Edit</a>
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                <!-- More rows... -->
                                </tbody>
                            </table>
                            <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                                {{ $users->links() }}
                            </div>
                        @else
                            <div class="px-4 py-3 text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                                no hay resultados para la busqueda: "{{ $search }}" el la pagina: "{{ $page }}" al mostrar "{{ $usrPerPage }}" por pagina
                            </div>
                        @endif
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
