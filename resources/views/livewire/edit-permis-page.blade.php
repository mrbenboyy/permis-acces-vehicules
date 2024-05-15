<div>
    <div class="flex justify-center lg:ms-56">
        <div class="flex flex-row gap-x-8">
            <div class="flex items-center">
                <p class="lg:mr-5">Changer Type:</p>
                <input type="radio" value="captif" wire:model.live="type"
                    class="shrink-0  border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                    id="type_permis-1">
                <label for="type_permis-1" class="text-sm text-black ms-2 dark:text-neutral-400">Captif</label>
            </div>

            <div class="flex items-center">
                <input type="radio" value="non_captif" wire:model.live="type"
                    class="shrink-0 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                    id="type_permis-3">
                <label for="type_permis-3" class="text-sm text-black ms-2 dark:text-neutral-400">Non Captif</label>
            </div>
            <div class="flex">
                <a wire:navigate href="/liste_permis"><button type="button"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white disabled:opacity-50 disabled:pointer-events-none hover:scale-105 duration-300">
                        Retourner
                    </button></a>
            </div>
        </div>
    </div>
    <form wire:submit.prevent="save" class="flex animate-fade flex-col mx-3 mt-2 lg:items-center lg:ms-60 mb-5">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full lg:w-[950px] inline-block align-middle">
                <div>
                    <table
                        class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 {{ $this->type == 'captif' ? 'bg-[#FFE896]' : 'bg-white' }} ">
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
                                        class="py-3 bg-transparent px-4 w-full text-center  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 border border-black"
                                        placeholder="...">
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
        <div class="mt-4">
            <button type="submit"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent  w-36 justify-center bg-blue-900 focus:bg-blue-500 text-white hover:scale-95 duration-300">
                <span wire:loading.remove wire:target="save">Modifier</span><span wire:loading
                    wire:target="save">Modification...</span>
            </button>
            <button type="reset"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent  w-36 justify-center bg-[#CBA317] text-white hover:scale-95 duration-300">
                Annuler
            </button>
        </div>
    </form>
</div>
