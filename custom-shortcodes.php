<?php
   $sqlbro = $wpdb->get_results("SELECT postid, title, body FROM `RHr_wpforo_posts`"); 
      // Echo the title of the first scheduled post

    $sqlbro_title = $sqlbro[0]->title;
    $sqlbro_body = $sqlbro[0]->body;


    function forumpost_function(){
        echo $sqlbro[0]->title;
        echo $sqlbro[0]->body;
    };

    add_shortcode('forumpost', 'forumpost_function');
?>
   
   