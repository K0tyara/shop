<tr>
    @foreach($contents as $content)
        <x-admin.table.th :content="$content"/>

    @endforeach
</tr>
