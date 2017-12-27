      </div>
    </div>

    <div id="footer-push"></div>
  </div>

  <div id="footer">
    <div class="container-fluid">

      <?php if ( is_active_sidebar('widgetarea2') ) : ?>
        <?php dynamic_sidebar( 'widgetarea2' ); ?>
      <?php endif; ?>

    </div>
  </div>

  <?php wp_footer(); ?>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>
