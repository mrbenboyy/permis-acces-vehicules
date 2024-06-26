<form wire:submit.prevent="save"
    class="animate__animated animate__fadeInUp my-4 max-w-screen-md border lg:ml-96 px-4 shadow-xl mx-4 bg-white dark:bg-neutral-900 rounded-xl sm:px-6 sm:py-6 md:mx-auto">
    @if (session('success'))
        <div class="bg-green-500 text-sm text-white rounded-lg p-4 mb-4" role="alert">
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-500 text-sm text-white rounded-lg p-4 mb-4" role="alert">
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="flex flex-col border-b py-4 sm:flex-row sm:items-center">
        <div class="shrink-0 mb-4 sm:mb-0 sm:mr-auto sm:py-3">
            <p class="font-medium text-lg text-gray-900 dark:text-gray-100">Détails du compte</p>
            <p class="text-sm text-gray-600 dark:text-gray-400">Modifier les détails de votre compte</p>
        </div>
        <div class="flex gap-2">
            <button type="reset"
                class="mr-2 hidden sm:inline-flex items-center gap-x-2 rounded-lg border-2 border-gray-800 px-4 py-2 font-medium text-gray-800 focus:outline-none focus:ring hover:bg-gray-200 dark:hover:bg-neutral-700 transition-colors duration-300">
                <svg class="size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
                Annuler
            </button>
            <button type="submit"
                class="hidden sm:inline-flex items-center gap-x-2 rounded-lg border-2 border-transparent bg-blue-600 px-4 py-2 font-medium text-white focus:outline-none focus:ring hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-700 transition-colors duration-300">
                <svg class="size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                </svg>
                Enregistrer
            </button>
        </div>
    </div>

    <div class="flex flex-col justify-center gap-4 border-b py-4 sm:flex-row sm:items-center">
        <label for="nom_complet" class="shrink-0 w-full sm:w-32 font-medium text-gray-900 dark:text-gray-100">Nom
            Complet</label>
        <input id="nom_complet" wire:model="nom_complet"
            class="w-full sm:w-auto rounded-md border bg-white dark:bg-neutral-800 px-2 py-2 outline-none ring-blue-600 focus:ring-1 dark:text-white"
            type="text" value="{{ $user->nom_complet }}" />
        @error('nom_complet')
            <p class="text-red-500 text-sm w-full sm:w-auto"> {{ $message }} </p>
        @enderror
    </div>

    <div class="flex flex-col justify-center gap-4 border-b py-4 sm:flex-row sm:items-center">
        <label for="email" class="shrink-0 w-full sm:w-32 font-medium text-gray-900 dark:text-gray-100">Email</label>
        <input id="email" wire:model="email" type="email" value="{{ $user->email }}"
            class="w-full sm:w-auto rounded-md border bg-white dark:bg-neutral-800 px-2 py-2 outline-none ring-blue-600 focus:ring-1 dark:text-white" />
        @error('email')
            <p class="text-red-500 text-sm w-full sm:w-auto"> {{ $message }} </p>
        @enderror
    </div>

    <div class="flex flex-col gap-4 justify-center border-b py-4 sm:flex-row sm:items-center">
        <label for="password" class="shrink-0 w-full sm:w-32 font-medium text-gray-900 dark:text-gray-100">Mot de
            passe</label>
        <input id="password" wire:model="password" type="password" placeholder="inchangé"
            class="w-full sm:w-auto rounded-md border bg-white dark:bg-neutral-800 px-2 py-2 outline-none ring-blue-600 focus:ring-1 dark:text-white" />
        @error('password')
            <p class="text-red-500 text-sm w-full sm:w-auto"> {{ $message }} </p>
        @enderror
    </div>

    <div class="flex justify-end py-4 sm:hidden">
        <button type="reset"
            class="mr-2 inline-flex items-center gap-x-2 rounded-lg border-2 px-4 py-2 font-medium text-gray-800 border-gray-800 focus:outline-none focus:ring hover:bg-gray-200 dark:hover:bg-neutral-700 transition-colors duration-300">
            <svg class="size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                <path
                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
            </svg>
            Annuler
        </button>
        <button type="submit"
            class="inline-flex items-center gap-x-2 rounded-lg border-2 border-transparent bg-blue-600 px-4 py-2 font-medium text-white focus:outline-none focus:ring hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-700 transition-colors duration-300">
            <svg class="size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path
                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
            </svg>
            Enregistrer
        </button>
    </div>
</form>
