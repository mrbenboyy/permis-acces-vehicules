<form wire:submit.prevent="save"
    class="animate__animated animate__rollIn my-4 max-w-screen-md border lg:ml-96 px-4 shadow-xl sm:mx-4 bg-white sm:rounded-xl sm:px-4 sm:py-4 md:mx-auto">
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
    <div class="flex flex-col border-b py-4 sm:flex-row sm:items-start">
        <div class="shrink-0 mr-auto sm:py-3">
            <p class="font-medium">Détails du compte</p>
            <p class="text-sm text-gray-600">Modifier les détails de votre compte</p>
        </div>
        <button type="reset"
            class="mr-2 hidden rounded-lg border-2 px-4 py-2 font-medium text-gray-500 sm:inline focus:outline-none focus:ring hover:bg-gray-200">Annuler</button>
        <button type="submit"
            class="hidden rounded-lg border-2 border-transparent bg-blue-600 px-4 py-2 font-medium text-white sm:inline focus:outline-none focus:ring hover:bg-blue-700">Enregistrer</button>
    </div>
    <div class="flex flex-col justify-center items-center gap-4 border-b py-4 sm:flex-row">
        <p class="shrink-0 w-32 font-medium">Nom Complet</p>
        <input wire:model="nom_complet"
            class="mb-2 rounded-md border bg-white px-2 py-2 outline-none ring-blue-600 sm:mr-4 sm:mb-0 focus:ring-1"
            type="text" value="{{ $user->nom_complet }}" />
        @error('nom_complet')
            <p class="text-red-500 text-sm"> {{ $message }} </p>
        @enderror
    </div>
    <div class="flex flex-col justify-center items-center gap-4 border-b py-4 sm:flex-row">
        <p class="shrink-0 w-32 font-medium">Email</p>
        <input wire:model="email" type="email" value="{{ $user->email }}"
            class=" rounded-md border bg-white px-2 py-2 outline-none ring-blue-600 focus:ring-1" />
        @error('email')
            <p class="text-red-500 text-sm"> {{ $message }} </p>
        @enderror
    </div>
    <div class="flex flex-col gap-4 justify-center items-center border-b py-4 sm:flex-row">
        <p class="shrink-0 w-32 font-medium">Mot de passe</p>
        <input wire:model="password" type="password" placeholder="inchangé"
            class=" rounded-md border bg-white px-2 py-2 outline-none ring-blue-600 focus:ring-1" />
        @error('password')
            <p class="text-red-500 text-sm"> {{ $message }} </p>
        @enderror
    </div>
    <div class="flex justify-end py-4 sm:hidden">
        <button type="reset"
            class="mr-2 rounded-lg border-2 px-4 py-2 font-medium text-gray-500 focus:outline-none focus:ring hover:bg-gray-200">Annuler</button>
        <button type="submit"
            class="rounded-lg border-2 border-transparent bg-blue-600 px-4 py-2 font-medium text-white focus:outline-none focus:ring hover:bg-blue-700">Enregistrer</button>
    </div>
</form>
