@extends('admin')
@push('scripts')
    <script data-product="{{json_encode($product)}}"
            data-categories="{{ json_encode($categories) }}"
            src="/assets/js/product-data-resolver.js"></script>
@endpush
@section('content')
    <div class="container mx-auto pb-5">
        <div class="flex flex-col items-center flex-wrap">
            <form class="flex flex-col relative" action="{{route('admin.product.update',$product->id)}}"
                  method="post">
                @method('PUT')
                @csrf
                <p class="text-lg font-medium font-sans mb-4">
                    Edit product
                </p>
                <div class="my-3">
                    <x-inputs.text :text="'Title'" :id="'title'" :name="'title'" :value="$product->title"
                                   :placeholder="'Awesome product...'"/>
                </div>

                <div class="grid sm:grid-cols-[auto_auto_1fr] grid-flow-dense items-center grid-rows-2 grid-cols-1">
                    <x-inputs.gray-dropdown :id="'category'"
                                            :text="'Category'"
                                            :title="'Select category'"
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
                    <x-labels.sm-gray-label :text="'and'" class="mx-6"/>
                    <x-inputs.gray-dropdown :id="'subcategory'"
                                            :text="'Subcategory'"
                                            :title="'subcategory'"
                                            :dropdown-toggle="'dropdownSubcategory'">
                        <x-slot:content>
                            <x-lists.gray-ul :aria-labelledby="'subcategory_ul'"
                            />
                        </x-slot:content>
                    </x-inputs.gray-dropdown>
                </div>

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
                          placeholder="Leave a description...">{{$product->description}}</textarea>

                <div class="flex my-3 sm:items-center gap-x-4 flex-col sm:flex-row">
                    <x-inputs.counter :id="'price'"
                                      :name="'price'"
                                      :text="'Price'"
                                      :value="$product->price"
                                      :placeholder="'999.99'"
                                      :icon="'fa-solid fa-hand-holding-dollar'"/>
                    <x-inputs.counter :id="'qty'"
                                      :name="'qty'"
                                      :text="'Quantity'"
                                      :value="$product->qty"
                                      :placeholder="'100'"
                                      :icon="'fa-solid fa-gift'"/>
                </div>
                {{--                <x-labels.sm-gray-label :text="' Upload multiple files'"/>--}}
                {{--                <x-inputs.file :id="'media_uploader'"--}}
                {{--                               :name="'media[]'"--}}
                {{--                               :types="'image/*,video/*'"--}}
                {{--                               :is-multiple="true"/>--}}
                {{--                <x-gallery.product-media-galery :media-uploader-id="'media_uploader'"/>--}}

                <x-buttons.primary-button :content="'Update'"
                                          class="self-end my-6"/>
            </form>
        </div>
    </div>
@endsection
