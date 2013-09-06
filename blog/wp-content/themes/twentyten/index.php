<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */



get_header(); ?>

<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

		<div id="container">
                    <div align="center" style="margin: 20px;">
                        <script type="text/javascript"><!--
                        google_ad_client = "ca-pub-3505603995038341";
                        /* Anúncio 3 */
                        google_ad_slot = "2818231514";
                        google_ad_width = 320;
                        google_ad_height = 50;
                        //-->
                        </script>
                        <script type="text/javascript"
                        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                        </script>
                    </div>

                    <div id="content" role="main">

                        <?php
                        /* Run the loop to output the posts.
                         * If you want to overload this in a child theme then include a file
                         * called loop-index.php and that will be used instead.
                         */
                         get_template_part( 'loop', 'index' );
                        ?>
                
                    </div><!-- #content -->
                    <div align="center" style="margin: 20px;">
                            <script type="text/javascript"><!--
                            google_ad_client = "ca-pub-3505603995038341";
                            /* Anúncio 1 */
                            google_ad_slot = "5911298712";
                            google_ad_width = 728;
                            google_ad_height = 90;
                            //-->
                            </script>
                            <script type="text/javascript"
                            src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                            </script>
                    </div>
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
