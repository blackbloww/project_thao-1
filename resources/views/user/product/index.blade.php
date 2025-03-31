@extends('layout.master')

@section('title', 'Danh sách sản phẩm')

@section('content')
   
    <div class="product">
        <div class="container">
            <div class="content">
                <div class="carousel-slider">
                    @foreach ($products as $item)
                        <div class="item">
                            <div class="product-image-wrap">
                                @if ($item->productImages->isNotEmpty())
                                    <img src="{{ asset('storage/' . $item->productImages->first()->product_image) }}" 
                                        alt="Product Image" class="active">
                                @endif
                            </div>
                            <div class="product-info">
                                <p class="product-name active">{{ $item->product_name }}</p>
                            </div>
                            <div class="my-recommended-product__card--color" style="height: 47px;"></div>
                
                            <div class="product-options">
                                @foreach ($item->productClasses as $index => $class)
                                    <input type="radio" id="option-{{ $item->id }}-{{ $class->size }}" 
                                           name="product-size-{{ $item->id }}" 
                                           value="{{ $class->size }}" 
                                           data-price="{{ $class->price }}"
                                           {{ $index === 0 ? 'checked' : '' }}>
                                    <label for="option-{{ $item->id }}-{{ $class->size }}" class="option-label">{{ $class->size }}</label>
                                @endforeach
                            </div>
                
                            <div class="my-recommended-product__card--color" style="height: 30px;"></div>
                
                            <div class="product-price">
                                <span class="current-price" id="current-price-{{ $item->id }}">
                                    {{ number_format($item->productClasses[0]->price, 0, ',', '.') }} VND
                                </span>
                            </div>
                
                            <div class="my-recommended-product__card-cta">
                                <a class="card-cta" href="#">Mua ngay</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Khởi tạo slider
            $('.carousel-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
                infinite: true,
                arrows: true,
                autoplay: false,
                autoplaySpeed: 3000,
            });

        });
    </script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("input[type='radio']").forEach(radio => {
        radio.addEventListener("change", function () {
            let productId = this.id.split('-')[1]; // Lấy ID sản phẩm
            let price = this.dataset.price; // Lấy giá từ data-price

            // Cập nhật giá hiển thị
            document.getElementById(`current-price-${productId}`).innerText = 
                new Intl.NumberFormat('vi-VN').format(price) + " VND";
        });
    });
});

</script>
@endsection
