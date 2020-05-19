<aside class="bg-main p-4 mt-3">
  <?php
      if(!is_active_sidebar( 'sidebar_widget' )){
        return;
      }

      dynamic_sidebar( 'sidebar_widget' );
   ?>
</aside>
