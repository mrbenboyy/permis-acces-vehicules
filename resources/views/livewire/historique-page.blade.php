<div class="container mx-auto p-4 animate__animated animate__fadeIn">
    <div class="flex flex-col mt-6 mx-3 lg:items-center lg:pl-64 mb-5">
        <div class="overflow-x-auto w-full">
            <div class="p-1.5 min-w-full lg:w-[950px] inline-block align-middle">
                <div class="mb-4">
                    <!-- SearchBox -->
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                        <div class="relative w-full lg:flex-grow">
                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 pl-3.5">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400 dark:text-white/60"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="M21 21l-4.3-4.3"></path>
                                </svg>
                            </div>
                            <input wire:model.live="search_date"
                                class="py-3 pl-10 pr-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                type="date" placeholder="Search by date">
                        </div>
                        <div class="flex flex-col lg:flex-row lg:justify-center gap-4 w-full lg:w-auto">
                            <select wire:model.live="search_user"
                                class="py-3 pl-4 pr-10 w-full lg:w-auto border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 cursor-pointer">
                                <option selected="">Utilisateur</option>
                                @foreach ($user_name as $user)
                                    <option value="{{ $user->nom_complet }}">{{ $user->nom_complet }}</option>
                                @endforeach
                            </select>
                            <select wire:model.live="search_action"
                                class="py-3 pl-4 pr-10 w-full lg:w-auto border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 cursor-pointer">
                                <option selected="">Action</option>
                                <option value="creation">Création</option>
                                <option value="modification">Modification</option>
                                <option value="archivage">Archivage</option>
                                <option value="restauration">Restauration</option>
                                <option value="suppression">Suppression</option>
                                <option value="restauration_de_tous_les_permis">Restauration de tous les permis</option>
                                <option value="suppression_de_tous_les_permis">Suppression de tous les permis</option>
                            </select>
                            @if ($this->filter == true)
                                <button wire:click="annuler" type="button"
                                    class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-500 focus:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-transform duration-300 mb-2 lg:mb-0">
                                    <svg class="size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 384 512">
                                        <path
                                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                    </svg>
                                </button>
                            @endif
                        </div>
                        <div>
                            <button wire:click='vider'
                                wire:confirm="Confirmez-vous le vidage?\nCela supprimera toutes les entrées de l'historique."
                                type="button"
                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-500 focus:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-transform duration-300">
                                <svg wire:loading.remove wire:target="vider" class="size-4" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                </svg>
                                <svg class="size-5" wire:loading wire:target="vider" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 200 200">
                                    <circle fill="currentColor" stroke="currentColor" stroke-width="15" r="15"
                                        cx="40" cy="65">
                                        <animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;"
                                            keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4">
                                        </animate>
                                    </circle>
                                    <circle fill="currentColor" stroke="currentColor" stroke-width="15" r="15"
                                        cx="100" cy="65">
                                        <animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;"
                                            keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2">
                                        </animate>
                                    </circle>
                                    <circle fill="currentColor" stroke="currentColor" stroke-width="15" r="15"
                                        cx="160" cy="65">
                                        <animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;"
                                            keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0">
                                        </animate>
                                    </circle>
                                </svg>
                                <span wire:loading.remove wire:target="vider">Vider</span>
                            </button>
                        </div>
                    </div>


                    <!-- End SearchBox -->
                </div>
                <div class="rounded-lg shadow overflow-hidden">
                    <table
                        class="min-w-full divide-y bg-white dark:bg-neutral-800  divide-gray-200 animate__animated animate__fadeInUp dark:divide-neutral-700">
                        <thead class="bg-gray-800">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    Date</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    Utilisateur</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    Action</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    Objet</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @forelse ($historique as $history)
                                <tr wire:key='{{ $history->id }}'
                                    class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $history->created_at->format('d-m-Y H:i') }}</td>
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ $history->user_name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 capitalize">
                                        {{ $history->action }}</td>
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 capitalize">
                                        {{ $history->objet }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-gray-500 dark:text-neutral-400">
                                        Pas
                                        de
                                        données disponibles</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $historique->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</div>
