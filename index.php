<?php get_header(); ?>
<?php the_post(); ?>

<?php if(!is_front_page()) : ?>
<div class="crumbs">
    <?php hope_breadcrumbs(); ?>
</div>
<?php endif; ?>

<?php if(has_post_thumbnail()) : ?>
<div class="featured-image-wrapper">
    <div class="featured-image">
        <img src="<?=wp_get_attachment_image_src(get_post_thumbnail_id(), "large")[0]; ?>" />
    </div>
</div>
<?php endif; ?>

<main class="main <?=is_front_page() ? "front-page" : ""?>">
    <div class="main-inner">
    <?php if(is_front_page()) : ?>
        <aside class="widgets">
            <?php dynamic_sidebar("hope-2018-front-page"); ?>
        </aside>
    <?php endif; ?>
        <section class="content">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>
