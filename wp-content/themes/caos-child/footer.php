 <div class="clearfix"></div>
<?php if ( !is_single() ) { ?>
</div><!-- /#container -->
<?php } ?>

<div class="sub-footer">
    <div class="container">
        <div class="row">

            <div class="col-md-5">
                <p>
                    TEST
                    <?php
                    //esc_html_e( 'Powered by ', 'caos' ); ?>
                </p>
            </div>
            <div class="col-md-7">
                <?php get_template_part( '/template-parts/social-menu', 'footer' ); ?>
            </div>

        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .sub-footer -->


<?php wp_footer(); ?>

</body>
</html>