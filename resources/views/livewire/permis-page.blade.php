<div>
    <div class="flex flex-col mt-6 mx-3 lg:items-center lg:ms-60 mb-5">
        <div class="max-w-sm flex mb-5">
            <!-- SearchBox -->
            <div class="relative flex-grow mr-2">
                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                    <svg class="flex-shrink-0 size-4 text-gray-400 dark:text-white/60" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                </div>
                <input wire:model.live="search"
                    class="py-3 ps-10 pe-4 block w-full lg:w-96 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    type="text" placeholder="chercher par immatricule, N°, Propriètaire..." value=""
                    data-hs-combo-box-input="">
            </div>
            <!-- End SearchBox -->

            <a wire:navigate href="/ajouter_permis"><button type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent  bg-[#106414] text-white disabled:opacity-50 disabled:pointer-events-none hover:scale-105 duration-300">
                    Nouveau
                </button></a>
        </div>

        {{-- Tableau --}}

        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full lg:w-[950px] inline-block align-middle">
                <div>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-black rounded-lg">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    Immatriculation</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    Propriétaire - Chauffeur</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    Type Permis</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    N°</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white dark:divide-neutral-700">
                            @forelse ($permis as $perm)
                                <tr wire:key='{{ $perm->id }}'>
                                    @php
                                        if ($perm->type_permis == 'captif') {
                                            $type_permis = 'Captif';
                                        } else {
                                            $type_permis = 'Non Captif';
                                    } @endphp
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200 uppercase">
                                        {{ $perm->immatriculation }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ $perm->proprietaire_chauffeur }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 capitalize">
                                        {{ $type_permis }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 capitalize">
                                        {{ $perm->numero }}</td>
                                    <td class=" py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <div class="hs-dropdown relative inline-flex">
                                            <button id="hs-dropdown-custom-icon-trigger" type="button"
                                                class="hs-dropdown-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                                                <svg class="flex-none size-4 text-gray-600 dark:text-neutral-500"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="1" />
                                                    <circle cx="12" cy="5" r="1" />
                                                    <circle cx="12" cy="19" r="1" />
                                                </svg>
                                            </button>

                                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-10 bg-gray-100 shadow-md rounded-lg p-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 z-10"
                                                aria-labelledby="hs-dropdown-custom-icon-trigger">

                                                <a wire:navigate href="/permis/{{ $perm->id }}"><button
                                                        type="button"
                                                        class="flex mx-5 my-2 items-start font-semibold rounded-lg border border-transparent text-gray-700 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 hover:scale-95 duration-300"><svg
                                                            class="size-6 mr-2" fill="orange"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                            <path
                                                                d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                        </svg> Voir
                                                    </button></a>
                                                <a wire:navigate href="/edit/{{ $perm->id }}"><button type="button"
                                                        class="flex mx-5 my-2 items-start font-semibold rounded-lg border border-transparent text-gray-700 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 hover:scale-95 duration-300"><svg
                                                            class="size-6 mr-2" fill="blue"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                        </svg>Modifier</button>
                                                </a>
                                                <button type="button" wire:click='delete({{ $perm->id }})'
                                                    wire:confirm="Confirmez-vous la suppression? \n Si vous confirmer ce permis sera definitivement effacé"
                                                    class="flex text-gray-700 hover:text-blue-800  mx-5 items-center font-semibold rounded-lg border border-transparent disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 hover:scale-95 duration-300"><svg
                                                        fill="red" class="size-6 mr-2"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                    </svg>Supprimer</button>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="5" class="py-5">
                                        Aucun résultat trouvé
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
