<div class="product-gallery product-gallery-sticky product-gallery-vertical">
                                <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                    'navigation': {
                                        'nextEl': '.swiper-button-next',
                                        'prevEl': '.swiper-button-prev'
                                    }
                                }">
                                    <div class="swiper-wrapper row cols-1 gutter-no">
                                        <div class="swiper-slide">
                                            <figure class="product-image">
                                                <img src=" <?php echo !empty($row2['img1']) ? $row2['img1'] : 'Not available';?>" data-zoom-image=" <?php echo !empty($row2['img1']) ? $row2['img1'] : 'Not available';?>" alt="" width="800" height="900">
                                            </figure>
                                        </div>
                                        <div class="swiper-slide">
                                                                                            <figure class="product-image">
                                                    <img src=" <?php echo !empty($row2['img2']) ? $row2['img2'] : 'Not available';?>"data-zoom-image="<?php echo !empty($row2['img2']) ? $row2['img2'] : 'Not available';?>" alt="" width="800" height="900">
                                                </figure>
                                                                                    </div>
                                        <div class="swiper-slide">
                                                                                            <figure class="product-image">
                                                    <img src=" <?php echo !empty($row2['img3']) ? $row2['img3'] : 'Not available';?>" data-zoom-image="<?php echo !empty($row2['img3']) ? $row2['img3'] : 'Not available';?>"width="800" height="900">
                                                </figure>
                                                                                    </div>
                                        <div class="swiper-slide">
                                                                                            <figure class="product-image">
                                                    <img src=" <?php echo !empty($row2['img4']) ? $row2['img4'] : 'Not available';?>" data-zoom-image=" <?php echo !empty($row2['img4']) ? $row2['img4'] : 'Not available';?>" alt="Bright Green IPhone" width="800" height="900">
                                                </figure>
                                                                                    </div>
                                    </div>
                                    <!--<button class="swiper-button-next"></button>-->
                                    <!--<button class="swiper-button-prev"></button>-->
                                    <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
                                </div>
                                <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                    'navigation': {
                                        'nextEl': '.swiper-button-next',
                                        'prevEl': '.swiper-button-prev'
                                    },
                                    'breakpoints': {
                                        '992': {
                                            'direction': 'vertical',
                                            'slidesPerView': 'auto'
                                        }
                                    }
                                }">
                                    <div class="product-thumbs swiper-wrapper row cols-lg-1 cols-4 gutter-sm">
                                        <div class="product-thumb  swiper-slide">
                                            <img src="<?php echo !empty($row2['img1']) ? $row2['img1'] : 'Not available';?>" alt="Product Thumb" width="800" height="900">
                                         </div>
                                        <div class="product-thumb swiper-slide">
                                                                                            <img src="<?php echo !empty($row2['img2']) ? $row2['img2'] : 'Not available';?>" alt="Product Thumb" width="800" height="900">
                                                                                    </div>
                                        <div class="product-thumb swiper-slide">
                                                                                            <img src="<?php echo !empty($row2['img3']) ? $row2['img3'] : 'Not available';?>" alt="Product Thumb" width="800" height="900">
                                                                                    </div>
                                        <div class="product-thumb swiper-slide">
                                                                                            <img src="<?php echo !empty($row2['img4']) ? $row2['img4'] : 'Not available';?>" alt="Product Thumb" width="800" height="900">
                                                                                    </div>
                                    </div>
                                    <!--<button class="swiper-button-prev"></button>-->
                                    <!--<button class="swiper-button-next"></button>-->
                                </div>
                            </div>