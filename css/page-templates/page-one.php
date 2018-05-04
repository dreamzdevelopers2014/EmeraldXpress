<?php
/* Template Name: One Page Template */
?>
<?php get_header(); ?>
					<main>
						<?php if(of_get_option('home_slider')) { ?>
						<div id="slider">
							<div class="">
								
							<!-- Slider main container -->
								<div class="swiper-container embed-responsive embed-responsive-21by9 remove-embed">
									<!-- Additional required wrapper -->
									<div class="swiper-wrapper embed-responsive-item remove-embed">
										<!-- Slides -->
										<?php $query = new WP_Query( array( 'post_type' => 'slide' ) );
										$slides = $query->posts;

										foreach($slides as $slide) { 
											
											?>
											<div class="swiper-slide" style='background-image: url("<?php theme_url(true); ?>img/slider/slide1.jpg");'>
												<div class="slider-content" >
													<div class="align-right-bottom sw-dark sw-content">
														<h2 class="sw-title animated fadeInDown"><?php echo $slide->post_title; ?></h2>
														<p class="animated fadeInDown"><?php echo $slide->post_excerpt; ?></p>
														<div class="animated fadeInUp mt-30"><a href="#contact" class="btn btn-md btn-primary">Contact us</a></div>
													</div>
												</div>
											</div>
										<?php } ?>
										
										
									</div>
									<!-- If we need pagination -->
									<div class="swiper-pagination"></div>
								 
									<!-- If we need navigation buttons -->
									<div class="swiper-button-prev"></div>
									<div class="swiper-button-next"></div>
								 
									<!-- If we need scrollbar -->
									<div class="swiper-scrollbar"></div>
								</div>
							
							</div>
							
							
						</div>
						
						<?php 
						}
						the_post();
						$pgtitle = get_the_title();
						$pgtext = get_the_content();
						if(!empty($pgtitle)&&!empty($pgtext)){
							$bgclass = get_field("background");
							
						?>
						<section id="<?php echo $post->post_name; ?>" class="bg-<?php echo $bgclass; ?>" >
							<div class="container">
							
								<h3 class="section-title alt-<?php echo $bgclass; ?> text-center"><span class="bg-light alt"><?php the_title(); ?></span></h3>
								<div><?php the_content(); ?></div>
								
								
							</div>
						</section>
						<?php
						}
						$args = array(
							'post_type'      => 'page',
							'posts_per_page' => -1,
							'post_parent'    => $post->ID,
							'order'          => 'ASC',
							'orderby'        => 'menu_order'
						 );


						$parent = new WP_Query( $args );

						if ( $parent->have_posts() ) : ?>

							<?php while ( $parent->have_posts() ) : $parent->the_post();
									global $post;
									$bgclass = get_field("background");
									?>

								<section id="<?php echo $post->post_name; ?>" class="child-page bg-<?php echo $bgclass; ?>">
									<div class="container">
									<h3 class="section-title alt-<?php echo $bgclass; ?> text-center"><span class="bg-light alt"><?php the_title(); ?></span></h3>

									<p><?php the_content(); ?></p>
									</div>
								</section>

							<?php endwhile; ?>

						<?php endif; wp_reset_postdata(); ?>
					</main>
<?php get_footer(); ?>

