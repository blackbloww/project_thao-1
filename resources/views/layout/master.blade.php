<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang Chủ')</title>
    <link rel="stylesheet" href="{{ asset('assets/styleindex.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/style-xdNZU-c8.css') }}">
    <link rel="stylesheet" type="text/css" href="style-slider.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="./assets/scss/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Nhúng Slick Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    @vite(['resources/js/app.js'])

</head>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleMenuButton = document.getElementById('toggle-menu');
        const navMenu = document.querySelector('.nav-menu');
        
        toggleMenuButton.addEventListener('click', function (event) {
            event.stopPropagation();
            navMenu.classList.toggle('active');
        });
    });
</script>

<script>
    document.querySelectorAll('.faq-toggle').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
        // Toggle the 'active' class on the clicked element
        this.classList.toggle('active');

        // Find the corresponding .faq-item-ft and toggle its display
        const faqItemFt = this.closest('.faq-item').querySelector('.faq-item-ft');
        faqItemFt.style.display = faqItemFt.style.display === 'block' ? 'none' : 'block';
        });
    });
</script>

<body>
    <header class="header">
        <div class="container">
            <div class="content">
                <div class="top-bar">
                    <div class="top-bar-content">
                        <ul class="nav-menu">
                            <li class="dropdown">
                                <a href="#" class="nav-menu__link nav-menu__link--support">Hỗ Trợ</a>
                                <div class="dropdown-menu">
                                  <div class="dropdown-left">
                                      <div class="dropdown-left-main">
                                          <div class="dropdown-column">
                                              <h5>Hỗ Trợ Sản Phẩm</h5>
                                              <a href="#">Trang chủ Hỗ Trợ</a>
                                              <a href="#">Hướng dẫn sử dụng & Software</a>
                                              <a href="#">Tìm kiếm</a>
                                              <a href="#">FAQ Hỗ trợ mua trực tuyến</a>
                                          </div>
                                          <div class="dropdown-column">
                                              <h5>Liên Hệ</h5>
                                              <a href="#" class="business">Tư Vấn Trực Tuyến
                                                <i class="fa-solid fa-arrow-up-long"></i>
                                             </a>
                                              <a href="#">Gọi Điện Thoại               
                                              </a>
                                              <a href="#" class="business">Gửi Email
                                                <i class="fa-solid fa-arrow-up-long"></i>
                                             </a>
                                              <a href="#" class="business">Ngôn Ngữ Ký Hiệu</a>
                                          </div>
                                      </div>
                                      <div class="dropdown-left-side">
                                          <div class="dropdown-column">
                                              <h5>Dịch VỤ Bảo Hành Và <br>Sửa Chữa</h5>
                                              <a href="#">Thông tin Bảo hành</a>
                                              <a href="#">Bảng giá linh kiện</a>
                                              <a href="#">Tìm Trung Tâm Bảo Hành</a>
                                              <a href="#">Tình Trạng Sửa Chữa</a>   
                                          </div>
                                          <div class="dropdown-column">
                                            <h5> Tìm Thêm Thông Tin</h5>
                                            <a href="#">Tin Tức & Cảnh Báo</a>
                                            <a href="#">Dịch Vụ Sửa Chữa Tiết Kiệm </a>  
                                        </div>
                                      </div>
                                  </div>
                                  <div class="dropdown-right">
                                    <h5 class="dropdown-right__title">MỚI & NỔI BẬT</h5>
                                    <div class="promo__list">
                                        <div class="promo__item">
                                            <div class="promo">
                                                <span class="promo__tag">Mới</span>
                                                <img class="promo__image" src="/storage/product_images/ar12tyhqasinsv-1.jpg" alt="load,...">
                                            </div>
                                            <p class="promo__text">Ưu đãi điều hòa</p>
                                        </div>
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/samsungshop2.png" alt="load,...">
                                            </div>
                                            <p class="promo__text">Samsung Shop App</p>
                                        </div>
                                
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/dtsamsung.jpg" alt="load,...">
                                            </div>
                                            <p class="promo__text">Mega Sale</p>
                                        </div>
                                
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/tulanh.jpg" alt="load,...">
                                            </div>
                                            <p class="promo__text">Thu Cũ Đổi Mới</p>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </li>
                            <li class="business">
                                <a href="#" class="business">
                                    For Business
                                    <i class="fa-solid fa-arrow-up-long"></i>
                                </a>
                                </li>
                            </ul>
                    </div>
                </div>
                <nav class="navbar">
                    <div class="nav-left">
                        <div class="header_logo">
                            <img src="/storage/product_images/Font-Samsung-Logo.jpg" alt="load,...">
                        </div>
                        <ul class="nav-menu">
                            <li class="dropdown">
                                <a href="#">Ưu Đãi</a>
                                <div class="dropdown-menu">
                                  <div class="dropdown-left">
                                      <div class="dropdown-left-main">
                                          <div class="dropdown-column">
                                              <h5>ƯU ĐÃI ĐỘC QUYỀN</h5>
                                              <a href="#">Galaxy S25 Series Offers</a>
                                              <a href="#">Tất Cả Ưu Đãi</a>
                                              <a href="#">e-Voucher Điện tử - Điện lạnh</a>
                                              <a href="#">E-Voucher Gia dụng Ai</a>
                                              <a href="#">Flash Sale</a>
                                              <a href="#">Samsung Rewards</a>
                                              <a href="#">Galaxy Studio</a>
                                          </div>
                                          <div class="dropdown-column">
                                              <h5>SAMSUNG EXPERIENCE STORE</h5>
                                              <a href="#">Samsung West Lake</a>
                                              <a href="#">Samsung 68</a>
                                              <a href="#">Cửa Hàng Trải Nghiệm Samsung</a>
                                              <a href="#">Điểm tư vấn & nhận hàng</a>
                                              <a href="#">Tìm cửa hàng</a>
                                          </div>
                                      </div>
                                      <div class="dropdown-left-side">
                                          <div class="dropdown-column">
                                              <h5>QUYỀN LỢI CHÍNH HÃNG</h5>
                                              <a href="#">Ưu Đãi Sinh Viên</a>
                                              <a href="#">Ưu Đãi Nhân Viên Đối Tác (EPP)</a>
                                              <a href="#">Ưu Đãi Chính Phủ</a>
                                              <a href="#">VIP Mall</a>
                                              <a href="#">Samsung Care+</a>
                                              <a href="#">Samsung Club Affiliates</a>
                                              <a href="#">Trả Góp 0%</a>
                                              <a href="#" class="business">Miễn Phí Giao Hàng 
                                                <i class="fa-solid fa-arrow-up-long"></i>
                                              </a>
                                              <a href="#">Hướng Dẫn Thiết Lập Quan Trọng</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="dropdown-right">
                                    <h5 class="dropdown-right__title">MỚI & NỔI BẬT</h5>
                                    <div class="promo__list">
                                        <div class="promo__item">
                                            <div class="promo">
                                                <span class="promo__tag">Mới</span>
                                                <img class="promo__image" src="/storage/product_images/ar12tyhqasinsv-1.jpg" alt="load,...">
                                            </div>
                                            <p class="promo__text">Ưu đãi điều hòa</p>
                                        </div>
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/samsungshop2.png" alt="load,...">
                                            </div>
                                            <p class="promo__text">Samsung Shop App</p>
                                        </div>
                                
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/dtsamsung.jpg" alt="load,...">
                                            </div>
                                            <p class="promo__text">Mega Sale</p>
                                        </div>
                                
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/tulanh.jpg" alt="load,...">
                                            </div>
                                            <p class="promo__text">Thu Cũ Đổi Mới</p>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </li>
                            <li class="dropdown">
                                <a href="#">Di Động</a>
                                <div class="dropdown-menu">
                                  <div class="dropdown-left">
                                      <div class="dropdown-left-main">
                                          <div class="dropdown-column">
                                              <h5>Di Động</h5>
                                              <a href="#">Khám phá các thiết bị di động</a>
                                              <a href="#">Điện thoại thông minh Galaxy</a>
                                              <a href="#">Galaxy Tab</a>
                                              <a href="#">Galaxy Watch</a>
                                              <a href="#">Galaxy Buds</a>
                                              <a href="#">Phụ kiện Galaxy</a>
                                              <a href="#">Galaxy AI</a>
                                              <a href="#">One UI</a>
                                              <a href="#">Samsung Health</a>
                                              <a href="#">Apps & Services</a>
                                              <a href="#">Why Galaxy</a>
                                              <a href="#">Chuyển sang Galaxy</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="dropdown-right">
                                    <h5 class="dropdown-right__title">MỚI & NỔI BẬT</h5>
                                    <div class="promo__list">
                                        <div class="promo__item">
                                            <div class="promo">
                                                <span class="promo__tag">Mới</span>
                                                <img class="promo__image" src="/storage/product_images/sss25ustra.jpg" alt="load,...">
                                            </div>
                                            <p class="promo__text">Galaxy S25 Ultral</p>
                                        </div>
                                        <div class="promo__item">
                                            <div class="promo">
                                                <span class="promo__tag">Mới</span>
                                              <img class="promo__image" src="/storage/product_images/sss25+.avif" alt="load,...">
                                            </div>
                                            <p class="promo__text">Galaxy S25 | S25+</p>
                                        </div>
                                
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/ssgalaxy fod6.avif" alt="load,...">
                                            </div>
                                            <p class="promo__text">Galaxy Z Fold6</p>
                                        </div>
                                
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/ssgalaxyz6.avif" alt="load,...">
                                            </div>
                                            <p class="promo__text">Galaxy Z Flip6</p>
                                        </div>
                                        <div class="promo__item">
                                            <div class="promo">
                                                <span class="promo__tag">Mới</span>
                                              <img class="promo__image" src="/storage/product_images/ssgalaxya565g.avif" alt="load,...">
                                            </div>
                                            <p class="promo__text">Galaxy A56 5G</p>
                                        </div>
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/galaxyTabF10.avif" alt="load,...">
                                            </div>
                                            <p class="promo__text">Galaxy Tab S10 series</p>
                                        </div>
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/galaxy_watch.avif" alt="load,...">
                                            </div>
                                            <p class="promo__text">Galaxy Watch Ultra</p>
                                        </div>
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/galaxy_buds3_pro.avif" alt="load,...">
                                            </div>
                                            <p class="promo__text">Galaxy Buds3 Pro</p>
                                        </div>
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/galaxy_watch7.avif" alt="load,...">
                                            </div>
                                            <p class="promo__text">Galaxy Watch7</p>
                                        </div>
                                        <div class="promo__item">
                                            <div class="promo">
                                              <img class="promo__image" src="/storage/product_images/asset_galaxy_ai.avif" alt="load,...">
                                            </div>
                                            <p class="promo__text">Galaxy AI</p>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </li>
                                <li class="dropdown">
                                    <a href="#">TV & AV</a>
                                    <div class="dropdown-menu">
                                      <div class="dropdown-left">
                                          <div class="dropdown-left-main">
                                              <div class="dropdown-column">
                                                  <h5>TVS</h5>
                                                  <a href="#">Tất cả TVs</a>
                                                  <a href="#">Neo QLED</a>
                                                  <a href="#">OLED</a>
                                                  <a href="#">Crystal UHD</a>
                                                  <a href="#">The Frame</a>
                                                  <a href="#">The Serif</a>
                                                  <a href="#">Phụ kiện TV</a>
                                              </div>
                                          </div>
                                          <div class="dropdown-left-side">
                                              <div class="dropdown-column">
                                                  <h5>TVs Theo Kích Thước<br> Màn hình</h5>
                                                  <a href="#">TV 98 inch</a>
                                                  <a href="#">TV 85 inch</a>
                                                  <a href="#">TV 75 inch</a>
                                                  <a href="#">TV 65 inch</a>
                                                  <a href="#">TV 55 inch</a>
                                                  <a href="#">TV 50 inch</a>
                                                  <a href="#">TV 43 inch</a>
                                                  <a href="#">TV 32 inch</a>
                                              </div>
                                              <div class="dropdown-column">
                                                <h5>TV Theo Độ Phân Giải</h5>
                                                <a href="#">TV 8K</a>
                                                <a href="#">TV 4K</a>
                                                <a href="#">Full HD/ HD TV</a>
                                            </div>
                                          </div>
                                          <div class="dropdown-left-side">
                                            <div class="dropdown-column">
                                                <h5> Loa Thanh & Loa Tháp</h5>
                                                <a href="#">Tất cả các thiết bị âm thanh</a>
                                                <a href="#">Loa Thanh Ultra Slim</a>
                                                <a href="#">Loa Thanh S-series</a>
                                                <a href="#">Loa Thanh B-series</a>
                                                <a href="#">Loa Tranh Music Frame</a>
                                                <a href="#">Loa Tháp Sound Tower</a>
                                                <a href="#">Phụ kiện loa</a>
                                            </div>
                                            <div class="dropdown-column">
                                              <h5>Máy Chiếu</h5>
                                              <a href="#">Tất cả Máy chiếu</a>
                                              <a href="#">The Premiere</a>
                                              <a href="#">The Freestyle</a>
                                              <a href="#">Phụ kiện Máy chiếu</a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="dropdown-right">
                                        <div class="dropdown-container">
                                            <div class="dropdown-container-right">
                                                <div class="dropdown-right-main">
                                                    <div class="dropdown-column">
                                                        <h5>Khám Phá</h5>
                                                        <a href="#">Tại sao lựa chọn Samsung TV</a>
                                                        <a href="#">Tại sao lựa chọn TV 8K</a>
                                                        <a href="#">Tại sao lựa chọn TV Neo QLED</a>
                                                        <a href="#">Tại sao lựa chọn TV Samsung OLED</a>
                                                        <a href="#">Tại sao lựa chọn TV The Frame</a>
                                                        <a href="#">Tại sao lựa chọn Samsung Smart TV</a>
                                                        <a href="#">TV Chơi Game Tốt Nhất</a>
                                                        <a href="#">Tại sao lựa chọn TV màn hình cực đại</a>
                                                        <a href="#">Samsung TV thể thao tốt nhất</a>
                                                        <a href="#">MICRO LED</a>
                                                    </div>
                                                </div>
                                                <div class="dropdown-right-side">
                                                    <div class="dropdown-column">
                                                        <h5> Hướng Dẫn Mua Hàng</h5>
                                                        <a href="#">Tìm TV Phù Hợp Cho Bạn</a>
                                                        <a href="#">Tìm Loa Thanh Phù Hợp Cho Bạn</a>
                                                        <a href="#">Hướng dẫn mua TV</a>
                                                        <a href="#">Hướng dẫn mua Loa Thanh</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="promo__grid">
                                                <div class="promo__item">
                                                    <div class="promo">
                                                        <img class="promo__image" src="/storage/product_images/kptvs.avif" alt="load,...">
                                                    </div>
                                                    <p class="promo__text">Khám phá TVs</p>
                                                </div> 
                                                <div class="promo__item">
                                                    <div class="promo">
                                                        <img class="promo__image" src="/storage/product_images/kptvpcs.avif" alt="load,...">
                                                    </div>
                                                    <p class="promo__text">Khám phá TVs phong cách<br>sống</p>
                                                </div>
                                                <div class="promo__item">
                                                    <div class="promo">
                                                        <img class="promo__image" src="/storage/product_images/kptbat.avif" alt="load,...">
                                                    </div>
                                                    <p class="promo__text">Khám phá thiết bị âm<br>thanh</p>
                                                </div>
                                                <div class="promo__item">
                                                    <div class="promo">
                                                        <img class="promo__image" src="/storage/product_images/kpmc.avif" alt="load,...">
                                                    </div>
                                                    <p class="promo__text">Khám phá máy chiếu</p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </li>
                            <li class="dropdown">
                                <a href="#">Gia Dụng</a>
                                <div class="dropdown-menu">
                                  <div class="dropdown-left">
                                      <div class="dropdown-left-main">
                                          <div class="dropdown-column">
                                              <h5>Tủ Lạnh</h5>
                                              <a href="#">Tất Cả Tủ Lạnh</a>
                                              <a href="#">Tủ Lạnh Multidoor</a>
                                              <a href="#">Tủ Lạnh Side by Side</a>
                                              <a href="#">Tủ Lạnh 2 Cửa Ngăn Đông Dưới</a>
                                              <a href="#">Tủ Lạnh 2 Cửa Ngăn Đông Trên</a>
                                              <a href="#">Phụ kiện tủ lạnh</a>
                                          </div>
                                          <div class="dropdown-column">
                                            <h5>Máy Giặt</h5>
                                            <a href="#">Tất Cả Giặt Sấy</a>
                                            <a href="#"> Máy Giặt Cửa Trước</a>
                                            <a href="#">Máy Giặt Kèm Sấy</a>
                                            <a href="#">Máy Giặt Cửa Trên</a>
                                            <a href="#">Máy Sấy</a>
                                            <a href="#">Tủ Chăm Sóc Quần Áo AI</a>
                                        </div>
                                      </div>
                                      <div class="dropdown-left-side">
                                          <div class="dropdown-column">
                                              <h5>Máy Hút Bụi</h5>
                                              <a href="#">Tất Cả Máy Hút Bụi</a>
                                              <a href="#">Máy Hút Bụi Không Dây Jet</a>
                                              <a href="#">Robot Hút Bụi Jet Bot</a>
                                              <a href="#">Tất Cả Phụ Kiện Máy Hút Bụi</a>
                                          </div>
                                          <div class="dropdown-column">
                                            <h5>Điều Hòa Không Khí</h5>
                                            <a href="#">Điều hòa dân dụng</a>
                                            <a href="#">Điều hòa âm trần</a>
                                            <a href="#">Điều hòa Free Joint Multi</a>
                                            <a href="#">Điều hòa trung tâm DVM</a>
                                            <a href="#">Hệ thống sưởi Eco</a>
                                            <a href="#">Chiller</a>
                                            <a href="#">Thông gió</a>
                                            <a href="#">Hệ thống điều khiển</a>
                                            <a href="#">Máy lọc không khí</a>
                                            <a href="#"> Phụ kiện điều hòa</a>
                                        </div>
                                      </div>
                                      <div class="dropdown-left-side">
                                        <div class="dropdown-column">
                                            <h5>THIẾT BỊ BẾP</h5>
                                            <a href="#">Tất Cả Thiết Bị Bếp</a>
                                            <a href="#">Lò Nướng</a>
                                            <a href="#">Bếp Từ</a>
                                            <a href="#">Lò Vi Sóng</a>
                                            <a href="#">Máy Hút Mùi</a>
                                            <a href="#">Khám Phá Thiết Bị Bếp</a>
                                        </div>
                                        <div class="dropdown-column">
                                            <h5>Máy Rửa Bát</h5>
                                            <a href="#">Tất Cả Máy Rửa Bát</a>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="dropdown-right">
                                    <div class="dropdown-container1">
                                        <div class="dropdown-container-right">
                                            <div class="dropdown-right-main">
                                                <div class="dropdown-column">
                                                    <h5>Được Đề Xuất</h5>
                                                    <a href="#">Tiết Kiệm Sống Xanh Với AI</a>
                                                    <a href="#">Khám phá Bespoke AI</a>
                                                    <a href="#">Smart Forward</a>
                                                    
                                                </div>
                                            </div>
                                            <div class="dropdown-right-side">
                                                <div class="dropdown-column">
                                                    <h5> Hướng Dẫn Mua Hàng</h5>
                                                    <a href="#">Hướng Dẫn Mua Hàng Tủ Lạnh</a>
                                                    <a href="#">Hướng Dẫn Mua Hàng Máy Hút <br> Bụi</a>
                                                    <a href="#">Hướng dẫn mua thiết bị</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="promo__grid1">
                                            <div class="promo__item">
                                                <div class="promo">
                                                    <img class="promo__image" src="/storage/product_images/tl.avif" alt="load,...">
                                                </div>
                                                <p class="promo__text">Khám phá tủ lạnh</p>
                                            </div> 
                                            <div class="promo__item">
                                                <div class="promo">
                                                    <img class="promo__image" src="/storage/product_images/mgsai.avif" alt="load,...">
                                                </div>
                                                <p class="promo__text">Khám phá giặt sấy AI</p>
                                            </div>
                                            <div class="promo__item">
                                                <div class="promo">
                                                    <img class="promo__image" src="/storage/product_images/kpmhb.avif" alt="load,...">
                                                </div>
                                                <p class="promo__text">Khám phá máy hút bụi</p>
                                            </div>
                                            <div class="promo__item">
                                                <div class="promo">
                                                    <img class="promo__image" src="/storage/product_images/kpmdh.avif" alt="load,...">
                                                </div>
                                                <p class="promo__text">Khám phá điều hòa không<br> khí</p>
                                            </div>
                                            <div class="promo__item">
                                                <div class="promo">
                                                    <img class="promo__image" src="/storage/product_images/kptbb.avif" alt="load,...">
                                                </div>
                                                <p class="promo__text">Khám phá thiết bị bếp</p>
                                            </div> 
                                            <div class="promo__item">
                                                <div class="promo">
                                                    <img class="promo__image" src="/storage/product_images/kptcctb.avif" alt="load,...">
                                                </div>
                                                <p class="promo__text">Khám phá tất cả các thiết<br> bị</p>
                                            </div> 
                                        </div>
                                        
                                    </div>
                                </div>

                              </div>
                        </li>
                            <li class="dropdown">
                                <a href="#">IT</a>
                                <div class="dropdown-menu">
                                  <div class="dropdown-left">
                                      <div class="dropdown-left-main">
                                          <div class="dropdown-column">
                                              <h5>Màn Hình Máy Tính</h5>
                                              <a href="#">Tất cả màn hình</a>
                                              <a href="#">Màn hình Odyssey</a>
                                              <a href="#">Màn hình ViewFinity</a>
                                              <a href="#">Màn hình Thông Minh</a>
                                              <a href="#">Ultrawide</a>
                                              <a href="#">Cong</a>
                                              <a href="#">4K UHD</a>
                                              <a href="#">Full HD</a>
                                          </div>
                                      </div>
                                      <div class="dropdown-left-side">
                                          <div class="dropdown-column">
                                              <h5>Màn Hình Dành Cho <br>Doanh Nghiệp</h5>           
                                              <a href="#" class="business">Smart Signage 
                                                <i class="fa-solid fa-arrow-up-long"></i>
                                              </a>
                                              <a href="#" class="business">Led Signage
                                                <i class="fa-solid fa-arrow-up-long"></i>
                                              </a><a href="#" class="business">Commercial TV
                                                <i class="fa-solid fa-arrow-up-long"></i>
                                              </a><a href="#" class="business">Cho doanh nghiệp
                                                <i class="fa-solid fa-arrow-up-long"></i>
                                              </a>
                                          </div>
                                      </div>
                                     <div class="dropdown-left-side">
                                        <div class="dropdown-column">
                                            <h5>Ổ Cứng VÀ ThẺ NhỚ</h5>           
                                            <a href="#" class="business">Tất cả bộ nhớ và lưu trữ </a>
                                            <a href="#" class="business">NVME SSD </a>
                                            <a href="#" class="business">SATA  </a>  
                                            <a href="#" class="business">SSD</a>
                                            <a href="#" class="business">Ổ cứng di động SSD </a>
                                            <a href="#" class="business">Thẻ nhớ </a>  
                                            <a href="#" class="business">USB Flash Drive</a>     
                                        </div>
                                    </div>
                                  </div>
                                  <div class="dropdown-right">
                                    <div class="dropdown-container">
                                        <div class="dropdown-container-right">
                                            <div class="dropdown-right-main">
                                                <div class="dropdown-column">
                                                    <h5>Phát Hiện</h5>
                                                    <a href="#">Màn hình chơi game Odyssey</a>
                                                    <a href="#">Tại sao độ phân giải ViewFinity</a>
                                                </div>
                                            </div>
                                            <div class="dropdown-right-side">
                                                <div class="dropdown-column">
                                                    <h5>Hướng Dẫn Mua Hàng</h5>
                                                    <a href="#" class="business">Giúp chọn Màn hình của tôi</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="promo__list">
                                            <div class="promo__item">
                                                <div class="promo">
                                                    <img class="promo__image" src="/storage/product_images/it.avif" alt="load,...">
                                                </div>
                                                <p class="promo__text">Discover Computer Monitors</p>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </li>
                            <li>
                                <a href="#">Phụ kiện</a>
                            
                            </li>
                            <li>
                                <a href="#">SmartThings</a>
                            
                            </li>
                            <li class="dropdown">
                                <a href="#">AI</a>
                                <div class="dropdown-menu">
                                  <div class="dropdown-left">
                                      <div class="dropdown-left-main">
                                          <div class="dropdown-column">
                                              <h5>AI</h5>
                                              <a href="#">Galaxy AI</a>
                                              <a href="#">Samsung AI TV</a>
                                              <a href="#">Bespoke AI</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="dropdown-right">
                                    <h5 class="dropdown-right__title">Khám Phá</h5>
                                    <div class="promo__list">
                                        <div class="promo__item">
                                            <div class="promo">
                                                <img class="promo__image" src="/storage/product_images/ai.avif" alt="load,...">
                                            </div>
                                            <p class="promo__text">Khám Phá AI</p>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-right">
                        <div class="search-box">
                            <button class="btn-search">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#666666"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                            </button>
                            <input type="text" placeholder="Tìm kiếm">
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#666666"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg>
                        
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#666666"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
                        <div role="button" id="toggle-menu">
                            <div class="wrap">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                  
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content') 
    </main>
{{-- 
    <footer>
        <p>© 2024 Samsung Clone. All rights reserved.</p>
    </footer> --}}

</body>
</html>


  
  