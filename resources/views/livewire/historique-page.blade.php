<div>
    {{-- Tableau --}}
    <div class="flex flex-col mt-6 mx-3 lg:items-center lg:ms-60 mb-5">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full lg:w-[950px] inline-block align-middle">
                <div>
                    <!-- SearchBox -->
                    <div class=" lg:gap-10 grid grid-flow-col auto-cols-max items-center lg:justify-around">
                        <div class="relative hover:scale-105 duration-300 flex-grow mr-2 mb-2">
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                                <svg class="flex-shrink-0 size-4 text-gray-400 dark:text-white/60"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </div>
                            <input wire:model.live="search_date"
                                class="py-3 ps-10 pe-4 block cursor-pointer border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                type="date" data-hs-combo-box-input="">
                        </div>
                        <select wire:model.live="search_user"
                            class="py-3 mb-2 hover:scale-105 duration-300 mr-2  block text-center  rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 cursor-pointer">
                            <option selected="" required>
                                Utilisateur</option>
                            @foreach ($user_name as $user)
                                <option value="{{ $user->nom_complet }}">{{ $user->nom_complet }}</option>
                            @endforeach
                        </select>
                        <select wire:model.live="search_action"
                            class="py-3 mb-2 hover:scale-105 duration-300 block text-center mr-2  rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 cursor-pointer">
                            <option selected="">Action</option>
                            <option value="creation">Création</option>
                            <option value="modification">Modification</option>
                            <option value="suppression">Suppression</option>
                        </select>
                        @if ($this->filter == true)
                            <button wire:click="annuler" type="button"
                                class=" text-white text-xl bg-red-500 px-2 rounded-lg hover:scale-110 duration-300 font-bold mb-2">X</button>
                        @endif
                    </div>
                    <!-- End SearchBox -->
                    <table class="min-w-full animate-fade divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-black rounded-lg">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    Date</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    Utilisateur</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    Action</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    Objet</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white dark:divide-neutral-700">
                            @forelse ($historique as $history)
                                <tr wire:key='{{ $history->id }}' class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200 uppercase">
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
                                    <td colspan="4" class="text-center py-5">pas de données disponibles</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            <div class="mt-4">
                {{ $historique->links('pagination::tailwind') }}
            </div>
    </div>
</div>
