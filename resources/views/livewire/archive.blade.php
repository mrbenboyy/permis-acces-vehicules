<div class="container mx-auto p-4 animate__animated animate__fadeIn">
    <div class="flex flex-col mt-6 mx-3 lg:items-center lg:justify-center lg:pl-64 mb-5">
        <div class="flex flex-col lg:flex-row max-w-full mb-5 lg:max-w-4xl w-full items-center gap-4">
            <!-- SearchBox -->
            <div class="relative flex-grow w-full lg:w-auto">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 pl-3.5">
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400 dark:text-white/60" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.3-4.3"></path>
                    </svg>
                </div>
                <input wire:model.live="search"
                    class="py-3 pl-10 pr-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    type="text" placeholder="Chercher par immatricule, N°, Propriétaire..." value=""
                    data-hs-combo-box-input="">
            </div>
            <!-- End SearchBox -->
            <button type="button" wire:click="restore_all"
            wire:confirm="Confirmez-vous la restauration? \n Si vous confirmez, tous les permis seront restaurés."
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-yellow-600 text-white hover:bg-yellow-500 focus:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-transform duration-300">
                <svg class="size-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z" />
                </svg>
                Restaurer Tous
            </button>
            <button type="button" wire:click="delete_all"
            wire:confirm="Confirmez-vous la restauration? \n Si vous confirmez tous les permis seront supprimés."
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-500 focus:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-transform duration-300">
                <svg class="size-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                        d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                </svg>
                Supprimer Tous
            </button>
        </div>

        <!-- Tableau -->
        <div class="overflow-x-auto animate__animated animate__fadeInUp">
            <div class="p-1.5 min-w-full lg:w-[950px] inline-block align-middle">
                @if (session('success'))
                    <div class="bg-green-500 text-center flex justify-center text-sm text-white rounded-lg p-4 mb-2"
                        role="alert">
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-500 text-center flex justify-center text-sm text-white rounded-lg p-4 mb-2"
                        role="alert">
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
                <div>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-800">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    Immatriculation
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    Propriétaire - Chauffeur
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    Type Permis
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    N°
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white dark:divide-neutral-700">
                            @forelse ($permis as $perm)
                                <tr wire:key='{{ $perm->id }}' class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                    @php
                                        $type_permis = $perm->type_permis == 'captif' ? 'Captif' : 'Non Captif';
                                    @endphp
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200 uppercase">
                                        {{ $perm->immatriculation }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ $perm->proprietaire_chauffeur }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 capitalize">
                                        {{ $type_permis }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 capitalize">
                                        {{ $perm->numero }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium">
                                        <div class="inline-flex">
                                            <button wire:click="restore({{ $perm->id }})"
                                                wire:confirm="Confirmez-vous la restauration? \n Si vous confirmer ce permis sera restauré"
                                                type="button"
                                                class="flex mx-2 my-2 items-start font-semibold rounded-lg border border-transparent text-gray-700 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-400 hover:scale-125 transition-transform duration-300">
                                                <svg class="size-5" fill="#CA8A04" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z" />
                                                </svg>
                                            </button>
                                            <button type="button" wire:click='delete({{ $perm->id }})'
                                                wire:confirm="Confirmez-vous la suppression? \n Si vous confirmer ce permis sera definitivement effacé"
                                                class="flex text-gray-700 hover:text-blue-800 mx-2 items-center font-semibold rounded-lg border border-transparent disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 hover:scale-125 transition-transform duration-300">
                                                <svg fill="red" class="size-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512">
                                                    <path
                                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="5" class="py-5 text-gray-500 dark:text-neutral-400">
                                        Aucun résultat trouvé
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-4">
            {{ $permis->links('pagination::tailwind') }}
        </div>
    </div>
</div>
