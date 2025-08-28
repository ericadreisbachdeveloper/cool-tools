<?php wp_reset_postdata(); ?>


<?php
// 1. Get total posts using an efficient mini-query
$count_args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'fields' => 'ids', // Only get post IDs for counting
    'posts_per_page' => -1, // Get all posts for counting
];
$count_query = new WP_Query($count_args);
$total_posts = $count_query->found_posts;

// ... and clear this mini-query
wp_reset_postdata();

// 2. Calculate total pages pulling $news_posts_per_page from shortcodes.php posts_shortcode()
global $news_posts_per_page;
$total_pages = ceil($total_posts / $news_posts_per_page);

// 3. Output pagination mostly using WordPress's built-in paginate_links()
if ($total_pages > 1) {

    $current_page = max(1, get_query_var('paged'));

    echo('<div class="pagination">');

    echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => '/page/%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text' => 'Previous',
        'next_text' => 'Next',
        'mid_size' => 2,
        'end_size' => 1,
    ));

    echo('</div>'); /* /.pagination */

}

