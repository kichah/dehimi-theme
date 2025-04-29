<?php get_header();?>

<main class="main-page">
      <section class="hero">
        <img 
          src="<?php echo get_theme_file_uri('public/img/download.jpg') ?>" 
          alt="Students learning online" 
          class="hero-image"
          loading="lazy"
        />
        <div class="wrapper">
          <div class="hero-content ">
            <div class="hero-text">
              <h1 class="heading-1">اختبر أفضل ما في الطبيعة.</h1>
              <p class="hero-body">أطلق العنان لإمكانيات الشفاء التي تتمتع بها أعشابنا وزيوتنا الطبية المتميزة. جرب حلول العافية الطبيعية التي تعزز صحتك وحيويتك.</p>
            </div>
            <a href="#" class="btn btn-cta" aria-label="اكتشف المنتجات">
                اكتشف المنتجاتنا الآن
            </a>
          </div>
        </div>
      </section>
      <section class="section cat">
        <div class="wrapper">
          <h2 class="heading-2">
            تصفح الفئات
          </h2>
          <div class="grid-auto-fill">
            <div class="category">
              <a href="">
                <img src="https://matjrah.online/images/1325/image/cache/catalog/1701712751-1626512904-Powder-180x150h-400x300w.png" alt="Herbs" class="category-image" />
              </a>
              <h3 class="heading-3">الأعشاب</h3>
            </div>
            <div class="category">
              <a href="">
                <img src="https://matjrah.online/images/1325/image/cache/catalog/1701712751-1626512904-Powder-180x150h-400x300w.png" alt="Herbs" class="category-image" />
              </a>
              <h3 class="heading-3">الزيوت</h3>
            </div>
            <div class="category">
              <a href="">
                <img src="https://matjrah.online/images/1325/image/cache/catalog/1701712751-1626512904-Powder-180x150h-400x300w.png" alt="Herbs" class="category-image" />
              </a>
              <h3 class="heading-3">الشاي</h3>
            </div>
            <div class="category">
              <a href="">
                <img src="https://matjrah.online/images/1325/image/cache/catalog/1701712751-1626512904-Powder-180x150h-400x300w.png" alt="Herbs" class="category-image" />
              </a>
              <h3 class="heading-3">تمور</h3>
            </div>
            <div class="category">
              <a href="">
                <img src="https://matjrah.online/images/1325/image/cache/catalog/1701712751-1626512904-Powder-180x150h-400x300w.png" alt="Herbs" class="category-image" />
              </a>
              <h3 class="heading-3">ادوات تجميلية</h3>
            </div>
            <div class="category">
              <a href="">
                <img src="https://matjrah.online/images/1325/image/cache/catalog/1701712751-1626512904-Powder-180x150h-400x300w.png" alt="Herbs" class="category-image" />
              </a>
              <h3 class="heading-3">بهارات</h3>
            </div>

        </div>
      </div>
      </section>
      <section class="section best-products">
        <div class="wrapper">
          <h2 class="heading-2">
            افضل منتجاتنا
          </h2>
          <div class="swiper product-slider">
            <div class="swiper-wrapper">
            <?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 10, // Adjust the number of products you want to retrieve
);
$loop = new WP_Query($args);

if ($loop->have_posts()) {
    while ($loop->have_posts()) {
        $loop->the_post();
        // Get the product object
        $product = wc_get_product(get_the_ID());
        if ($product->is_on_sale()) {
            $product_price = '<p class="product__price"><span class="price price--sale">' . $product->get_regular_price() . ' د.ج</span><span class="price">' . $product->get_sale_price() . ' د.ج</span></p>';
        } else {
            $product_price = '<p class="product__price"><span class="price">' . $product->get_price() . ' د.ج</span></p>';
        }
        ;
        echo '<div class="card swiper-slide">
        <img src="'. get_theme_file_uri("public/img/Placeholder Image.png") . '" alt="Product name" class="card-image">
                <div class="card-content">
                  <h3 class="heading-4">'.$product->get_name().'</h3>
                  <div class="price-container">
                    <!-- Discounted Price (conditionally shown) -->
                      <!-- Regular Price -->
                      <span class="price-regular">
                        1100 د.ج
                        '. get_the_post_thumbnail_url($product->get_id(), 'large') .'
                      </span>
                      <span class="price-discounted">
                        700 د.ج
                      </span>
                  </div>
                </div>
                <a href="' . $product->get_permalink() . '" class="btn btn-buy">أضف إلى السلة</a>
             </div>';
    }
}
wp_reset_query();
?>
              
            </div>
            <div class="swiper-button-prev" aria-label="Previous slide"></div>
            <div class="swiper-button-next" aria-label="Next slide"></div>
          </div>
        </div>
      </section>
    <?php get_footer() ?>