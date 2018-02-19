<?php

class Hope2018
{
    function __construct()
    {
        add_action("init", array(&$this, "init"));
    }

    function init()
    {
        add_theme_support("custom-logo", array("height" => 90, "flex-width" => true));
        add_theme_support("post-thumbnails");
        add_theme_support("title-tag");

        register_nav_menus(array(
            "hope-2018-main-menu"    => __("Main Menu"),
            "hope-2018-utility-menu" => __("Top Links"),
            "hope-2018-site-map"     => __("Site Map")
        ));

        register_sidebar(array(
            "id"            => "hope-2018-footer",
            "name"          => "Footer",
            "before_widget" => "<div class='widget'>",
            "after_widget"  => "</div>",
            "before_title"  => "<h3>",
            "after_title"   => "</h3>"
        ));

        register_sidebar(array(
            "id"            => "hope-2018-front-page",
            "name"          => "Front Page",
            "before_widget" => "<div class='widget'>",
            "after_widget"  => "</div>",
            "before_title"  => "<h3>",
            "after_title"   => "</h3>"
        ));

        wp_enqueue_style("dashicons");

        wp_enqueue_script("jquery");
        wp_enqueue_script("hope-2018-script", get_template_directory_uri() . "/script.js");
        wp_enqueue_script("hope-2018-reftagger", get_template_directory_uri() . "/reftagger.js");

        add_shortcode("hope_imglink", array(&$this, "shortcode_imglink"));
    }

    function shortcode_imglink($atts, $content = null)
    {
        $page = $atts["page"] ? get_page_by_path($atts["page"]) : null;
        $url = $atts["url"] ?: ($page ? get_permalink($page) : "#");
        $img = $atts["img"] ?: ($page ? (get_the_post_thumbnail_url($page, "large")) : null);

        if(!empty($img))
        {
            $res  = "<div class=\"hope-image-link\"><a href=\"$url\">";
            $res .= "<div></div>";
            $res .= "<img src=\"$img\" /><span>$content</span>";
            $res .= "</a></div>";
            return $res;
        }
        else
            return "<p><a href=\"$url\">$content</a></p>";
    }
}

function hope_breadcrumbs($opts = array())
{
    global $post;

    $opts["container"] = $opts["container"] ?: "nav";

    $pages = array_reverse(get_post_ancestors($post->ID));
    array_push($pages, $post->ID);
    if($post->post_type == "ai1ec_event")
        array_unshift($pages, get_page_by_path("calendar"));

    ?>

    <<?=$opts["container"]?>>
        <ul>
            <li><a href="<?=home_url()?>"><span class="dashicons dashicons-admin-home"></span></a></li>
        <?php foreach($pages as $page) : ?>
            <li><span>&raquo;</span></li>
            <li><a href="<?=get_permalink($page)?>"><?=get_the_title($page)?></a></li>
        <?php endforeach; ?>
        </ul>
    </<?=$opts["container"]?>>

    <?php
}

{
    $theme = new Hope2018();
}

?>
