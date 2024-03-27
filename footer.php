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


<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/asset/js/slide.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/asset/js/hamberger.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/asset/js/tab.js"></script>
<?php wp_footer(); ?>