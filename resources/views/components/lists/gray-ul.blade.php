<ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200"
   @if(isset($ariaLabelledby))  aria-labelledby="{{$ariaLabelledby}}" @endif>
    @foreach($items as $item)
        <li>
            {{$item}}
        </li>
    @endforeach
</ul>
