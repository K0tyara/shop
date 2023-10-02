@extends('admin')

@section('content')
    <x-admin.table.table-template>
        <x-slot:top>
            <div
                class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="flex items-center flex-1 space-x-4">
                    <x-admin.table.total :title="'Categories: '" :total="count($subcategories)"/>
                </div>
                <form action="{{route('admin.subcategory.store')}}" method="POST"
                      class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                    @csrf
                    <div class="flex flex-col sm:flex-row gap-x-4 gap-y-2">
                        <div class="flex gap-x-4">
                            <x-labels.sm-gray-label class="w-auto shrink-0" :text="'Subcategory'" :for="'category'"/>
                            <x-inputs.text id="category" :name="'name'" :placeholder="'name..'"/>
                        </div>
                        <div>
                            <x-inputs.gray-dropdown :text="'category'"
                                                    :id="'category'"
                                                    :title="'Category'"
                                                    :dropdown-toggle="'dropdownCategory'">
                                <x-slot:content>
                                    <x-lists.gray-ul
                                        :aria-labelledby="'category_ul'"
                                        :items="array_map(function ($item){
                                             return view('components.inputs.label-checkbox',[
                                              'id' => $item['id'],
                                              'value' => $item['id'],
                                              'title' => $item['name'],
                                              'name' => 'categories[]'
                                             ]);
                                }, $categories)"/>
                                </x-slot:content>
                            </x-inputs.gray-dropdown>
                        </div>
                    </div>
                    <x-buttons.primary-button :content="' Add new category'" :icon="'fa-solid fa-plus fa-md'"/>
                </form>
            </div>
        </x-slot:top>
        <x-slot:head>
            <x-admin.table.tr-head :contents="[ 'Name',
                                            'Subcategory',
                                            'Products count',
                                            'Options',
                                            ]"/>
        </x-slot:head>
        <x-slot:body>
            @foreach($subcategories as $category)
                <x-admin.table.tr-body>
                    <x-slot:content>
                        <x-admin.table.td>
                            <x-slot:content>
                                {{$category['name']}}
                            </x-slot:content>
                        </x-admin.table.td>
                        <x-admin.table.td>
                            <x-slot:content>
                                <div class="flex flex w-[200px] sm:w-full overflow-hidden overflow-x-auto gap-x-2">
                                    @if($category['parents'])
                                        @foreach($category['parents'] as $parent)
                                            <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2
                                            py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                                  {{$parent['name']}}
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2
                                                 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                                    none
                                                 </span>
                                    @endif
                                </div>
                            </x-slot:content>
                        </x-admin.table.td>
                        <x-admin.table.td>
                            <x-slot:content>
                                {{$category['products_count']}}
                            </x-slot:content>
                        </x-admin.table.td>
                        <x-admin.table.td>
                            <x-slot:content>
                                <div class="flex gap-x-4 justify-end">
                                    <button class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4
                                                                  font-medium rounded-sm text-sm px-5 py-[4px] text-center mr-2 mb-2 ">
                                        <i class="fa-regular fa-pen-to-square fa-md"></i>
                                    </button>
                                    <x-buttons.red-delete-a :href="route('admin.subcategory.delete', $category->id)"/>

                                </div>
                            </x-slot:content>
                        </x-admin.table.td>
                    </x-slot:content>
                </x-admin.table.tr-body>

            @endforeach
        </x-slot:body>
    </x-admin.table.table-template>

@endsection