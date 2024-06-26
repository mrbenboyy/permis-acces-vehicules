<div>
    <div class="container mx-auto p-4 flex justify-start lg:pl-64 lg:ml-10 animate__animated animate__fadeIn">
        <div class="flex flex-row items-center gap-6">
            <div class="mt-4 lg:mt-0">
                <a wire:navigate href="/liste_permis">
                    <button type="button"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:scale-105 transition-transform duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m7-7-7 7 7 7"></path>
                        </svg>
                        Retourner
                    </button>
                </a>
            </div>
            <div class="flex flex-col md:flex-row items-center gap-4">
                <p class="text-lg font-semibold text-gray-900 dark:text-neutral-400">Changer Type:</p>
                <div class="flex items-center gap-4">
                    <div class="flex items-center">
                        <input type="radio" value="captif" wire:model.live="type"
                            class="shrink-0 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            id="type_permis-1">
                        <label for="type_permis-1"
                            class="ml-2 text-md text-gray-700 dark:text-neutral-400">Captif</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" value="non_captif" wire:model.live="type"
                            class="shrink-0 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            id="type_permis-3">
                        <label for="type_permis-3" class="ml-2 text-md text-gray-700 dark:text-neutral-400">Non
                            Captif</label>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form wire:submit.prevent="save" class="flex flex-col mx-3 mt-2 lg:items-center lg:ms-60 mb-5">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full lg:w-[950px] inline-block align-middle">
                <div>
                    <table
                        class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 {{ $this->type == 'captif' ? 'bg-[#FFE896]  animate__animated animate__fadeInLeft' : 'bg-white animate__animated animate__fadeInRight' }} ">
                        <tr>
                            <th colspan="2"
                                class="px-36 py-3 text-center text-xs border border-black border-t-0 border-l-0 font-medium text-black uppercase dark:text-neutral-500">
                                <img src="{{ asset('img/form-logo.png') }}" alt="form logo" class="inline-flex">
                                <p class="my-2 lg:text-xl text-[#0A4D87]">مطار محمد الخامس</p>
                                <p class="mb-2 lg:text-lg text-[#0A4D87]">Aeroport Mohammed V</p>
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-black uppercase dark:text-neutral-500">
                                @if ($this->type == 'captif')
                                    <p class="lg:text-xl">شارة مرور العربات الغير
                                        مرخص لها بمغادرة المطار</p>
                                    <p class="lg:text-lg">PERMIS D’ACCES VEHICULES CAPTIFS</p>
                                @else
                                    <p class="lg:text-xl">شارة مرور العربات المرخص لها بمغادرة المطار</p>
                                    <p class="lg:text-lg">PERMIS D’ACCES VEHICULES NON CAPTIFS</p>
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <td scope="col" class="py-5 text-black border border-black border-l-0">
                                <p class="text-center text-base">المالك - السائق</p>
                                <p class="text-center text-base">Propriétaire - Chauffeur</p>
                            </td>
                            <td scope="col" class="px-6 py-3 border border-black">
                                <div class="w-96">
                                    <div class="relative w-full min-w-[200px]">
                                        <textarea wire:model="proprietaire_chauffeur"
                                            class="peer h-full min-h-[100px] w-full resize-none rounded-[7px] bg-transparent px-3  text-base text-center font-normal transition-all appearance-none border border-black"
                                            placeholder=" ">{{ $permis->proprietaire_chauffeur }}</textarea>
                                        @error('proprietaire_chauffeur')
                                            <p class="text-sm text-red-500 font-semibold text-center">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </td>
                            <td scope="col" rowspan="4"
                                class="px-6 align-top py-3 text-start text-base font-medium text-black dark:text-neutral-500 border border-black border-r-0">
                                <div class="max-w-sm mb-10 space-y-3 flex items-center">
                                    Année<input type="number" value="{{ $permis->annee_courante }}"
                                        wire:model="annee_courante"
                                        class="py-3 bg-transparent px-4 w-full  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 border border-black"
                                        placeholder="exemple: 2024">
                                </div>
                                @error('annee_courante')
                                    <p class="text-sm text-red-500 font-semibold text-center">
                                        {{ $message }}</p>
                                @enderror
                                <div class="flex justify-center">
                                    <img src="{{ asset('img/logo.png') }}" class="w-96" alt="logo">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="py-5 text-black border border-black border-l-0">
                                <p class="text-center text-base">نوع المركبة</p>
                                <p class="text-center text-base">Type Véhicule</p>
                            </td>
                            <td scope="col" class="px-6 py-3dark:text-neutral-500 border border-black border-r-0">
                                <div class="max-w-sm space-y-3 flex items-center">
                                    <input type="text" value="{{ $permis->type_vehicule }}"
                                        wire:model="type_vehicule"
                                        class="py-3 bg-transparent px-4 w-full text-center  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 border border-black"
                                        placeholder="...">
                                </div>
                                @error('type_vehicule')
                                    <p class="text-sm text-red-500 font-semibold text-center">
                                        {{ $message }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="py-5 text-black border border-black border-l-0">
                                <p class="text-center text-base">رقمها</p>
                                <p class="text-center text-base">Immatriculation</p>
                            </td>
                            <td scope="col" class="px-6 py-3dark:text-neutral-500 border border-black border-r-0">
                                <div class="max-w-sm space-y-3 flex items-center">
                                    <input type="text" value="{{ $permis->immatriculation }}"
                                        wire:model="immatriculation"
                                        class="py-3 bg-transparent px-4 placeholder:font-semibold w-full text-center  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 border border-black"
                                        placeholder="respecter format: XXXXX - A - XX">
                                </div>
                                @error('immatriculation')
                                    <p class="text-sm text-red-500 font-semibold text-center">
                                        {{ $message }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="py-5 text-black border border-black border-l-0">
                                <p class="text-center text-base">المنطقة</p>
                                <p class="text-center text-base">zone d’accés</p>
                            </td>
                            <td scope="col" class="px-6 py-3dark:text-neutral-500 border border-black border-r-0">
                                <select wire:model="zone_acces"
                                    class="py-3 px-4 pe-9 block w-full bg-transparent text-center  rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 border border-black dark:placeholder-neutral-500 dark:focus:ring-neutral-600 appearance-none cursor-pointer">
                                    <option value="acces_1" @if ($permis->zone_acces == 'acces_1') selected @endif>1
                                    </option>
                                    <option value="acces_2" @if ($permis->zone_acces == 'acces_2') selected @endif>2
                                    </option>
                                    <option value="acces_3" @if ($permis->zone_acces == 'acces_3') selected @endif>3
                                    </option>

                                </select>
                                @error('zone_acces')
                                    <p class="text-sm text-red-500 font-semibold text-center">
                                        {{ $message }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="py-5 text-black border border-black border-l-0">
                                <p class="text-center text-base">سبب الدخول</p>
                                <p class="text-center text-base">Raison de l’accés</p>
                            </td>
                            <td scope="col" class="px-6 py-3dark:text-neutral-500 border border-black border-r-0">
                                <div class="max-w-sm space-y-3 flex items-center">
                                    <input type="text" value="{{ $permis->raison_acces }}"
                                        wire:model="raison_acces"
                                        class="py-3 bg-transparent px-4 w-full text-center  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 border border-black"
                                        placeholder="...">
                                </div>
                                @error('raison_acces')
                                    <p class="text-sm text-red-500 font-semibold text-center">
                                        {{ $message }}</p>
                                @enderror
                            </td>
                            <td scope="col"
                                class="px-6 py-3 text-center text-base font-medium text-black dark:text-neutral-500 border border-black border-r-0">
                                N° <span class="ml-2">{{ str_pad($permis->id, 7, '0', STR_PAD_LEFT) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="py-5 text-black border border-black border-l-0">
                                <p class="text-center text-base">تاريخ لانتهاء</p>
                                <p class="text-center text-base">Date d’Expiration</p>
                            </td>
                            <td scope="col" class="px-6 py-3 dark:text-neutral-500 border border-black border-r-0">
                                <div class="max-w-sm space-y-3 flex items-center relative">
                                    <input type="date" value="{{ $permis->date_expiration }}"
                                        wire:model="date_expiration"
                                        class="py-3 bg-transparent px-4 w-full text-center rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 border border-black"
                                        placeholder="...">
                                    <style>
                                        /* Hide the default calendar icon */
                                        input[type="date"]::-webkit-calendar-picker-indicator {
                                            display: none;
                                        }
                                    </style>
                                </div>
                                @error('date_expiration')
                                    <p class="text-sm text-red-500 font-semibold text-center">
                                        {{ $message }}</p>
                                @enderror
                            </td>
                            <td scope="col"
                                class="px-6 py-3 text-start text-base font-medium text-black dark:text-neutral-500 border border-black border-r-0">
                                <div class="max-w-sm space-y-3 flex items-center">
                                    <input type="number" value="{{ $permis->numero }}" wire:model="numero"
                                        class="py-3 bg-transparent px-4 w-full text-center rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 border border-black"
                                        placeholder="exemple: 26508">
                                </div>
                                @error('numero')
                                    <p class="text-sm text-red-500 font-semibold text-center">
                                        {{ $message }}</p>
                                @enderror
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @if (session('error'))
            <div class=" bg-red-500 text-sm text-white rounded-lg p-4 mt-2" role="alert">
                <span>{{ session('error') }}</span>
            </div>
        @endif
        <div class="mt-4">
            <button type="submit"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent w-36 justify-center bg-blue-900 focus:bg-blue-500 text-white hover:scale-95 transition-transform duration-300">
                <svg wire:loading.remove wire:target="save" class="size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512">
                            <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                        </svg>
                    <svg class="size-5" wire:loading wire:target="save" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 200 200">
                    <circle fill="currentColor" stroke="currentColor" stroke-width="15" r="15" cx="40"
                        cy="65">
                        <animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;"
                            keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4"></animate>
                    </circle>
                    <circle fill="currentColor" stroke="currentColor" stroke-width="15" r="15" cx="100"
                        cy="65">
                        <animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;"
                            keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2"></animate>
                    </circle>
                    <circle fill="currentColor" stroke="currentColor" stroke-width="15" r="15" cx="160"
                        cy="65">
                        <animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;"
                            keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0"></animate>
                    </circle>
                </svg>
                Modifier
            </button>

            <button type="reset"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent w-36 justify-center bg-[#CBA317] text-white hover:scale-95 transition-transform duration-300">
                <svg class="size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
                Annuler
            </button>

        </div>
    </form>
</div>
