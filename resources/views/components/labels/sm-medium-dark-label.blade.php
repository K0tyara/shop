<label @if(isset($for)) for="{{$for}}" @endif
    {{$attributes->merge([
'class' => 'text-sm font-medium text-gray-900 dark:text-white'
])}}>{{$text}}</label>
