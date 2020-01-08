<?php
function bis_enqueue_scripts() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'bis_enqueue_scripts' );

function bis_project_posttype_args( $args ) {
  $args['supports'][] = 'page-attributes';

  return $args;
}
add_filter( 'et_project_posttype_args', 'bis_project_posttype_args' );

function bis_et_theme_image_sizes( $sizes ) {
  $sizes['640x454'] = 'et-pb-portfolio-image-large';

  return $sizes;
}
add_filter( 'et_theme_image_sizes', 'bis_et_theme_image_sizes' );

function bis_override_image_width( $width ) {
  return $width == 400 ? 640 : $width;
}
add_filter( 'et_pb_portfolio_image_width', 'bis_override_image_width' );
add_filter( 'et_pb_gallery_image_width', 'bis_override_image_width' );

function bis_override_image_height( $height ) {
  return $height == 284 ? 454 : $height;
}
add_filter( 'et_pb_portfolio_image_height', 'bis_override_image_height' );
add_filter( 'et_pb_gallery_image_height', 'bis_override_image_height' );

function bis_override_module_portfolio() {
  if ( class_exists( "ET_Builder_Module_Portfolio" ) ) {
    class BIS_ET_Builder_Module_Portfolio extends ET_Builder_Module_Portfolio {
      function render( $attrs, $content = null, $render_slug ) {
        $output = parent::render( $attrs, $content, $render_slug );
        $output = preg_replace('/ width="400" height="284" /', ' width="640" height="454" ', $output);

        return $output;
      }
    }

    $module = new BIS_ET_Builder_Module_Portfolio;
    remove_shortcode( 'et_pb_portfolio' );
    add_shortcode( 'et_pb_portfolio', array( $module, '_shortcode_callback' ) );
  }
}
add_action( 'wp', 'bis_override_module_portfolio', 999 );

function bis_wp_head() {
?>

<style type="text/css">

h2 a{font-size:22px;}

#custom_html-2{width:100px;float:left;}
#nav_menu-2{width:250px;float:left;display:none;}
#nav_menu-2.active{display:inline;}

.nav_menu_bars div {
  width: 25px;
  height: 3px;
  background-color: black;
  margin: 4px 0;
}

.menu-item a{padding-right:7px;}

	.et_pb_widget ul li{display:inline;}
	.et_pb_widget ul li .sub-menu{display:none;position:absolute;top:40px;left:175px;z-index:99999;}
	.et_pb_widget ul li .sub-menu li{display:block;}
	
	.et_pb_gallery_title{display:none;}

  .column--sidebar .et_pb_sidebar_0 .widget_nav_menu .widgettitle {
    display: none;
  }
  
  .column--sidebar .mobile_menu_bar {
	display:block;
    float: left;
    margin: 1em 14px;
    padding-bottom: 0;
    z-index: 100;
  }
  
.sub-menu{background-color:#fff;}
.menu-item-has-children a:hover + .sub-menu{display:inline-block !important;}
.sub-menu:hover{display:block !important;}




/** Desktop **/
@media (min-width: 981px){

	.et_pb_gutters1 .et_pb_column_4_4 .et_pb_grid_item.first_in_row, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_grid_item.first_in_row{clear:both !important;}
	
	.et_pb_gutters1 .et_pb_column_4_4 .et_pb_grid_item, .et_pb_gutters1 .et_pb_column_4_4 .et_pb_shop_grid .woocommerce ul.products li.product, .et_pb_gutters1 .et_pb_column_4_4 .et_pb_widget, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_grid_item, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_shop_grid .woocommerce ul.products li.product, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_widget{
	width: 33.33% !important; /*six columns*/
		clear: none !important;
	}
	
		
	.col-width .et_pb_gallery_item, .col-width .et_pb_p_item {
	width: 16.66% !important; /*six columns*/
	clear: none !important;
	}



}
 
/** Tablet **/
@media screen and (max-width: 980px){
	
.et_overlay {
    z-index: 3 !important;
    opacity: 1 !important;
}	
	
/*	
	.sub-menu{display:block;}
*/	
	
	.et_pb_gutters1 .et_pb_column_4_4 .et_pb_grid_item, .et_pb_gutters1 .et_pb_column_4_4 .et_pb_shop_grid .woocommerce ul.products li.product, .et_pb_gutters1 .et_pb_column_4_4 .et_pb_widget, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_grid_item, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_shop_grid .woocommerce ul.products li.product, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_widget{
	width: 33.33% !important; /*six columns*/
	clear: none !important;
	}

.col-width .et_pb_gallery_item {
width: 33.33% !important; /*four columns*/
clear: none !important;
}
}
 
/** Small Tablet and Large Phone **/
@media screen and (max-width: 769px){
	
	.et_pb_gallery_image .et_overlay{border:solid 0px #fff !important;}

/*	
	.sub-menu{display:block;}
*/	
	
	.et_pb_gutters1 .et_pb_column_4_4 .et_pb_grid_item, .et_pb_gutters1 .et_pb_column_4_4 .et_pb_shop_grid .woocommerce ul.products li.product, .et_pb_gutters1 .et_pb_column_4_4 .et_pb_widget, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_grid_item, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_shop_grid .woocommerce ul.products li.product, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_widget{
	width: 33.33% !important; /*six columns*/
	clear: none !important;
	}

.col-width .et_pb_gallery_item {
width: 33.33% !important; /*three columns*/
clear: none !important;
}
}
 
/** Phone **/
@media screen and (max-width: 479px){

	.et_pb_widget ul li{display:block;text-align:center;}	
	.et_pb_widget ul li.menu-item-832{display:none;}
	
	
	
/*
	.et_pb_widget ul li .sub-menu{display:block;position:relative;top:0 !important;left:0;width:75%;margin-left:0;margin-right:0;margin:0 auto;}
	.et_pb_widget ul li .sub-menu li{background-color:#eee;}
*/
	
	.et_pb_gutters1 .et_pb_column_4_4 .et_pb_grid_item, .et_pb_gutters1 .et_pb_column_4_4 .et_pb_shop_grid .woocommerce ul.products li.product, .et_pb_gutters1 .et_pb_column_4_4 .et_pb_widget, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_grid_item, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_shop_grid .woocommerce ul.products li.product, .et_pb_gutters1.et_pb_row .et_pb_column_4_4 .et_pb_widget{
	width: 100% !important; /*six columns*/
	clear: none !important;
	}

.col-width .et_pb_gallery_item {
width: 50% !important; /*two columns*/
clear: none !important;
}
}





</style>


<script type="text/javascript">


jQuery(document).ready(function($){
        $( ".et_pb_gallery_image a" )
        	.mouseenter(function() {	
        		var title = $(this).attr("title");
        		$(this).attr("temp_title", title);
        		$(this).attr("title","");
        	})
        	.mouseleave(function() {
        		var title = $(this).attr("temp_title");
        		$(this).attr("title", title);
				$(this).removeAttr("temp_title");	
        	});
 });


  jQuery(function($) {

	$('#custom_html-2').on('click', function() {
		
//		$('#nav_menu-2').addClass('active');

		$('#nav_menu-2').fadeToggle();

	});

/*	
	$('.menu-item-832').on('click', function() {
		
		$('.sub-menu').fadeToggle();

	});
*/	


        $( ".et_pb_portfolio_item a" )
        	.mouseenter(function() {	
			
        		var title = $(this).attr("title");
        		$(this).attr("temp_title", title);
        		$(this).attr("title","");
        	})
        	.mouseleave(function() {
        		var title = $(this).attr("temp_title");
        		$(this).attr("title", title);
				$(this).removeAttr("temp_title");	
        	});


	
	
  });

  	
  
</script>

<?php
}
add_action( 'wp_head', 'bis_wp_head' );
