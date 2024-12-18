<section class="no-results">
    <header class="page-header">
        <h1 class="page-title">Nothing Found</h1>
    </header>

    <div class="page-content">
        <?php if (is_search()) : ?>
            <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p>It seems we can't find what you're looking for.</p>
        <?php endif; ?>
    </div>
</section>
