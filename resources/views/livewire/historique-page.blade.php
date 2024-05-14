<div>
    {{-- Tableau --}}
    <div class="flex flex-col mt-6 mx-3 lg:items-center lg:ms-60 mb-5">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full lg:w-[950px] inline-block align-middle">
                <div>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-black rounded-lg">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    Date</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    Utilisateur</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    Action</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase dark:text-neutral-500">
                                    Objet</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white dark:divide-neutral-700">
                            @forelse ($historique as $history)
                                <tr wire:key='{{ $history->id }}' class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200 uppercase">
                                        {{ $history->created_at }}</td>
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ $history->user_name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 capitalize">
                                        {{ $history->action }}</td>

                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 capitalize">
                                        {{ $history->objet }}</td>
                                </tr>
                            @empty
                                pas de données disponibles
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-4">
            {{ $historique->links() }}
        </div>
    </div>
</div>
