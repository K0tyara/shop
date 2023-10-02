<label @if(isset($for)) for="{{$for}}" @endif
    {{$attributes->merge([
'class' => 'block my-2 text-sm text-gray-600 dark:text-white'
])}}>{{$text}}</label>
