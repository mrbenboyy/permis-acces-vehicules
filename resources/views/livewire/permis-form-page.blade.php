<div>
    <div class="flex justify-center lg:ms-56">
        <div class="flex flex-row gap-x-8">
            <div class="flex items-center">
                <input type="radio" value="captif" wire:model.live="type_permis"
                    class="shrink-0  border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                    id="type_permis-1">
                <label for="type_permis-1" class="text-sm text-black ms-2 dark:text-neutral-400">Captif</label>
            </div>

            <div class="flex items-center">
                <input type="radio" value="non_captif" wire:model.live="type_permis"
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
    @if ($this->type_permis == 'non_captif')
        {{-- Non Captif Form --}}

        @if (session('success'))
            <div class=" bg-green-500 text-sm text-white rounded-lg p-4 mb-2" role="alert">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class=" bg-red-500 text-sm text-white rounded-lg p-4 mb-2" role="alert">
                <span>{{ session('error') }}</span>
            </div>
        @endif
        <form wire:submit.prevent="save" class="flex animate-fade flex-col mt-6 mx-3 lg:items-center lg:ms-60 mb-5">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full lg:w-[950px] inline-block align-middle">
                    <div>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 bg-white">
                            <tr>
                                <th colspan="2"
                                    class="px-36 py-3 text-center text-xs border border-black border-t-0 border-l-0 font-medium text-black uppercase dark:text-neutral-500">
                                    <img src="{{ asset('img/form-logo.png') }}" alt="form logo" class="inline-flex">
                                    <p class="my-2 lg:text-xl text-[#0A4D87]">مطار محمد الخامس</p>
                                    <p class="mb-2 lg:text-lg text-[#0A4D87]">Aeroport Mohammed V</p>
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-black uppercase dark:text-neutral-500">
                                    <p class="lg:text-xl">شارة مرور العربات المرخص لها بمغادرة المطار</p>
                                    <p class="lg:text-lg">PERMIS D’ACCES VEHICULES NON CAPTIFS</p>
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
                                                class="peer h-full min-h-[100px] w-full resize-none rounded-[7px] bg-transparent px-3  text-base text-center font-normal transition-all placeholder-shown:border appearance-none placeholder-shown:border-black "
                                                placeholder=" "></textarea>
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
                                        Année<input type="number" wire:model="annee_courante"
                                            class="py-3 px-4 w-full  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
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
                                <td scope="col"
                                    class="px-6 py-3dark:text-neutral-500 border border-black border-r-0">
                                    <div class="max-w-sm space-y-3 flex items-center">
                                        <input type="text" wire:model="type_vehicule"
                                            class="py-3 px-4 w-full text-center  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
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
                                <td scope="col"
                                    class="px-6 py-3dark:text-neutral-500 border border-black border-r-0">
                                    <div class="max-w-sm space-y-3 flex items-center">
                                        <input type="text" wire:model="immatriculation"
                                            class="py-3 px-4 w-full text-center  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
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
                                <td scope="col"
                                    class="px-6 py-3dark:text-neutral-500 border border-black border-r-0">
                                    <select wire:model="zone_acces"
                                        class="py-3 px-4 pe-9 block w-full text-center  rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 appearance-none cursor-pointer">
                                        <option selected="" required>Cliquez pour choisir une zone</option>
                                        <option value="acces_1">1</option>
                                        <option value="acces_2">2</option>
                                        <option value="acces_3">3</option>
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
                                <td scope="col"
                                    class="px-6 py-3dark:text-neutral-500 border border-black border-r-0">
                                    <div class="max-w-sm space-y-3 flex items-center">
                                        <input type="text" wire:model="raison_acces"
                                            class="py-3 px-4 w-full text-center  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
                                            placeholder="...">
                                    </div>
                                    @error('raison_acces')
                                        <p class="text-sm text-red-500 font-semibold text-center">
                                            {{ $message }}</p>
                                    @enderror
                                </td>
                                <td scope="col"
                                    class="px-6 py-3 text-start text-base font-medium text-black dark:text-neutral-500 border border-black border-r-0">
                                    <div class="max-w-sm space-y-3 flex items-center">
                                        N°
                                        {{-- <input type="text"
                                            class="py-3 px-4 w-full  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
                                            placeholder="exemple: 2024"> --}}
                                        {{-- <p> {{$id}} </p> --}}

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td scope="col" class="py-5 text-black border border-black border-l-0">
                                    <p class="text-center text-base">تاريخ لانتهاء</p>
                                    <p class="text-center text-base">Date d’Expiration</p>
                                </td>
                                <td scope="col"
                                    class="px-6 py-3 dark:text-neutral-500 border border-black border-r-0">
                                    <div class="max-w-sm space-y-3 flex items-center relative">
                                        <input type="date" wire:model="date_expiration"
                                            class="py-3 px-4 w-full text-center rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
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
                                        <input type="number" wire:model="numero"
                                            class="py-3 px-4 w-full text-center rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
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
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent  w-36 justify-center bg-[#106414] focus:bg-teal-600 text-white hover:scale-95 duration-300">
                    <span wire:loading.remove wire:target="save">Ajouter</span><span wire:loading
                        wire:target="save">Création...</span>
                </button>
                <button type="reset" wire:click="annuler"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent  w-36 justify-center bg-[#CBA317] text-white hover:scale-95 duration-300">
                    Annuler
                </button>
            </div>
        </form>
    @elseif ($this->type_permis == 'captif')
        {{-- Captif Form --}}
        <form wire:submit.prevent="save" class="flex animate-fade flex-col mt-6 mx-3 lg:items-center lg:ms-60 mb-5">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full lg:w-[950px] inline-block align-middle">
                    <div>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 bg-[#FFE896]">
                            <tr>
                                <th colspan="2"
                                    class="px-36 py-3 text-center text-xs border border-black border-t-0 border-l-0 font-medium text-black uppercase dark:text-neutral-500">
                                    <img src="{{ asset('img/form-logo.png') }}" alt="form logo" class="inline-flex">
                                    <p class="my-2 lg:text-xl text-[#0A4D87]">مطار محمد الخامس</p>
                                    <p class="mb-2 lg:text-lg text-[#0A4D87]">Aeroport Mohammed V</p>
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-black uppercase dark:text-neutral-500">
                                    <p class="lg:text-xl">شارة مرور العربات الغير
                                        مرخص لها بمغادرة المطار</p>
                                    <p class="lg:text-lg">PERMIS D’ACCES VEHICULES CAPTIFS</p>
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
                                                class="peer h-full min-h-[100px] w-full resize-none rounded-[7px] bg-transparent px-3  text-base text-center font-normal transition-all placeholder-shown:border appearance-none placeholder-shown:border-black "
                                                placeholder=" "></textarea>
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
                                        Année<input type="number" wire:model="annee_courante"
                                            class="py-3 px-4 w-full bg-transparent rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
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
                                <td scope="col"
                                    class="px-6 py-3dark:text-neutral-500 border border-black border-r-0">
                                    <div class="max-w-sm space-y-3 flex items-center">
                                        <input type="text" wire:model="type_vehicule"
                                            class="py-3 bg-transparent px-4 w-full text-center  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
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
                                <td scope="col"
                                    class="px-6 py-3dark:text-neutral-500 border border-black border-r-0">
                                    <div class="max-w-sm space-y-3 flex items-center">
                                        <input type="text" wire:model="immatriculation"
                                            class="py-3 bg-transparent px-4 w-full text-center  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
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
                                <td scope="col"
                                    class="px-6 py-3dark:text-neutral-500 border border-black border-r-0">
                                    <select wire:model="zone_acces"
                                        class="py-3 bg-transparent px-4 pe-9 block w-full text-center  rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 appearance-none cursor-pointer">
                                        <option selected="" required>Cliquez pour choisir une zone</option>
                                        <option value="acces_1">1</option>
                                        <option value="acces_2">2</option>
                                        <option value="acces_3">3</option>
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
                                <td scope="col"
                                    class="px-6 py-3dark:text-neutral-500 border border-black border-r-0">
                                    <div class="max-w-sm space-y-3 flex items-center">
                                        <input type="text" wire:model="raison_acces"
                                            class="py-3 bg-transparent px-4 w-full text-center  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
                                            placeholder="...">
                                    </div>
                                    @error('raison_acces')
                                        <p class="text-sm text-red-500 font-semibold text-center">
                                            {{ $message }}</p>
                                    @enderror
                                </td>
                                <td scope="col"
                                    class="px-6 py-3 text-start text-base font-medium text-black dark:text-neutral-500 border border-black border-r-0">
                                    <div class="max-w-sm space-y-3 flex items-center">
                                        N°
                                        {{-- <input type="text"
                                            class="py-3 px-4 w-full  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
                                            placeholder="exemple: 2024"> --}}
                                        {{-- <p> {{$id}} </p> --}}

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td scope="col" class="py-5 text-black border border-black border-l-0">
                                    <p class="text-center text-base">تاريخ لانتهاء</p>
                                    <p class="text-center text-base">Date d’Expiration</p>
                                </td>
                                <td scope="col"
                                    class="px-6 py-3 dark:text-neutral-500 border border-black border-r-0">
                                    <div class="max-w-sm space-y-3 flex items-center relative">
                                        <input type="date" wire:model="date_expiration"
                                            class="py-3 bg-transparent px-4 w-full text-center rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
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
                                        <input type="number" wire:model="numero"
                                            class="py-3 bg-transparent text-center px-4 w-full  rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 placeholder-shown:border placeholder-shown:border-black"
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
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent  w-36 justify-center bg-[#106414] focus:bg-teal-600 text-white hover:scale-95 duration-300">
                    <span wire:loading.remove wire:target="save">Ajouter</span><span wire:loading
                        wire:target="save">Création...</span>
                </button>
                <button type="reset" wire:click="annuler"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent  w-36 justify-center bg-[#CBA317] text-white hover:scale-95 duration-300">
                    Annuler
                </button>
            </div>
        </form>
    @else
        <div class="flex animate-bounce lg:ms-64 justify-center mt-10">
            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path
                    d="M160 64c0-8.8 7.2-16 16-16s16 7.2 16 16V200c0 10.3 6.6 19.5 16.4 22.8s20.6-.1 26.8-8.3c3-3.9 7.6-6.4 12.8-6.4c8.8 0 16 7.2 16 16c0 10.3 6.6 19.5 16.4 22.8s20.6-.1 26.8-8.3c3-3.9 7.6-6.4 12.8-6.4c7.8 0 14.3 5.6 15.7 13c1.6 8.2 7.3 15.1 15.1 18s16.7 1.6 23.3-3.6c2.7-2.1 6.1-3.4 9.9-3.4c8.8 0 16 7.2 16 16l0 16V392c0 39.8-32.2 72-72 72H272 212.3h-.9c-37.4 0-72.4-18.7-93.2-49.9L50.7 312.9c-4.9-7.4-2.9-17.3 4.4-22.2s17.3-2.9 22.2 4.4L116 353.2c5.9 8.8 16.8 12.7 26.9 9.7s17-12.4 17-23V320 64zM176 0c-35.3 0-64 28.7-64 64V261.7C91.2 238 55.5 232.8 28.5 250.7C-.9 270.4-8.9 310.1 10.8 339.5L78.3 440.8c29.7 44.5 79.6 71.2 133.1 71.2h.9H272h56c66.3 0 120-53.7 120-120V288l0-16c0-35.3-28.7-64-64-64c-4.5 0-8.8 .5-13 1.3c-11.7-15.4-30.2-25.3-51-25.3c-6.9 0-13.5 1.1-19.7 3.1C288.7 170.7 269.6 160 248 160c-2.7 0-5.4 .2-8 .5V64c0-35.3-28.7-64-64-64zm48 304c0-8.8-7.2-16-16-16s-16 7.2-16 16v96c0 8.8 7.2 16 16 16s16-7.2 16-16V304zm48-16c-8.8 0-16 7.2-16 16v96c0 8.8 7.2 16 16 16s16-7.2 16-16V304c0-8.8-7.2-16-16-16zm80 16c0-8.8-7.2-16-16-16s-16 7.2-16 16v96c0 8.8 7.2 16 16 16s16-7.2 16-16V304z" />
            </svg>
        </div>
        <div class="flex justify-center lg:ms-64">
            <p class="text-center">Vous devez d'abord sélectionner le type de permis.</p>
        </div>
    @endif




</div>
