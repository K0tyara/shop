<x-labels.sm-medium-dark-label :for="$id"
                               :text="$text"/>
<div class="relative">
    @if(isset($icon))
        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
            <i class="{{$icon}} text-gray-500"></i>
        </div>
    @endif

    <input type="number" id="{{$id}}" name="{{$name}}" class="bg-gray-50 border border-gray-300 text-gray-900
     text-sm rounded-lg block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
           @if(isset($placeholder)) placeholder="{{$placeholder}} @endif" @if(isset($value)) value="{{$value}}" @endif/>
</div>
