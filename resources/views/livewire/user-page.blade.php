<div class="container mx-auto p-4 animate__animated animate__fadeIn">
    <div class="flex justify-center lg:pl-56 mb-5">
        <form wire:submit.prevent="save"
            class="w-full max-w-md space-y-4 bg-white p-6 rounded-lg shadow-lg dark:bg-neutral-800">
            @if (session('error'))
                <div class="bg-red-500 text-sm text-white rounded-lg p-4 mb-2" role="alert">
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            @if (session('success'))
                <div class="bg-green-500 text-sm text-white rounded-lg p-4 mb-2" role="alert">
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if (session('success_update'))
                <div class="bg-green-500 text-sm text-white rounded-lg p-4 mb-2" role="alert">
                    <span>{{ session('success_update') }}</span>
                </div>
            @endif
            <div class="relative">
                <input type="text" wire:model="nom_complet"
                    class="peer py-3 px-4 pl-11 block w-full bg-white border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-gray-600 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Entrer le nom complet">
                <div
                    class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 dark:text-neutral-500"
                        fill="rgb(107 114 128)" viewBox="0 0 576 512">
                        <path
                            d="M512 80c8.8 0 16 7.2 16 16V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H512zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM208 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H304c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H176zM376 144c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376z" />
                    </svg>
                </div>
            </div>
            @error('nom_complet')
                <p class="text-sm text-red-500 font-semibold text-center">{{ $message }}</p>
            @enderror
            <div class="relative">
                <input type="email" wire:model="email"
                    class="peer py-3 px-4 pl-11 block w-full bg-white border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-gray-600 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Entrer l'email">
                <div
                    class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
            </div>
            @error('email')
                <p class="text-sm text-red-500 font-semibold text-center">{{ $message }}</p>
            @enderror
            <div class="relative">
                <input type="password" wire:model="password"
                    class="peer py-3 px-4 pl-11 block w-full bg-white border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-gray-600 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Entrer le mot de passe">
                <div
                    class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4a6.5 6.5 0 1 0-4-4Z"></path>
                        <circle cx="16.5" cy="7.5" r=".5"></circle>
                    </svg>
                </div>
            </div>
            @error('password')
                <p class="text-sm text-red-500 font-semibold text-center">{{ $message }}</p>
            @enderror
            <select id="hs-select-label" wire:model="role"
                class="py-3 px-4 pe-9 block w-full cursor-pointer bg-white border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-gray-600 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                required>
                <option selected value="">Sélectionner un rôle</option>
                <option value="administrateur">Administrateur</option>
                <option value="moderateur">Modérateur</option>
            </select>
            @error('role')
                <p class="text-sm text-red-500 font-semibold text-center">{{ $message }}</p>
            @enderror
            <div class="flex justify-end space-x-2">
                @if ($this->id_user)
                    <button type="submit"
                        class="py-3 px-4 w-28 justify-center inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-900 text-white hover:bg-blue-800 focus:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 transition-transform duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span wire:loading.remove wire:target='save()'>Modifier</span><span wire:loading
                            wire:target='save()'>Modification...</span>
                    </button>
                @else
                    <button type="submit"
                        class="py-3 px-4 w-28 justify-center inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-500 focus:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-transform duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        <span wire:loading.remove wire:target='save()'>Créer</span><span wire:loading
                            wire:target='save()'>Création...</span>
                    </button>
                @endif
                <button type="reset"
                    class="py-3 px-4 w-28 justify-center inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-yellow-600 text-white hover:bg-yellow-500 focus:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-transform duration-300"
                    wire:click="resetForm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Annuler
                </button>

            </div>
        </form>
    </div>

    {{-- Tableau --}}
    <div class="flex flex-col mt-6 mx-3 lg:items-center lg:pl-60 mb-5">
        <div>
            <div class="p-1.5 min-w-full lg:w-[950px] inline-block align-middle">
                <div>
                    <table
                        class="min-w-full animate__animated animate__fadeInUp divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-800">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Nom Complet</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Email</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Role</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white dark:divide-neutral-700">
                            @forelse ($users as $user)
                                <tr wire:key='{{ $user->id }}'
                                    class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200 uppercase">
                                        {{ $user->nom_complet }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ $user->email }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 capitalize">
                                        {{ $user->role }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <button type="button" wire:click='edit({{ $user->id }})'
                                            class="inline-flex mx-5 items-start gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-400 hover:scale-125 transition-transform duration-300">
                                            <svg class="h-5 w-5" fill="blue" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                            </svg></button>
                                        <button type="button" wire:click='delete({{ $user->id }})'
                                            wire:confirm="Confirmez-vous la suppression? \n Si vous confirmer cet utilisateur sera definitivement effacé"
                                            class="inline-flex mx-5 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 dark:text-red-500 dark:hover:text-red-400 hover:scale-125 transition-transform duration-300">
                                            <svg fill="red" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                            </svg></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-gray-500 dark:text-neutral-400">
                                        Pas de
                                        données disponibles</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
