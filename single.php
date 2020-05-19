<?php get_header(); ?>
</header> <!-- end main header from homepage -->
  <?php
      while(have_posts()): the_post();

          get_template_part('template-parts/content', 'post');
  ?>
          <div class="comments container">
              <?php
                if(comments_open() || get_comments_number()):
                    comments_template();
                else:
                  echo "<p class='text-center comments-closed alert-danger'> Comments are closed</p>";
                endif;
              ?>
           </div>
<?php
      endwhile;
?>

<?php get_footer(); ?>
