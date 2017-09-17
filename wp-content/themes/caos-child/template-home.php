<?php
/*
Template Name: HomePage
 */
?>
<?php get_header(); ?>

<div class="container-fluid " style="overflow:hidden;">

    <?php
    $id_page = array(59,49,51,53,55,68);
    query_posts(array("post__in" => $id_page, 'post_type' => 'page', 'order' => 'ASC'));
    echo "<div class='row ' >";
    $i = 0;
    while (have_posts()): the_post();

        echo "<div class='col-lg-3 col-md-4 col-sm-6 xol-xs-6 ' >";
        echo "<div class='image_home'>";
        $imageData = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
        echo "<a href=" . esc_url(get_page_link($id_page[$i])) . ">";
        echo "<img class='img-responsive' src=" . $imageData[0] . ">";
        echo "</a><div class='textimg'><a style='color:white ;text-decoration: none;' href=" . esc_url(get_page_link($id_page[$i])) . ">";
        the_title();
        echo "</a></div></div></div>";
        $i++;
    endwhile;
    ?>
</div>
</div>






<?php get_footer(); ?>
