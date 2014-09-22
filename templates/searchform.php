<form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url(home_url('/')); ?>">
  <div class="input-group">
    <input type="search" value="<?php echo get_search_query(); ?>" name="s" class="search-field form-control" placeholder="<?php _e('Cerca', 'roots'); ?>">
      <button type="submit"><span class="fi fi-search"></span></button>
  </div>
</form>
