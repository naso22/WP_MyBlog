<footer class="footer">
  <div class="md-flex md-justify-between">
    <h1 class="footer-logo">
      <a href="<?php echo home_url(); ?>">Front Blog</a>
    </h1>
    <div class="grid">
      <div class="footer-content">
        <p class="footer__navi-heading">FOLLOW US</p>
        <ul class="footer__navi">
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Instagram</a></li>
        </ul>
      </div>
      <div class="footer-content">
        <p class="footer__navi-heading">ABOUT</p>
        <ul class="footer__navi">
          <li><a href="<?php echo esc_url(home_url('/')); ?>contact">お問い合わせ</a></li>
        </ul>
      </div>
    </div>
  </div>
  <hr />
  <p class="copyright">© 2023 <a href=""></a>
  </p>
</footer>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@1.0.15/destyle.css" />
<link href="https://fonts.cdnfonts.com/css/helvetica-neue-55" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Noto+Sans+JP&display=swap">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/asset/js/hamberger.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/asset/js/tab.js"></script>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
<script src="<?php echo get_template_directory_uri(); ?>/asset/js/slide.js"></script>
<?php wp_footer(); ?>