<?php
/*
Template Name: Home
 */
?>
<?php get_header();

?>

<div class="container">

    <?php
    $id_page = array(59,49,51,53,55,68);
    query_posts(array("post__in" => $id_page, 'post_type' => 'page', 'order' => 'ASC'));?>
    <div class="row">
        <?php
        $id_page = array(59,49,51,53,55,68);
        query_posts(array("post__in" => $id_page, 'post_type' => 'page', 'order' => 'ASC'));
        echo "<div class='row'>";
        $i = 1;
        while (have_posts()): the_post();
            echo "<div class='col-lg-3 col-md-4 col-sm-6 xol-xs-6 ' >";
            echo "<div class='image_home'>";
            $imageData = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            echo "<a href=" . esc_url(get_page_link($id_page[$i])) . ">";
            echo "<img class='img-responsive' src=" . $imageData[0] . ">";
            echo "</a><div class='text-center' ><a class='textimg' href=" . esc_url(get_page_link($id_page[$i])) . ">";
            the_title();
            echo "</a></div></div></div>";
            $i++;
        endwhile;
        ?>
    </div>
</div></div>

<div class="bloc-service ">
            <?php $the_query = new WP_Query( 'page_id=92' ); ?>
            <?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
            <h2 class="titre-service">
                <?php the_field('titre_service'); ?>
            </h2>
            <?php endwhile;?>
    <div class="content-service">
        <p class="texte_service"><?php the_field('texte_service');?></p>
    </div>
</div>

<div class="bloc-realisations">
    <?php $image = get_field('image_service');
    if( !empty($image) ): ?>
    <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
    <?php endif; ?>
</div>1


<?php get_footer(); ?>
