<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <title><?php 
    if(is_home() || is_front_page()){
        echo get_bloginfo('name'). ' - '.get_bloginfo('description');
    }else{
        wp_title();
    }
    
    ?></title>
    <?php wp_head(); ?>


  </head>

  <body>

    <!-- Navigation -->
    <div class="topbar">
        <?php if(of_get_option("topbar")){ ?>
              
          <div class="topbar-content">
            <div class="container">
                  <div class="row">
											<div class="col-md-6">
												<div class="text-md-right text-center">
													<?php echo of_get_option("top_menu_left"); ?>
													
												</div>
											</div>
											<div class="col-md-6">
												<div class="text-md-left text-center">
													<?php echo of_get_option("top_menu_right"); ?>
													
												</div>
											</div>
									</div>
            </div>
          </div>

									
							
					<?php } ?>
        
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom top">
     
        <a class="navbar-brand" href="#">Emerald Xpress, Inc.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <?php
			
          wp_nav_menu( array(
            'theme_location' => "primary", "container"=>"ul","menu_id"=>"mainnav","menu_class"=>"navbar-nav ml-auto"
          ) );
          
          ?>
          
        </div>
      
    </nav>

    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">
        


          <h1 class="masthead-heading mb-0">The Fleet</h1>
          <h1 class="masthead-heading mb-0">to Deliver Your</h2>
          <h1 class="masthead-heading mb-0">Critical Shipments</h3>
          
        </div>
      </div>
      <!--<div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>-->
    </header>
