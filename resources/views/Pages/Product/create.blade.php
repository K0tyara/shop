@extends('admin')

@section('content')
    <div class="container mx-auto pb-5">
        <div class="flex flex-col items-center flex-wrap">
            <form class="flex flex-col relative" action="{{route('admin.product.store')}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <p class="text-lg font-medium font-sans mb-4">
                    Add product
                </p>
                <div class="my-3">
                    <x-inputs.text :text="'Title'" :id="'title'" :name="'title'"
                                   :placeholder="'Awesome product...'"/>
                </div>
                {{--                {{dd($categories)}}--}}
                <div class="grid grid-cols-[1fr] sm:flex flex-row gap-x-4 justify-between">
                    <x-inputs.gray-dropdown :id="'category'"
                                            :text="'Category'"
                                            class="w-full justify-center"
                                            :dropdown-toggle="'dropdownCategory'">
                        <x-slot:content>
                            <x-lists.gray-ul :aria-labelledby="'category_ul'"
                                             :items="array_map(function ($item){
                                             return view('components.inputs.label-radio',[
                                              'id' => $item['id'],
                                              'value' => $item['id'],
                                              'title' => $item['name'],
                                              'name' => 'category_id'
                                             ]);
                                }, $categories)"
                            />
                        </x-slot:content>
                    </x-inputs.gray-dropdown>

                    <x-labels.sm-gray-label class="text-center sm:text-left sm:mx-4" :text="'before'"/>

                    <x-inputs.gray-dropdown :id="'subcategory'"
                                            :text="'Subcategory'"
                                            class="w-full justify-center"
                                            :dropdown-toggle="'dropdownSubcategory'">
                        <x-slot:content>
                            <x-lists.gray-ul :aria-labelledby="'subcategory_ul'"
                            />
                        </x-slot:content>
                    </x-inputs.gray-dropdown>

                    <x-labels.sm-gray-label class="text-center sm:text-left sm:mx-4" :text="'and'"/>

                    <x-inputs.gray-dropdown :id="'tags'"
                                            :text="'Tags'"
                                            class="w-full justify-center"
                                            :dropdown-toggle="'dropdownTags'">
                        <x-slot:content>
                            <x-lists.gray-ul :aria-labelledby="'tags_ul'"
                                             :items="array_map(function ($item){
                                             return view('components.inputs.label-checkbox',[
                                              'id' => $item['id'],
                                              'value' => $item['id'],
                                              'title' => $item['name'],
                                              'name' => 'tags[]'
                                             ]);
                                }, $tags)"/>
                        </x-slot:content>
                    </x-inputs.gray-dropdown>
                </div>
                @push('scripts')
                    <script data-categories="{{ json_encode($categories) }}"
                            src="/assets/js/category-resolver.js"></script>
                @endpush
                <div class="flex gap-x-3 my-4 items-center">
                    <p class="text-sm text-gray-500">
                        Colors
                    </p>
                    @foreach($colors as $color)
                        <x-inputs.color-checkbox :value="$color['id']" :name="'colors[]'" :hex-color="$color['hex']"/>
                    @endforeach
                </div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Description
                </label>
                <textarea id="message" name="description" rows="4" class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg
                          border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600
                          dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Leave a description..."></textarea>

                <div class="flex my-3 sm:items-center gap-x-4 flex-col sm:flex-row">
                    <x-inputs.counter :id="'price'"
                                      :name="'price'"
                                      :text="'Price'"
                                      :placeholder="'999.99'"
                                      :icon="'fa-solid fa-hand-holding-dollar'"/>
                    <x-inputs.counter :id="'qty'"
                                      :name="'qty'"
                                      :text="'Quantity'"
                                      :placeholder="'100'"
                                      :icon="'fa-solid fa-gift'"/>
                </div>
                <x-labels.sm-gray-label :text="' Upload multiple files'"/>
                <x-inputs.file :id="'media_uploader'"
                               :name="'media[]'"
                               :types="'image/*,video/*'"
                               :is-multiple="true"/>
                <x-gallery.product-media-galery :media-uploader-id="'media_uploader'"/>

                <x-buttons.primary-button :content="'Add product'"
                                          class="self-end my-6"/>
            </form>
        </div>
    </div>
@endsection
