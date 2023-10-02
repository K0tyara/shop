@extends('admin')

@section('content')
    <div class="container mx-auto h-[100%]">
        <form action="{{route('admin.color.store')}}" method="post">
            <div class="grid grid-cols-[400px_100px_100px] grid-rows-2 items-center">
                <div>
                    <x-inputs.text :text="'Color name'"
                                   :id="'color'"
                                   :placeholder="'Name..'"/>
                </div>
                <div>
                    <label for="cp">Color</label>
                    <input id="cp" type="color">
                </div>
            </div>
        </form>
    </div>
@endsection
