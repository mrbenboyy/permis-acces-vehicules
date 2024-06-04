<div>
    <!-- Navigation Toggle -->
    <button type="button" class="text-[#015092] mb-11 lg:mb-0 hover:text-gray-600" data-hs-overlay="#docs-sidebar"
        aria-controls="docs-sidebar" aria-label="Toggle navigation">
        <span class="sr-only">Toggle Navigation</span>
        <svg class="flex-shrink-0 size-10" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
    </button>
    <!-- End Navigation Toggle -->

    <!-- Sidebar -->
    <div id="docs-sidebar"
        class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-[#676AAA] border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-800 dark:border-neutral-700">
        <div class="bg-white absolute top-0 w-full flex justify-center">
            <img src="{{ asset('img/logo.png') }}" alt="logo ONDA" class="w-full object-contain">
        </div>
        <nav class="hs-accordion-group p-6 w-full mt-24 flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="space-y-1.5">
                <li>
                    <a wire:navigate
                        class="flex items-center gap-x-3.5 py-2 px-2.5 {{ request()->is('user/*') ? 'bg-gray-100 text-gray-700' : 'text-white' }} text-sm rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 hover:scale-105 duration-300"
                        href="/user/{{ auth()->id() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4"
                            fill="currentColor">
                            <path
                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                        </svg>
                        {{ auth()->user()->nom_complet }}
                    </a>
                </li>
                <li>
                    <a wire:navigate
                        class="flex items-center gap-x-3.5 py-2 px-2.5 {{ request()->is('liste_permis') || request()->is('liste_permis/*') ? 'bg-gray-100 text-gray-700' : 'text-white' }} text-sm rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 hover:scale-105 duration-300"
                        href="/liste_permis">
                        <svg class="size-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M64 144a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM64 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48-208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z" />
                        </svg>
                        Liste des Permis
                    </a>
                </li>
                <li>
                    <a wire:navigate
                        class="flex items-center gap-x-3.5 py-2 px-2.5 {{ request()->is('archives') ? 'bg-gray-100 text-gray-700' : 'text-white' }} text-sm rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 hover:scale-105 duration-300"
                        href="/permis/archives">
                        <svg class="size-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M0 96C0 60.7 28.7 32 64 32H196.1c19.1 0 37.4 7.6 50.9 21.1L289.9 96H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V160c0-8.8-7.2-16-16-16H286.6c-10.6 0-20.8-4.2-28.3-11.7L213.1 87c-4.5-4.5-10.6-7-17-7H64z" />
                        </svg>
                        Archives
                    </a>
                </li>
                <li>
                    <a wire:navigate
                        class="flex items-center gap-x-3.5 py-2 px-2.5 {{ request()->is('historique') ? 'bg-gray-100 text-gray-700' : 'text-white' }} text-sm rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 hover:scale-105 duration-300"
                        href="/historique">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor"
                            viewBox="0 0 512 512">
                            <path
                                d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z" />
                        </svg>
                        Historique
                    </a>
                </li>
                @if (auth()->user()->role == 'administrateur')
                    <li>
                        <a wire:navigate
                            class="flex items-center {{ request()->is('users') ? 'bg-gray-100 text-gray-700' : 'text-white' }} gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 hover:scale-105 duration-300"
                            href="/users">
                            <svg class="size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 512">
                                <path
                                    d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                            </svg>
                            Utilisateurs
                        </a>
                    </li>
                @endif
                <li>
                    <a wire:navigate
                        class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 hover:scale-105 duration-300"
                        href="/logout">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"
                            fill="currentColor">
                            <path
                                d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                        </svg>
                        Déconnexion
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- End Sidebar -->
</div>
