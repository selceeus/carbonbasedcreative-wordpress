<section>
    <?php get_template_part('templates/page', 'header'); ?>
    <div class="row">
        <div class="col-md-9">
          <?php if (!have_posts()) : ?>
            <div class="alert alert-warning">
              <?php _e('Sorry, no results were found.', 'sage'); ?>
            </div>
            <?php get_search_form(); ?>
          <?php endif; ?>
          <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
        </div>
        <aside class="col-md-3">
            <?php dynamic_sidebar('sidebar-blog'); ?>
        </aside>
    </div>
</section>
