<div id="preview" class="grid gap-y-4 max-w-[650px] my-3">
    <div id="media_main" class="max-h-[618px] w-full h-[100%] flex justify-center items-center">
        {{-- Section main preview--}}
    </div>
    <div id="previewContainer"
         class="grid grid-flow-col auto-cols-max h-[139px] justify-start items-center gap-x-4 overflow-x-auto py-2">
        {{-- Section small preview--}}
    </div>
</div>
<script>
    const preview = document.querySelector('#preview');
    const previewContainer = document.querySelector('#previewContainer');
    const mediaUploader = {{$mediaUploaderId}};
    const mediaMain = document.querySelector('#media_main');

    function createPreview(file) {

        // Create image container
        const container = document.createElement('div');
        container.className = 'h-[120px] relative h-[110px] w-[110px] box-border max-w-full flex justify-center items-center rounded-lg box-content';

        // Create image element
        let preview = undefined;
        if (file.type.startsWith('image'))
            preview = createPreviewItem(new Image(), file)
        else if (file.type.startsWith('video'))
            preview = createPreviewItem(document.createElement('video'), file);
        else
            return;
        // Create remove button
        const removeButton = createRemoveButton(file.name);

        // Handle image click to set it as main image
        preview.addEventListener('click', () => {
            setMediaMain(preview.src, file.type);
        });

        // Append elements to image container
        container.appendChild(preview);
        container.appendChild(removeButton);

        // Append image container to media preview
        previewContainer.appendChild(container);
    }

    function createPreviewItem(el, file) {
        el.className = 'h-[100%] w-full object-cover rounded-lg z-0 border hover:border-gray-300';
        el.src = URL.createObjectURL(file);
        el.alt = file.name;
        return el;
    }

    function setMediaMain(file, type) {
        const media_type = typeof file === 'object' ? 0 : 1;
        let item = undefined;
        if (type.startsWith('image')) {
            item = getMainItemOrCreate('img');
        } else if (type.startsWith('video')) {
            item = getMainItemOrCreate('video', 'controls');
        } else {
            console.error('Error set main media file: ' + file + ' type ' + type)
            return;
        }
        item.src = media_type ? file : URL.createObjectURL(file);
    }

    function getMainItemOrCreate(el, attribute) {
        let item = mediaMain.querySelector(el);
        if (!item) {
            clearMediaChild();
            item = createMainMediaItem(el, attribute)
            mediaMain.append(item);
        }

        return item;
    }

    function createMainMediaItem(el, attribute) {
        const item = document.createElement(el);
        item.className = 'h-[100%] max-w-full rounded-lg object-cover';
        if (attribute)
            item.setAttribute(attribute, '')

        return item;
    }

    function clearMediaChild() {
        mediaMain.querySelector('img, video')?.remove();
    }

    function clearPreviewChildren() {
        const items = previewContainer.querySelectorAll('div');
        for (let i = 0; i < items.length; i++)
            items[i].remove();
    }

    function createRemoveButton(fileName) {
        const removeButton = document.createElement('div');
        removeButton.className = 'absolute top-[-7px] right-[-5px] h-[20px] w-[20px] flex justify-center items-center rounded-full z-10 bg-gray-100  hover:bg-red-600 text-gray-600 hover:text-gray-200';

        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-xmark fa-lg p-0';

        removeButton.appendChild(icon);

        removeButton.addEventListener('click', () => {
            const parentContainer = removeButton.parentElement;
            parentContainer.remove();
            removeFileFromInput(fileName);
        });

        return removeButton;
    }

    function removeFileFromInput(fileName) {
        const newFiles = Array.from(mediaUploader.files).filter(file => !file.name.endsWith(fileName));

        // Create a new DataTransfer object and assign updated files
        const dt = new DataTransfer();
        newFiles.forEach(file => dt.items.add(file));

        mediaUploader.files = dt.files;
        handleVisiblePreview();
    }

    function handleVisiblePreview() {
        preview.style.display = mediaUploader.files.length > 0 ? 'grid' : 'none';
    }

    mediaUploader.addEventListener('change', function (ev) {
        if (!ev.target.files) return;

        clearPreviewChildren();

        [...ev.target.files].forEach(createPreview);
        const file_item = ev.target.files[0];

        setMediaMain(file_item, file_item.type);

        handleVisiblePreview();

    });

    handleVisiblePreview();

</script>
