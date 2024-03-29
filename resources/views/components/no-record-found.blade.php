<tr class="border-t border-b border-gray-100 odd:bg-violet-50/25">
    <td colspan="10">
        <div class="flex items-center justify-center w-full p-4">
            <div
                class="filament-tables-empty-state flex flex-1 flex-col items-center justify-center p-6 mx-auto space-y-6 text-center bg-white">
                <div class="flex items-center justify-center w-16 h-16 text-primary-500 rounded-full bg-indigo-50">
                    <svg wire:loading.remove.delay="1"
                        wire:target="previousPage,nextPage,gotoPage,sortTable,tableFilters,resetTableFiltersForm,tableSearchQuery,tableColumnSearchQueries,tableRecordsPerPage"
                        class="w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </div>
                <div class="max-w-md space-y-1">
                    <h2 class="filament-tables-empty-state-heading text-xl font-bold tracking-tight">
                        No records found
                    </h2>
                    <p
                        class="filament-tables-empty-state-description whitespace-normal text-sm font-medium text-gray-500">
                    </p>
                </div>
            </div>
        </div>
    </td>
</tr>
