<div class="flex flex-row gap-x-4 items-center justify-between">
    @if(isset($title))
        <label for="title" class="in my-2 text-sm text-gray-600 dark:text-white">{{$title}}</label>
    @endif
    <button id="{{$id}}" data-dropdown-toggle="{{$dropdownToggle}}" data-dropdown-trigger="click"
            {{$attributes->merge([
    'class'=> 'hover:text-white bg-gray-100 hover:bg-blue-800 border border-gray-300
font-medium rounded-lg text-sm px-5 py-2 text-center
inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700'
])}}
            type="button">
        {{$text}}
        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
             fill="none"
             viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"/>
        </svg>
    </button>
    <div id="{{$dropdownToggle}}"
         class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        {{$content}}
    </div>
</div>
