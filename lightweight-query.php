<?php 

/* 
 * Output IDs
 */

$args = array(
    'no_found_rows' => true,
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',

    /*
     * The three settings below are usually most performant 
     */
    'update_post_meta_cache' => false,  // set to false if custom fields and meta data is not required in output
    'update_post_term_cache' => false,  // set to false if not displaying/using categories, tags, taxonomies
    'cache_results' => true,  // set to true for most queries, avoids duplicate db queries 
    // set to false for one-time queries or real-time data that shouldn't be cached.

    'tax_query' => array(

        array(
            'taxonomy' => 'category-series',
            'terms' => $this_part_cat_series_ids,
            'field' => 'term_id',
            'include_children' => false, // ref: https://docs.wpvip.com/databases/optimize-queries/term-queries-should-consider-include_children-false/
        )

    ),

    'fields' => 'ids' // Return only post IDs for efficiency

);


/* Thus the query below yields an array of matching post IDs */ 
$tax_query = new WP_Query($args);
$tax_document_ids = $tax_query->posts;


/* ... but is still available for a full post query */ 
if ($tax_query->have_posts()) : while ($tax_query->have_posts()) : $tax_query->the_post();
/* access the_title(), access the_excerpt() &c. */ 
endwhile; endif; wp_reset_postdata();