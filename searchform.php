<form role="search" method="get" class="pull-left" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group">
        <input type="text" class="form-control" name="s" id="s" placeholder="<?php the_search_query(); ?>" />
        <div class="input-group-btn">
            <button type="submit" class="btn btn-default btn-xs" id="searchsubmit">Search</button>
        </div>
    </div>
</form>