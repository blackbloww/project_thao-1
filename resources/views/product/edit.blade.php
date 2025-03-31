@extends('layout.app')
@section('title', 'Chỉnh sửa thông tin danh sách sản phẩm')
@section('content')
<section class="maker-edit">
    <div class="container">
        <div class="content">
            <div class="maker-section">
                <h4>Chỉnh sửa thông tin danh sách sản phẩm</h4>
                <hr class="hr">
                <form action="{{ route('product.update', $product->id) }}" method="POST" class="maker-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group__row">
                    <div class="form-group">
                        <label for="id" class="form-group__label">Mã sản phẩm</label>
                        <input type="text" id="id" name="id" 
                        value="{{ old('id', str_pad($product->id, 8, '0', STR_PAD_LEFT)) }}" 
                        class="form-group__input" readonly>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const inputId = document.querySelector(".form-group__input");
                        
                            inputId.addEventListener("click", function () {
                                alert("Bạn không thể chỉnh sửa mã sản phẩm!");
                            });
                        });
                        </script>
                
                                <div class="form-group">
                                    <label for="maker_name" class="form-group__label">Nhà sản xuất</label>
                                    <select id="maker_id" name="maker_id" class="form-group__input form-group__input-maker_id">
                                        <option value="" disabled selected>Vui lòng chọn</option>
                                        @foreach ($makers as $maker)
                                            <option value="{{ $maker->id }}"
                                                {{ old('maker_id', $product->maker_id) == $maker->id ? 'selected' : '' }}>
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
                                    <select id="category_id" name="category_id" class="form-group__input form-group__input-category_id">
                                        <option value="" disabled selected>Vui lòng chọn</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                                       value="{{ old('product_code', $product->product_code) }}" 
                                       class="form-group__input">
                                @error('product_code')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="product_name" class="form-group__label">Tên sản phẩm</label>
                                <input type="text" id="product_name" name="product_name" 
                                       value="{{ old('product_name', $product->product_name) }}" 
                                       class="form-group__input">
                                @error('product_name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group_one">       
                            <div class="form-group">
                                <label for="color_code">Mã màu:</label>
                                <input type="text" id="color_code">
                                <div id="color_code_list" class="list-box edit-list">
                                    @foreach ($productClasses as $productClass) 
                                        <div class="color-item old-color">{{ $productClass->color_code }}</div>
                                    @endforeach
                                </div>
                            </div>
                                       
                            <div class="form-group">
                                <label for="color">Tên màu:</label>
                                <input type="text" id="color">
                                <div id="color_list" class="list-box edit-list">
                                    @foreach ($productClasses as $productClass) 
                                        <div class="color-item old-color">{{ $productClass->color }}</div>
                                    @endforeach
                                </div>
                            </div>
                        <div class="form-group">
                            <label for="size">Kích cỡ:</label>
                            <input type="text" id="size">
                            <div id="size_list" class="list-box edit-list">
                                @foreach ($productClasses as $productClass) 
                                    <div class="size-item old-size" onclick="selectSize('{{ $productClass->size }}')">{{ $productClass->size }}</div>
                                @endforeach
                            </div>
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
                         
                        

                        
       <div class="form-group">
        <span>Ảnh hiện tại</span>
        <div class="current-images">
            @if (!empty($product->productImages) && $product->productImages->whereNull('deleted_at')->isNotEmpty())
                @foreach ($product->productImages->whereNull('deleted_at') as $image)
                    <div class="image-item" id="image-{{ $image->id }}">
                        <img src="{{ asset('storage/' . $image->product_image) }}" alt="Ảnh sản phẩm">
                        <button type="button" class="remove-btn" onclick="softDeleteImage({{ $image->id }})">Xóa</button>
                        <input type="hidden" name="deleted_images[]" id="input-delete-{{ $image->id }}" value="">
                    </div>
                @endforeach
            @else
                <p>Không có ảnh</p>
            @endif
    <div id="image-upload-wrapper" style="margin-top:20px"></div>
    <button type="button" class="image-upload-btn" onclick="addImageUploadForm()">Thêm ảnh</button>
</div>
</div>   
<script>
   function addImageUploadForm() {
    const wrapper = document.getElementById("image-upload-wrapper");

    // Tạo div mới chứa input file
    const newContainer = document.createElement("div");
    newContainer.classList.add("image-upload-container");

    newContainer.innerHTML = `
        <div class="form-group">
            <label for="product_image">Hình ảnh mới</label>
            <input type="file" name="product_image[]" multiple class="form-group__input--images" onchange="previewImage(event, this)">
            <button type="button" class="remove-btn" onclick="removeImageUploadForm(this)">Xóa</button>
        </div>
        <div class="preview-container"></div>
    `;

    wrapper.appendChild(newContainer);
}

function removeImageUploadForm(button) {
    button.closest(".image-upload-container").remove();
}

function previewImage(event, input) {
    const previewContainer = input.closest(".image-upload-container").querySelector(".preview-container");
    previewContainer.innerHTML = '';

    if (input.files) {
        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.classList.add("preview-image");
                img.style.width = "150px";
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }
}

function softDeleteImage(imageId) {
    if (confirm("Bạn có chắc chắn muốn xóa ảnh này không?")) {
        const imageElement = document.getElementById(`image-${imageId}`);
        const inputDelete = document.getElementById(`input-delete-${imageId}`);

        if (imageElement && inputDelete) {
            imageElement.style.display = "none"; // Ẩn ảnh khỏi giao diện
            inputDelete.value = imageId; // Đánh dấu ảnh bị xóa mềm để gửi lên server
        }
    }
}

</script>
<div class="form-group">
    <label for="note" class="form-group__labels">Ghi chú</label>
    <textarea id="note" name="note" class="form-group__input form-group__input--notes">{{ old('note', $product->note) }}</textarea>

</div>  
                    </div>           
                    <div class="customer-actions">
                        <button type="submit" class="btn-update">Cập nhật</button>
                        <td>
                            <a href="{{ route('productclass.edit', $productClass->id) }}">
                                <button type="button" class="image-upload">Chi tiết sản phẩm</button>
                            </a>
                        </td>                                              
                        
                    </div>
                </form>
                
                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            
           

            </div>
        </div>
    </div>
</section>
@endsection


