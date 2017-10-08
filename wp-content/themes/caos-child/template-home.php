<?php
/*
Template Name: Home
 */
?>
<?php get_header();

?>

<div class="container-fluid">

    <?php
    $id_page = array(59,49,51,53,55,68);
    query_posts(array("post__in" => $id_page, 'post_type' => 'page', 'order' => 'ASC'));?>
    <div class="row">
    <?php
    $i = 1;
    while (have_posts()): the_post();
?>
        <div class="col-lg-3 col-md-4 col-sm-6 xol-xs-6" >
            <div class="image_home img-fluid">
            <?php
            $imageData = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            echo "<a href=" . esc_url(get_page_link($id_page[$i])) . ">";
            echo "<img class='img-responsive' src=" . $imageData[0] . "></a>";?>
            <div class='text-center'>
            <?php
                echo "<a class='textimg' href=" . esc_url(get_page_link($id_page[$i])) . ">";the_title();?></a>
            </div>
            </div>
        </div>
<?php
        $i++;
    endwhile;
    ?>
    </div>
</div>

<div class="bloc-services col-lg-12 col-md-12">
            <?php $the_query = new WP_Query( 'page_id=92' ); ?>
            <?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
            <h2 class="titre-service">
                <?php the_field('titre_service'); ?>
            </h2>
            <?php endwhile;?>
    <div class="content-services">
        <p><?php the_field('texte_service');?></p>
    </div>
</div>

<div class="bloc-realisations">

</div>


<?php get_footer(); ?>
