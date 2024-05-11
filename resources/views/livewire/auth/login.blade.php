<div class="flex justify-center items-center mt-32 dark:bg-neutral-900 dark:border-neutral-700">
    <div class="p-4 sm:p-7">
        <div class="flex justify-center">
            <img src="{{ asset('img/logo.png') }}" alt="logo">
        </div>

        <div class="mt-5">
            <!-- Form -->
            <form wire:submit.prevent="save">
                @if (session('error'))
                    <div class="mt-2 bg-red-500 text-sm text-white rounded-lg p-4 mb-4" role="alert">
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
                <div class="grid gap-y-4">
                    <!-- Form Group -->
                    <div>
                        <div class="relative flex justify-center items-center">
                            <input type="email" id="email" wire:model="email"
                                class="py-3 text-center px-4 block w-80 rounded-lg" required
                                aria-describedby="email-error" placeholder="Email">
                            @error('email')
                                <div class=" absolute pointer-events-none pe-3 ps-72">
                                    <svg class="size-6 text-red-500" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16" aria-hidden="true">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            @enderror
                        </div>
                        @error('email')
                            <p class="text-center text-sm text-red-600 mt-2" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div>
                        <div class="relative flex justify-center items-center">
                            <input type="password" id="password" wire:model="password"
                                class="py-3 text-center px-4 block w-80 rounded-lg" required
                                aria-describedby="password-error" placeholder="Mot de passe">
                            @error('password')
                                <div class=" absolute pointer-events-none pe-3 ps-72">
                                    <svg class="size-6 text-red-500" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16" aria-hidden="true">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            @enderror
                        </div>
                        @error('password')
                            <p class=" text-sm text-center text-red-600 mt-2" id="password-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- End Form Group -->

                    <button type="submit"
                        class="w-80 py-3 px-4 mx-auto inline-flex justify-center items-center text-sm rounded-lg border border-transparent bg-[#106414] text-white hover:scale-105 duration-300 disabled:opacity-50 disabled:pointer-events-none">Se
                        Connecter</button>
                </div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>
