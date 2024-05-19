<div class="flex py-20 animate__animated items-center min-h-96 mx-5 animate__fadeIn justify-center lg:ps-52">
    <div class="bg-white p-6 shadow-lg rounded-lg text-center">
        <h1 class="lg:text-3xl text-lg font-semibold pt-5 text-[#004F91] font-poppins text-center my-5">
            Bienvenue {{ $nom_complet }} au Tableau de Bord...
        </h1>
        <h2 class="lg:text-2xl text-md font-semibold pt-3 text-[#004F91] font-poppins text-center my-5">
            Commencez ici
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
            <a wire:navigate href="/liste_permis/ajouter_permis"
                class="card bg-[#004F91] text-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105 hover:bg-[#003766] animate__animated animate__fadeInUp">
                <h3 class="text-xl font-bold mb-4">Ajouter permis</h3>
            </a>
            <a wire:navigate href="/liste_permis"
                class="card bg-[#004F91] text-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105 hover:bg-[#003766] animate__animated animate__fadeInUp">
                <h3 class="text-xl font-bold mb-4">Liste des permis</h3>
            </a>
            <a wire:navigate href="/historique"
                class="card bg-[#004F91] text-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105 hover:bg-[#003766] animate__animated animate__fadeInUp">
                <h3 class="text-xl font-bold mb-4">Historique</h3>
            </a>
        </div>
    </div>
</div>
