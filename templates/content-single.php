<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="entry-content">
      <?php
        if ( has_post_thumbnail() ) {

          the_post_thumbnail();
        } 
        echo '<h2>' . get_the_title() . '</h2>';
        get_template_part('templates/entry-meta');
        the_content(); 
      ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
  </article>
<?php endwhile; ?>
