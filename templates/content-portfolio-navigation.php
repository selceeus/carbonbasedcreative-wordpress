
<a href="#" class="btn btn-primary btn-sm navigation-tab animated fadeIn"><i class="fa fa-bars" aria-hidden="true"></i> Work Menu</a>
<div class="container-fluid portfolio-navigation-overlay opaque-hide">

	<div class="portfolio-navigation-lead">
		<h3>
		<?php 
			if ( !empty( the_field( "portfolio_menu_title", 'option' ) ) ):
				the_field( "portfolio_menu_title", 'option' );
			endif;
		?></h3>
		<h5>
			<?php 
				if ( !empty( the_field( "portfolio_menu_text", 'option' ) ) ):
					the_field( "portfolio_menu_text", 'option' );
				endif;
			?>
		</h5>
	</div>

	<div class="row portfolio-navigation"></div>
</div>