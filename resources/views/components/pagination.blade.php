<div>
    <ul class="inline-flex items-stretch -space-x-px">
        <li>
            <a href="{{$links['first']}}"
               class="{{$meta['current_page'] == 1 ? 'hidden' : ''}}  flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white
               rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800
               dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Previous</span>
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
        </li>
        @foreach(array_filter(array_splice($meta['links'],1,count($meta['links'])-2), function ($item) use($meta, $offset){
            $label = $item['label'];
            if($label == '...')
                return false;

            $page = $meta['current_page'];
            if($offset != 0 && (int)$label < $page -$offset || (int)$label > $page + $offset)
                return  false;

            return  true;
        }) as $link)
            <li>
                <a href="{{$link['url']}}"
                   class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border
                    border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700
                    dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white
                    {{$link['active'] ? 'mx-2 font-bold':''}}">{{html_entity_decode($link['label'])}}</a>
            </li>
        @endforeach
        <li>
            <a href="{{$links['last']}}"
               class="{{$meta['current_page'] == $meta['last_page'] ? 'hidden' : ''}} flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Last</span>
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
        </li>
    </ul>
</div>
