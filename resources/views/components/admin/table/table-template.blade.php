<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto w-full ">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            @if(isset($top))
                {{$top}}
            @endif
            <div class="overflow-x-auto">
                <x-admin.table.table>
                    <x-slot:tr>
                        {{$head}}
                    </x-slot:tr>
                    <x-slot:body>
                        {{$body}}
                    </x-slot:body>
                </x-admin.table.table>
            </div>
            @if(isset($bottom))
                {{$bottom}}
            @endif
        </div>
    </div>
</section>
