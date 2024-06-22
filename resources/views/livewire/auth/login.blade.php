<div class="flex justify-center items-center min-h-screen bg-[#024783] bg-opacity-35 dark:bg-gray-900">
    <div class="absolute top-0">
        <h1 class="m-10 font-semibold text-5xl text-blue-900">Gestion des macarons</h1>
    </div>
    <div id="bg-login" class="p-6 mt-10 dark:bg-neutral-900 animate__animated animate__bounceIn shadow-lg rounded-lg">
        <div class="flex justify-center w-full rounded-lg mb-6">
            <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-full">
        </div>
        <form wire:submit.prevent="save">
            @if (session('error'))
                <div class="mb-4 bg-red-500 text-white text-sm rounded-lg p-4" role="alert">
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            <div class="space-y-4">
                <!-- Email Input -->
                <div>
                    <input type="email" id="email" wire:model="email"
                        class="block w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 dark:bg-neutral-800 dark:text-white"
                        required placeholder="Email">
                    @error('email')
                        <p class="mt-2 text-sm font-semibold text-red-600" id="email-error">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Password Input -->
                <div>
                    <input type="password" id="password" wire:model="password"
                        class="block w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 dark:bg-neutral-800 dark:text-white"
                        required placeholder="Mot de passe">
                    @error('password')
                        <p class="mt-2 text-sm font-semibold text-red-600" id="password-error">{{ $message }}</p>
                    @enderror
                </div>
                <div id="captcha" class="mt-4 required" wire:ignore></div>

                @error('captcha')
                    <p class="mt-2 text-sm font-semibold text-red-600">
                        {{ $message }}
                    </p>
                @enderror
                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="block w-full py-3 px-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 disabled:opacity-50 disabled:pointer-events-none">
                        <span wire:loading.remove wire:target="save()">Se Connecter</span>
                        <span wire:loading wire:target="save()">Connexion...</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://www.google.com/recaptcha/api.js?onload=handle&render=explicit" async defer></script>

    <script>
        var handle = function(e) {
            widget = grecaptcha.render('captcha', {
                'sitekey': '{{ env('CAPTCHA_SITE_KEY') }}',
                'theme': 'light', // you could switch between dark and light mode.
                'callback': verify
            });

        }
        var verify = function(response) {
            @this.set('captcha', response)
        }
    </script>
</div>
