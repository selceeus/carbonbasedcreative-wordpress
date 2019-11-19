<section>
    <h1>Shop</h1>
    <div class="row">
        <div class="col-md-9">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/content', 'shop'); ?>
        <?php endwhile; ?>
        </div>
        <aside class="col-md-3">
            <?php dynamic_sidebar('sidebar-store'); ?>
        </aside>
    </div>
</section>