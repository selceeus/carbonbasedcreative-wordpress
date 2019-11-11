<section>
    <h1>Blog</h1>
    <div class="row">
        <div class="col-md-9">
            <?php get_template_part('templates/content-single', get_post_type()); ?>
        </div>
        <aside class="col-md-3">
            <?php dynamic_sidebar('sidebar-blog'); ?>
        </aside>
    </div>
</section>
