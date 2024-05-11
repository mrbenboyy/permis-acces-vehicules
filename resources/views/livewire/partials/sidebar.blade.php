<div>
    <!-- Navigation Toggle -->
    <button type="button" class="text-[#015092] mb-11 hover:text-gray-600" data-hs-overlay="#docs-sidebar"
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
        <div class=" bg-cover h-36 w-full absolute top-0" style="background-image: url('{{ asset('img/logo2.png') }}')">
        </div>
        <nav class="hs-accordion-group p-6 w-full mt-32 flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="space-y-1.5">
                <li>
                    <a wire:navigate
                        class="flex items-center gap-x-3.5 py-2 px-2.5 {{ request()->is('/') ? 'bg-gray-100 text-gray-700' : 'text-white' }} text-sm rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-neutral-700 dark:text-white hover:scale-105 duration-300"
                        href="/login">
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        Liste des Permis
                    </a>
                </li>

                <li><a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 hover:scale-105 duration-300"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor"
                            viewBox="0 0 512 512">
                            <path
                                d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z" />
                        </svg>
                        Historique
                    </a></li>
                <li><a wire:navigate
                        class="flex items-center {{ request()->is('users') ? 'bg-white text-gray-700' : 'text-white' }} gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 hover:scale-105 duration-300"
                        href="/users">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4"
                            fill="currentColor">
                            <path
                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                        </svg>
                        Utilisateurs
                    </a></li>
                <li><a wire;navigate
                        class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 hover:scale-105 duration-300"
                        href="/logout">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"
                            fill="currentColor">
                            <path
                                d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                        </svg>
                        Déconnexion
                    </a></li>
            </ul>
        </nav>
    </div>
    <!-- End Sidebar -->
</div>
