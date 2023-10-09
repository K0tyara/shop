const category = document.querySelector('#category');
const subcategory_button = document.querySelector('#subcategory_id');
const subcategory_list = document.querySelector('ul[aria-labelledby=subcategory_ul]');
const radioButtons = document.querySelectorAll('input[type="radio"][name="category_id"]');
const colorsList = document.querySelectorAll("input[name='colors[]']");

const categoriesJson = document.querySelector('script[data-categories]').getAttribute('data-categories');
const productJson = document.querySelector('script[data-product]')?.getAttribute('data-product');
const categories = JSON.parse(categoriesJson);

let product;
if (productJson)
    product = JSON.parse(productJson);

subcategory_button.classList.add('text-gray-200');
subcategory_button.classList.add('hover:bg-gray-200');
subcategory_button.setAttribute('disabled', '');

function createRadio(sub, isChecked) {

    const li = document.createElement('li');
    const div = document.createElement('div');
    const input = document.createElement('input');
    const label = document.createElement('label');
    div.classList.add('flex', 'items-center');
    input.id = sub.id;
    input.value = sub.id;
    input.checked = isChecked;
    input.name = 'subcategories';
    input.type = 'radio';
    input.classList.add('w-4', 'h-4', 'text-blue-600', 'bg-gray-100', 'border-gray-300', 'rounded-full',
        'focus:ring-blue-500', 'dark:focus:ring-blue-600', 'dark:ring-offset-gray-700', 'dark:focus:ring-offset-gray-700',
        'focus:ring-2', 'dark:bg-gray-600', 'dark:border-gray-500');
    label.classList.add('ml-2', 'text-sm', 'font-medium', 'text-gray-900', 'dark:text-gray-300');
    label.textContent = sub.name;

    div.appendChild(input);
    div.appendChild(label);
    li.appendChild(div);

    return li;
}

radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener('change', function () {
        handeChangeSubcategories(radioButton);
    });
});

function handeChangeSubcategories(radioButton, checkedIndex) {
    if (radioButton.checked) {
        const selectedValue = radioButton.value;
        subcategory_list.innerHTML = '';
        const subcategory = categories[selectedValue - 1]?.subcategories || [];
        if (subcategory.length > 0) {
            subcategory_button.removeAttribute('disabled');

            subcategory.forEach(sub => {
                subcategory_list.appendChild(createRadio(sub, Number(checkedIndex) === Number(sub.id)));
                subcategory_button.classList.remove('text-gray-200');
                subcategory_button.classList.remove('hover:bg-gray-200');
                subcategory_button.removeAttribute('disabled');
            });

        } else {
            subcategory_button.setAttribute('disabled', '');
            subcategory_button.classList.add('text-gray-200');
            subcategory_button.classList.add('hover:bg-gray-200');
        }
    }
}

function setCheckedState(elements, data) {
    elements.forEach(element => {
        const elementId = element.value;
        element.checked = data.includes(elementId);
    });
}

if (product) {
    const categoryList = document.querySelectorAll('[aria-labelledby=category_ul] input[type=radio]');
    const selectedCategoryId = product.category.id;
    const selectedCategoryRadio = Array.from(categoryList).find(c => c.id === String(selectedCategoryId));
    if (selectedCategoryRadio) {
        selectedCategoryRadio.checked = true;
        handeChangeSubcategories(selectedCategoryRadio, product.subcategory.id);
    }

    const selectedColorIds = product.colors.map(c => String(c.id));
    setCheckedState(colorsList, selectedColorIds);

}
