
    <!-- Footer -->
    <footer class="py-4 bg-green">
      <div class="container">
        <?php
        wp_nav_menu( array(
          'theme_location' => "footer", "container"=>"ul","menu_id"=>"footernav","menu_class"=>"footerlinks text-center"
        ) ); ?>
      </div>
      <!-- /.container -->
    </footer>
    <?php wp_footer(); ?>
  </body>

</html>
