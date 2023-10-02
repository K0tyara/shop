@extends('admin')

@section('content')
    <x-admin.table.table-template>
        <x-slot:top>
            <div
                class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="flex items-center flex-1 space-x-4">
                    <x-admin.table.total :title="'Colors: '" :total="count($colors)"/>
                </div>
                <form action="{{route('admin.color.store')}}" method="post"
                      class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                    @csrf
                    <div class="flex flex-row items-center gap-x-4">
                        <x-labels.sm-gray-label class="w-auto" :text="'Hex#'" :for="'hex'"/>
                        <input id="hex" name="hex" type="color"/>
                        <x-inputs.text :id="'color'"
                                       :name="'name'"
                                       :placeholder="'Name..'"/>

                    </div>
                    <x-buttons.primary-button :content="'Add color'" :icon="'fa-solid fa-plus fa-md'"
                                              :href="route('admin.color.create')"/>
                </form>
            </div>
        </x-slot:top>
        <x-slot:head>
            <x-admin.table.tr-head :contents="[ 'Name',
                                            'Hex',
                                            'Color',
                                            'Options',
                                            ]"/>
        </x-slot:head>
        <x-slot:body>
            @foreach($colors as $color)
                <x-admin.table.tr-body>
                    <x-slot:content>
                        <x-admin.table.td>
                            <x-slot:content>
                                {{$color['name']}}
                            </x-slot:content>
                        </x-admin.table.td>
                        <x-admin.table.td>
                            <x-slot:content>
                                <p>
                                    {{$color['hex']}}
                                </p>
                            </x-slot:content>
                        </x-admin.table.td>
                        <x-admin.table.td>
                            <x-slot:content>
                                <div class="w-5 h-5" style="background-color: {{$color['hex']}}">

                                </div>
                            </x-slot:content>
                        </x-admin.table.td>
                        <x-admin.table.td>
                            <x-slot:content>
                                <div class="flex gap-x-4 justify-end">
                                    <x-buttons.red-delete-a :href="route('admin.color.delete', $color->id)"/>
                                </div>
                            </x-slot:content>
                        </x-admin.table.td>
                    </x-slot:content>
                </x-admin.table.tr-body>
            @endforeach
        </x-slot:body>
    </x-admin.table.table-template>

@endsection
