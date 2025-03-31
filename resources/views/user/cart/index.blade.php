@extends('layout.master')

@section('title', 'Danh sách sản phẩm')

@section('content')

<div class="cart">
    <div class="container">
        <div class="content">
            <div class="cart__card">
                <div class="left">
                    <div class="item">
                    <div class="product-image-cart">
                        <img  alt="Galaxy S25 Ultra (chỉ có tại Samsung.com)" title="Galaxy S25 Ultra (chỉ có tại Samsung.com)" src="https://images.samsung.com/is/image/samsung/p6pim/vn/2501/gallery/vn-galaxy-s25-s938-534623-sm-s938bzdbxxv-544745977?$ORIGIN_PNG$?$450_450_PNG$" srcset="https://images.samsung.com/is/image/samsung/p6pim/vn/2501/gallery/vn-galaxy-s25-s938-534623-sm-s938bzdbxxv-544745977?$ORIGIN_PNG$?$450_450_PNG$" class="ng-star-inserted">
                    </div>
                    <div class="product-txt">
                        <h3>Galaxy S25 Ultra (chỉ có tại<br> Samsung.com)</h3>
                       <span class="cart__options">Vàng Hồng Titan</span>
                       <span class="cart__options">,</span>
                       <span class="cart__options">Dual SIM 256 GB</span>  
                       <div class="cart__sku"> SM-S938BZDBXXV</div>  
                        <div class="cart__stock"> Còn hàng </div>
                    </div>
                        <div class="cart-details">
                            <div class="cart-price">
                                <span class="current-price">32.990.000 VND</span>
                                <span class="original-price">33.990.000 VND</span>
                            </div>
                            <div class="delete">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#1f1f1f"><path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z"/></svg>
                            </div>
                            <div class="number-input">
                                <button class="minus">-</button>
                                <span class="number">1</span>
                                <button class="plus">+</button>
                              </div>
                        </div>
                </div>
                <div class="right">
                   hdksdksk
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection