@extends('admin')

@section('content')
    <div class="container mx-auto pb-5">
        <div class="flex flex-col items-center flex-wrap">
            <div class="flex flex-col relative">
                <p class="text-lg font-medium font-sans mb-4">
                    Add product
                </p>
                <div class="my-3">
                    <x-inputs.text :text="'Title'" :id="'title'" :name="'title'"/>
                </div>
                <div class="grid sm:grid-cols-[auto_auto_1fr] grid-flow-dense items-center grid-rows-2 grid-cols-1">
                    <x-inputs.gray-dropdown :id="'category'"
                                            :text="'Category'"
                                            :title="'Select category'"
                                            :dropdown-toggle="'dropdownCategory'">
                        <x-slot:content>
                            <x-lists.gray-ul :aria-labelledby="'category_ul'"
{{--                                             :items="array_map(function ($item){--}}
{{--                                             return view('components.inputs.label-radio',[--}}
{{--                                              'id' => $item['id'],--}}
{{--                                              'value' => $item['id'],--}}
{{--                                              'title' => $item['name'],--}}
{{--                                              'name' => $item['subcategory']--}}
{{--                                             ]);--}}
{{--                                }, $subcategory)"--}}
                            />
                        </x-slot:content>
                    </x-inputs.gray-dropdown>
                    <x-labels.sm-gray-label :text="'and'" class="mx-6"/>
                    <x-inputs.gray-dropdown :id="'subcategory'"
                                            :text="'Subcategory'"
                                            :title="'subcategory'"
                                            :dropdown-toggle="'dropdownSubcategory'">
                        <x-slot:content>
                            <x-lists.gray-ul :aria-labelledby="'subcategory_ul'"
                                             :items="[
                                view('components.inputs.label-checkbox',[
                                    'id' => 'subcategory_1',
                                    'title' => 'subcategory_1',
                                    'value' => '1',
                                ]),
                                view('components.inputs.label-checkbox',[
                                    'id' => 'subcategory_2',
                                    'title' => 'subcategory_2',
                                    'value' => '2',
                                ]),
                                view('components.inputs.label-checkbox',[
                                    'id' => 'subcategory_3',
                                    'title' => 'subcategory_3',
                                    'value' => '3',
                                ]),
                             ]"/>
                        </x-slot:content>
                    </x-inputs.gray-dropdown>
                </div>
                <div class="flex gap-x-3 my-4 items-center">
                    <p class="text-sm text-gray-500">
                        Colors
                    </p>
                    <x-inputs.color-checkbox :name="'lightgreen'" :hex-color="'#32a852'"/>
                    <x-inputs.color-checkbox :name="'purple'" :hex-color="'#7532a8'"/>
                    <x-inputs.color-checkbox :name="'yellow'" :hex-color="'#bdc225'"/>
                    <x-inputs.color-checkbox :name="'red'" :hex-color="'#c22537'"/>
                    <x-inputs.color-checkbox :name="'blue'" :hex-color="'#2551c2'"/>
                    <x-inputs.color-checkbox :name="'orange'" :hex-color="'#c28625'"/>
                </div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Description
                </label>
                <textarea id="message" rows="4" class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg
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
                               :types="'image/*,video/*'"
                               :is-multiple="true"/>
                <x-gallery.product-media-galery :media-uploader-id="'media_uploader'"/>

                <x-buttons.primary-button :content="'Add product'"
                                          class="self-end my-6"/>
            </div>
        </div>
    </div>
@endsection
