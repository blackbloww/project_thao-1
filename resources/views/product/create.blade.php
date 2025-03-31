@extends('layout.app')
@section('title', 'Đăng ký sản phẩm')
@section('content')
    <section class="maker-edit">
        <div class="container">
            <div class="content">
                <div class="maker-section">
                    <h4>Đăng ký sản phẩm</h4>
                    <hr class="hr">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" >

                        @csrf

                        <div class="form-group__row">
                            <div class="form-group">
                                <label for="maker_name" class="form-group__label">Nhà sản xuất</label>
                                <select id="maker_id" name="maker_id" class="form-group__input form-group__input-maker_id">
                                    <option value="">Chọn nhà sản xuất</option>
                                    @foreach ($makers as $maker)
                                        <option value="{{ $maker->id }}"
                                            {{ old('maker_id') == $maker->id ? 'selected' : '' }}>
                                            {{ $maker->maker_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('maker_id')
                                <div class="error-message_one">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="category_name" class="form-group__label">Danh mục sản phẩm</label>
                                <select id="category_id" name="category_id"
                                    class="form-group__input form-group__input-category_id">
                                    <option value="">Chọn danh mục</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="error-message_one">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="product_code" class="form-group__label">Mã sản phẩm</label>
                                <input type="text" id="product_code" name="product_code"
                                    class="form-group__input form-group__input-product_code"
                                    value="{{ old('product_code') }}">
                                @error('product_code')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="product_name" class="form-group__label">Tên sản phẩm</label>
                                <input type="text" id="product_name" name="product_name"
                                    class="form-group__input form-group__input--product_name"
                                    value="{{ old('product_name') }}">
                                @error('product_name')
                                    <div class="error-message_one">{{ $message }}</div>
                                @enderror
                            </div>
                           

                            <div class="form-group_one">
                                <div class="form-group">
                                    <label for="color_code">Mã màu:</label>
                                    <input type="text" id="color_code">
                                    <div id="color_code_list" class="list-box"></div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="color">Tên màu:</label>
                                    <input type="text" id="color">
                                    <div id="color_list" class="list-box"></div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="size">Kích cỡ:</label>
                                    <input type="text" id="size">
                                    <div id="size_list" class="list-box"></div>
                                </div>
                            </div>
                            
                            <input type="hidden" name="color[]" id="hidden_colors">
                            <input type="hidden" name="color_code[]" id="hidden_color_codes">
                            <input type="hidden" name="size[]" id="hidden_sizes">
                            
                            <script>
                                const colorInput = document.getElementById('color');
                                const colorList = document.getElementById('color_list');
                                const sizeInput = document.getElementById('size');
                                const sizeList = document.getElementById('size_list');
                                const colorCodeInput = document.getElementById('color_code');
                                const colorCodeList = document.getElementById('color_code_list');
                            
                                function addItemToList(input, list, itemClass, inputName, defaultValue = "-") {
                                    const value = input.value.trim() || defaultValue;
                                    const listItem = document.createElement('div');
                                    listItem.classList.add(itemClass);
                                    listItem.textContent = value;
                            
                                    const hiddenInput = document.createElement('input');
                                    hiddenInput.type = 'hidden';
                                    hiddenInput.name = inputName;
                                    hiddenInput.value = value;
                            
                                    listItem.appendChild(hiddenInput);
                                    listItem.addEventListener('dblclick', function () {
                                        const index = [...list.children].indexOf(listItem);
                                        listItem.remove();
                                        toggleListDisplay(list);
                            
                                        if (list === colorList) {
                                            colorCodeList.children[index]?.remove();
                                            toggleListDisplay(colorCodeList);
                                        } else if (list === colorCodeList) {
                                            colorList.children[index]?.remove();
                                            toggleListDisplay(colorList);
                                        }
                                    });
                            
                                    list.appendChild(listItem);
                                    input.value = '';
                                    toggleListDisplay(list);
                                }
                            
                                function toggleListDisplay(list) {
                                    list.style.display = list.children.length > 0 ? 'block' : 'none';
                                }
                            
                                function handleKeyPress(event) {
                                    if (event.key === 'Enter') {
                                        event.preventDefault();
                                        if (event.target === colorCodeInput && colorInput.value.trim() === '') {
                                            alert('Vui lòng nhập màu sắc');
                                            return;
                                        }
                                        if (event.target === colorInput && event.target.value.trim() === '') {
                                            alert('Vui lòng nhập màu sắc');
                                            return;
                                        }
                                        if (event.target.value.trim() !== '') {
                                            if (event.target === colorInput || event.target === colorCodeInput) {
                                                addItemToList(colorCodeInput, colorCodeList, 'list-item', 'color_code[]');
                                                addItemToList(colorInput, colorList, 'list-item', 'color[]');
                                            }
                                        }
                                    }
                                }
                            
                                colorInput.addEventListener('keypress', handleKeyPress);
                                colorCodeInput.addEventListener('keypress', handleKeyPress);
                            
                                sizeInput.addEventListener('keypress', function (event) {
                                    if (event.key === 'Enter') {
                                        event.preventDefault();
                                        if (sizeInput.value.trim() !== '') {
                                            addItemToList(sizeInput, sizeList, 'list-item', 'size[]');
                                        }
                                    }
                                });
                            
                                function initializeDoubleClickForExistingItems() {
                                    const allColorItems = colorList.querySelectorAll('.list-item');
                                    const allColorCodeItems = colorCodeList.querySelectorAll('.list-item');
                                    const allSizeItems = sizeList.querySelectorAll('.list-item');
                            
                                    allColorItems.forEach(item => {
                                        item.addEventListener('dblclick', function () {
                                            const index = [...colorList.children].indexOf(item);
                                            item.remove();
                                            toggleListDisplay(colorList);
                                            colorCodeList.children[index]?.remove();
                                            toggleListDisplay(colorCodeList);
                                        });
                                    });
                            
                                    allColorCodeItems.forEach(item => {
                                        item.addEventListener('dblclick', function () {
                                            const index = [...colorCodeList.children].indexOf(item);
                                            item.remove();
                                            toggleListDisplay(colorCodeList);
                                            colorList.children[index]?.remove();
                                            toggleListDisplay(colorList);
                                        });
                                    });
                            
                                    allSizeItems.forEach(item => {
                                        item.addEventListener('dblclick', function () {
                                            const index = [...sizeList.children].indexOf(item);
                                            item.remove();
                                            toggleListDisplay(sizeList);
                                        });
                                    });
                                }
                            
                                initializeDoubleClickForExistingItems();
                            </script> 
                            

                          

                            <div id="image-upload-wrapper"></div>

                            <button type="button" class="image-upload-btn" onclick="addImageUploadForm()">Chọn ảnh</button>

                            <script>
                                function addImageUploadForm() {
                                    const wrapper = document.getElementById("image-upload-wrapper");

                                    // Tạo một div mới cho form upload ảnh
                                    const newContainer = document.createElement("div");
                                    newContainer.classList.add("image-upload-container");

                                    // Thêm nội dung HTML vào container mới
                                    newContainer.innerHTML = `
                                    <div class="form-group">
                                                                <label for="product_image">Hình ảnh</label>
                                                                <input type="file" name="product_image[]" multiple class="form-group__input--images" onchange="previewImage(event, this)">
                                                                <button type="button" class="remove-btn" onclick="removeImageUploadForm(this)">Xóa</button>
                                                            </div>
                                                            <div class="preview-container"></div>
                                                            
                                    `;

                                    // Thêm vào wrapper
                                    wrapper.appendChild(newContainer);
                                }

                                // Hàm xóa form upload ảnh
                                function removeImageUploadForm(button) {
                                    button.closest(".image-upload-container").remove();
                                }

                                // Hàm hiển thị ảnh preview
                                function previewImage(event, input) {
                                    const previewContainer = input.closest(".image-upload-container").querySelector(".preview-container");

                                    // Xóa ảnh cũ nếu có
                                    previewContainer.innerHTML = '';

                                    if (input.files && input.files[0]) {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            const img = document.createElement("img");
                                            img.src = e.target.result;
                                            img.classList.add("preview-image");
                                            previewContainer.appendChild(img);
                                        };
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>

                            <div class="form-group">
                                <label for="note" class="form-group__labels">Ghi chú</label>
                                <textarea id="note" name="note" class="form-group__input form-group__input--notes">{{ old('note') }}</textarea>

                            </div>

                            <div class="customer-actions">
                                <button type="submit" class="btn-update">Đăng ký</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


   

@endsection
