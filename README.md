# cool-tools
Cool widgets and wodgets. 


## Custom Tiny MCE
*29 Aug 2025* 

Add custom buttons to the Tiny MCE editor when the defaults aren't enough. 

[tiny-mce](tiny-mce)


## Custom Pagination 
*28 Aug 2025*

Lightweight custom pagination for use with performant WordPress queries that use `'no_found_rows' => true`, which prevents WordPress from calculating the total number of posts for use in default pagination. 

[custom-pagination.php](custom-pagination.php)


## Lightweight Query 
*28 Aug 2025*

Use the power of WordPress query to output *just* a lightweight array of page IDs. Used this on [Robertshaw](https://www.robertshaw.com/), used this on [Bernie's Book Bank](https://www.berniesbookbank.org). 

[lightweight-query.php](lightweight-query.php)


## Disable `wp_comments.php` Endpoints 
*28 Aug 2025* 

Up until recently i thought that comments could be disabled by locking the `wp_comments` table, and i was totally baffled by how spam comments could appear on a site that didn't have any active comment forms. It's different now. Now i reluctantly agree that i shouldn't interfere with WordPress core tables, and i'm only a little baffled by how `cURL` can be used to spam an unsecured endpoint. 

This is a nice module to drop into `inc/` 

[disable-comments.php](disable-comments.php)

