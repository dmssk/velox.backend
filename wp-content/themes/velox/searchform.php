<div class="search-field">
    <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
        <input class="search-field__input" placeholder="Пошук..." type="text" value="<?php echo get_search_query() ?>" name="s" id="s" />
        <input type="submit" class="search-field__submit icon icon-search">
    </form>
</div>
