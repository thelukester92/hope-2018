        <footer class="main-footer">
            <div class="main-footer-inner">
                <div class="widgets">
                    <?php dynamic_sidebar("hope-2018-footer"); ?>
                </div>
            </div>
        </footer>
        <div class="sitemap-and-copyright <?=has_nav_menu("hope-2018-site-map") ? "with-sidemap" : ""?>">
            <div class="sitemap-and-copyright-inner">
                <?php wp_nav_menu(array(
                    "container"      => "nav",
                    "theme_location" => "hope-2018-site-map",
                    "fallback_cb"    => false
                )); ?>
                <div class="copyright <?=has_nav_menu("hope-2018-site-map") ? "with-sidemap" : ""?>">
                    Copyright &copy; <?=date("Y")?> <?php bloginfo("name"); ?>
                </div>
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
