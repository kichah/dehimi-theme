<!DOCTYPE html>
<html dir="rtl" lang="ar">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head();?>
    <title>Dehimi Organic Store</title>
  </head>
  <body>
    <header class="header">
      <div class=" flex">
      <a href="#" class="logo">
        <img class="logo" src="<?php echo get_theme_file_uri('public/img/Color = Dark.png') ?>"></img>
      </a>
      <button aria-expanded="false" class="icons" aria-controls="primary-navigation">
        <span class="sr-only">Menu</span>
        <i class="fa-solid fa-bars"></i>        
        <i class="fa-solid fa-x hidden"></i>      
      </button>
      <nav aria-hidden="false" class="navbar hide" id="primary-navigation" >
        <ul class="nav-links">
          <li>
            <a href="">الصفحة الرئيسة</a>
          </li>
          <li>
            <a href="#">المتجر</a>
          </li>
          <li>
            <a href="#">من نحن</a>
          </li>
          <li>
            <a href="#">إتصل بنا</a>
          </li>
        </ul>
      </nav>
      <div class="nav-actions">
        <a href="#" class="search">
          <i class="fa-solid fa-magnifying-glass"></i>        </a>  
        </a>  
        <a href="#" class="shopping">
          <i class="fa-solid fa-cart-shopping"></i>        </a>
      </div>
    </header>