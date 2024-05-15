<div>
    <div class="flex animate-fade flex-col mx-3 lg:items-center lg:ms-60 mb-5">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full lg:w-[950px] inline-block align-middle">
                <div>
                    <div class="flex justify-start mb-1">
                        <a wire:navigate href="/liste_permis"><button type="button"
                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white disabled:opacity-50 disabled:pointer-events-none hover:scale-105 duration-300">
                                <svg class="size-5" fill="white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                </svg>
                            </button></a>
                        @if (session('success'))
                            <div class=" bg-green-500 lg:ml-52 text-sm text-white rounded-lg p-4 mb-2" role="alert">
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class=" bg-red-500 lg:ml-52 text-sm text-white rounded-lg p-4 mb-2" role="alert">
                                <span>{{ session('error') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="print-container">
                        <table
                            class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 {{ $permis->type_permis == 'captif' ? 'bg-[#FFE896]' : 'bg-white' }} ">
                            <tr>
                                <th colspan="2"
                                    class="px-36 py-3 text-center text-xs border border-black border-t-0 border-l-0 font-medium text-black uppercase dark:text-neutral-500">
                                    <img src="{{ asset('img/form-logo.png') }}" alt="form logo" class="inline-flex">
                                    <p class="my-2 lg:text-xl text-[#0A4D87]">مطار محمد الخامس</p>
                                    <p class="mb-2 lg:text-lg text-[#0A4D87]">Aeroport Mohammed V</p>
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-black uppercase dark:text-neutral-500">
                                    @if ($permis->type_permis == 'captif')
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
                                        <div class="relative w-full text-center min-w-[200px]">
                                            <span
                                                style="white-space: pre-wrap;">{{ $permis->proprietaire_chauffeur }}</span>
                                        </div>

                                    </div>
                                </td>
                                <td scope="col" rowspan="4"
                                    class="px-6 align-top py-3 text-start text-base font-medium text-black dark:text-neutral-500 border border-black border-r-0">
                                    <div class="max-w-sm mb-10 space-y-3 flex items-center">
                                        Année <span class="ml-2"> {{ $permis->annee_courante }} </span>
                                    </div>
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
                                    class="px-6 py-3dark:text-neutral-500 text-center border border-black border-r-0">
                                    {{ $permis->type_vehicule }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col" class="py-5 text-black border border-black border-l-0">
                                    <p class="text-center text-base">رقمها</p>
                                    <p class="text-center text-base">Immatriculation</p>
                                </td>
                                <td scope="col"
                                    class="px-6 text-center py-3dark:text-neutral-500 border border-black border-r-0">
                                    {{ $permis->immatriculation }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col" class="py-5 text-black border border-black border-l-0">
                                    <p class="text-center text-base">المنطقة</p>
                                    <p class="text-center text-base">zone d’accés</p>
                                </td>
                                <td scope="col"
                                    class="px-6 text-center py-3dark:text-neutral-500 border border-black border-r-0">
                                    {{ $permis->zone_acces }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col" class="py-5 text-black border border-black border-l-0">
                                    <p class="text-center text-base">سبب الدخول</p>
                                    <p class="text-center text-base">Raison de l’accés</p>
                                </td>
                                <td scope="col"
                                    class="px-6 text-center py-3dark:text-neutral-500 border border-black border-r-0">
                                    {{ $permis->raison_acces }}
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
                                <td scope="col"
                                    class="px-6 text-center py-3 dark:text-neutral-500 border border-black border-r-0">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $permis->date_expiration) }}
                                </td>
                                <td scope="col"
                                    class="px-6 py-3 text-center text-base font-medium text-black dark:text-neutral-500 border border-black border-r-0">
                                    {{ $permis->numero }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button onclick="window.print()"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent  w-36 justify-center bg-blue-900 text-white hover:scale-95 duration-300">
                Imprimer
            </button>
            <button
                wire:confirm="Confirmez-vous la suppression? \n Si vous confirmer ce permis sera definitivement effacé"
                wire:click="supprimer({{ $permis->id }})"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent  w-36 justify-center bg-[#FF0000] text-white hover:scale-95 duration-300">
                Supprimer
            </button>
        </div>
    </div>
</div>
