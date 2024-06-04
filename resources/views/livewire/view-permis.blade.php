<div>
    <div class="flex animate__animated animate__fadeIn flex-col mx-3  lg:pl-64">
        <div>
            <div class="p-1.5 min-w-full lg:w-[950px] inline-block align-middle">
                <div>
                    <div class="flex flex-col lg:flex-row justify-start mb-4 gap-4 lg:gap-6 animate__animated animate__fadeInUp">
                        <a wire:navigate href="/liste_permis">
                            <button type="button"
                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 hover:scale-105 transition-transform duration-300">
                                <svg class="w-5 h-5" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                </svg>
                                Retourner
                            </button>
                        </a>
                        <div class="flex flex-col gap-2 lg:flex-row lg:gap-6 lg:ml-52">
                            @if (session('success'))
                                <div class="bg-green-500 text-sm text-white rounded-lg p-4 mb-2" role="alert">
                                    <span>{{ session('success') }}</span>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="bg-red-500 text-sm text-white rounded-lg p-4 mb-2" role="alert">
                                    <span>{{ session('error') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="print-container">
                        <table
                            class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 {{ $permis->type_permis == 'captif' ? 'bg-[#FFE896]' : 'bg-white' }}">
                            <thead>
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
                                            <p class="lg:text-xl">شارة مرور العربات الغير مرخص لها بمغادرة المطار</p>
                                            <p class="lg:text-lg">PERMIS D’ACCES VEHICULES CAPTIFS</p>
                                        @else
                                            <p class="lg:text-xl">شارة مرور العربات المرخص لها بمغادرة المطار</p>
                                            <p class="lg:text-lg">PERMIS D’ACCES VEHICULES NON CAPTIFS</p>
                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col" class="py-5 text-black border border-black border-l-0">
                                        <p class="text-center text-base">المالك - السائق</p>
                                        <p class="text-center text-base">Propriétaire - Chauffeur</p>
                                    </td>
                                    <td scope="col" class="px-6 py-3 border border-black">
                                        <div class="relative w-full text-center min-w-[200px]">
                                            <span"
                                                style="white-space: pre-wrap;">{{ $permis->proprietaire_chauffeur }}</span>
                                        </div>
                                    </td>
                                    <td scope="col" rowspan="4"
                                        class="px-6 align-top py-3 text-start text-base font-medium text-black dark:text-neutral-500 border border-black border-r-0">
                                        <div class="max-w-sm mb-10 space-y-3 flex items-center">
                                            Année <span class="ml-2">{{ $permis->annee_courante }}</span>
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
                                    <td scope="col" class="px-6 py-3 text-center border border-black border-r-0">
                                        {{ $permis->type_vehicule }}
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col" class="py-5 text-black border border-black border-l-0">
                                        <p class="text-center text-base">رقمها</p>
                                        <p class="text-center text-base">Immatriculation</p>
                                    </td>
                                    <td scope="col" class="px-6 text-center py-3 border border-black border-r-0">
                                        {{ $permis->immatriculation }}
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col" class="py-5 text-black border border-black border-l-0">
                                        <p class="text-center text-base">المنطقة</p>
                                        <p class="text-center text-base">zone d’accès</p>
                                    </td>
                                    <td scope="col" class="px-6 text-center py-3 border border-black border-r-0">
                                        {{ $permis->zone_acces }}
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col" class="py-5 text-black border border-black border-l-0">
                                        <p class="text-center text-base">سبب الدخول</p>
                                        <p class="text-center text-base">Raison de l’accès</p>
                                    </td>
                                    <td scope="col" class="px-6 text-center py-3 border border-black border-r-0">
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
                                    <td scope="col" class="px-6 text-center py-3 border border-black border-r-0">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $permis->date_expiration)->format('d-m-Y') }}
                                    </td>
                                    <td scope="col"
                                        class="px-6 py-3 text-center text-base font-medium text-black dark:text-neutral-500 border border-black border-r-0">
                                        {{ $permis->numero }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-4 flex justify-center gap-4">
            <button onclick="window.print()"
            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent w-36 justify-center bg-blue-900 text-white hover:scale-105 hover:bg-blue-700 transition-transform duration-300">
            <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M19 8h-1V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v5H5a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3h1a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3zM7 4h10v4H7V4zm10 16H7v-3h10v3zm4-6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v7z"/>
            </svg>
            Imprimer
        </button>

        <button wire:confirm="Confirmez-vous la suppression? \n Si vous confirmez, ce permis sera definitivement effacé"
            wire:click="supprimer({{ $permis->id }})"
            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent w-36 justify-center bg-red-600 text-white hover:scale-105 hover:bg-red-500 transition-transform duration-300">
            <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                </svg>
            Supprimer
        </button>

        </div>
    </div>
</div>
