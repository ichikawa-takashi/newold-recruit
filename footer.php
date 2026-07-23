<!-- フッター -->
<footer class="footer">
    <div class="footer__inner inner">
        <div class="footer__wrap">
            <div class="footer__left">
                <div class="footer__logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/footer-logo.svg" alt="NEWOLD CAPITAL">
                    </a>
                </div>
                <div class="footer__link">
                    <a href="https://newold.co.jp/">コーポレートサイトはこちら</a>
                </div>
            </div>
            <div class="footer__right">
                <nav class="footer__nav">
                    <ul class="footer__nav-items">
                        <li class="footer__nav-item">
                            <a href="<?php echo esc_url(home_url('/about/')); ?>">NEWOLD CAPITALについて</a>
                        </li>
                        <li class="footer__nav-item">
                            <a href="<?php echo esc_url(home_url('/business/')); ?>">事業について</a>
                        </li>
                        <li class="footer__nav-item">
                            <a href="<?php echo esc_url(home_url('/people/')); ?>">NEWOLD CAPITALの人</a>
                        </li>
                        <li class="footer__nav-item">
                            <a href="<?php echo esc_url(home_url('/environment/')); ?>">働く環境</a>
                        </li>
                        <li class="footer__nav-item">
                            <a href="<?php echo esc_url(home_url('/recruitment/')); ?>">採用情報</a>
                        </li>
                        <li class="footer__nav-item">
                            <a href="<?php echo esc_url(home_url('/new-graduate/')); ?>">新卒情報</a>
                        </li>
                    </ul>
                </nav>
                <div class="footer__sns">
                    <a class="footer__sns-link footer__sns-link--instagram" href="https://www.instagram.com/newoldcapital.official" target="_blank" rel="noopener">
                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/insta-black.svg" alt="Instagram">
                    </a>
                    <a class="footer__sns-link footer__sns-link--youtube" href="https://www.youtube.com/@newoldcapital" target="_blank" rel="noopener">
                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/youtube-black.svg" alt="Youtube">
                    </a>
                    <a class="footer__sns-link footer__sns-link--x" href="https://x.com/newold_official" target="_blank" rel="noopener">
                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/x-black.svg" alt="X">
                    </a>
                    <a class="footer__sns-link footer__sns-link--facebook" href="https://www.facebook.com/newoldcapital.official/" target="_blank" rel="noopener">
                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/facebook-fill.svg" alt="Facebook">
                    </a>
                    <a class="footer__sns-link" href="https://www.linkedin.com/company/newold-official" target="_blank" rel="noopener">
                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/linked-in-black.svg" alt="Linked in">
                    </a>
                </div>
                <small class="footer__copyright">&copy;All Rights Reserved.</small>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>