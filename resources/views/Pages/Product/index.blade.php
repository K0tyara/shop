@extends('admin')

@section('content')
    <x-admin.table.table-template>
        <x-slot:top>
            <div
                class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="flex items-center flex-1 space-x-4">
                    <x-admin.table.total :title="'All Products: '"
                                         :total="$data['meta']['total']"/>
                </div>
                <div
                    class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                    <x-buttons.primary-a :content="' Add new product'"
                                         :icon="'fa-solid fa-plus fa-md'"
                                         :href="route('admin.product.create')"/>
                    <x-buttons.secondary-button :content="'Update stocks 1/250'" :icon="'fa-solid fa-rotate fa-md'"/>
                    <x-buttons.secondary-button ry-button :content="'Export'" :icon="'fa-solid fa-upload fa-md'"/>
                </div>
            </div>
        </x-slot:top>
        <x-slot:head>
            <x-admin.table.tr-head :contents="[
            'Product',
            'Category',
            'Subcategory',
            'Tags',
            'Stock',
            'Sales',
            'Rating',
            'Options',
            ]"/>
        </x-slot:head>
        <x-slot:body>
            @foreach($data['data'] as $product)
                <x-admin.table.tr-body>
                    <x-slot:content>
                        <x-admin.table.td class="flex items-center">
                            <x-slot:content>
                                <img src="{{$product['preview']}}"
                                     alt="iMac Front Image" class="w-auto h-8 mr-3">
                                {{$product['title']}}
                            </x-slot:content>
                        </x-admin.table.td>
                        <x-admin.table.td>
                            <x-slot:content>
                                 <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2
                                 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                     {{$product['category']['name']}}
                                 </span>
                            </x-slot:content>
                        </x-admin.table.td>
                        <x-admin.table.td>
                            <x-slot:content>
                                 <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2
                                 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                     {{$product['subcategory']['name']}}
                                 </span>
                            </x-slot:content>
                        </x-admin.table.td>
                        <x-admin.table.td>
                            <x-slot:content>
                                <div class="flex sm:max-w-[200px] overflow-hidden overflow-x-auto gap-x-2">
                                    @if(count($product['tags']) > 0)
                                        @foreach($product['tags'] as $tags) @endforeach
                                        <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2
                                                 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                                     {{$tags['name']}}
                                                 </span>
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
                                <div class="flex items-center">
                                    <div class="inline-block w-4 h-4 mr-2 bg-red-700 rounded-full"></div>
                                    {{$product['qty']}}
                                </div>
                            </x-slot:content>
                        </x-admin.table.td>
                        <x-admin.table.td>
                            <x-slot:content>
                                0%
                            </x-slot:content>
                        </x-admin.table.td>
                        <x-admin.table.td>
                            <x-slot:content>
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                         fill="currentColor" viewbox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                         fill="currentColor" viewbox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                         fill="currentColor" viewbox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                         fill="currentColor" viewbox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                         fill="currentColor" viewbox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="ml-1 text-gray-500 dark:text-gray-400">5.0</span>
                                </div>
                            </x-slot:content>
                        </x-admin.table.td>
                        <x-admin.table.td>
                            <x-slot:content>
                                <div class="flex gap-x-4 justify-end">
                                    <x-buttons.yellow-edit-a :href="route('admin.product.edit', $product['id'])"/>
                                    <button class="text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-4
                                                                  font-medium rounded-sm text-sm px-5 py-[4px] text-center mr-2 mb-2 ">
                                        <i class="fa-regular fa-trash-can fa-md"></i>

                                    </button>
                                </div>
                            </x-slot:content>
                        </x-admin.table.td>
                    </x-slot:content>
                </x-admin.table.tr-body>
            @endforeach
        </x-slot:body>
        <x-slot:bottom>
            <nav
                class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                    <span class="font-semibold text-gray-900 dark:text-white">
                        {{$data['meta']['from']}} - {{$data['meta']['to']}}
                    </span>
                    of
                  <span class="font-semibold text-gray-900 dark:text-white">
                      {{$data['meta']['total']}}
                  </span>
                </span>
                <x-pagination :links="$data['links']"
                              :meta="$data['meta']"
                              :offset="3"/>
            </nav>
        </x-slot:bottom>
    </x-admin.table.table-template>

@endsection


