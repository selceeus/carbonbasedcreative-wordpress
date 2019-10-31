<header class="banner">
<a class="brand" href="<?= esc_url(home_url('/')); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 298.52 66.63"><defs><style>.a{font-size:21.54px;font-family:EurostileExt-Med, Eurostile Extd;}.a,.m,.t{fill:#000d1d;}.b{letter-spacing:0.04em;}.c{letter-spacing:0.02em;}.d{letter-spacing:-0.02em;}.e,.h{letter-spacing:0.01em;}.f{letter-spacing:-0.03em;}.g{letter-spacing:0em;}.h,.i,.j,.k,.l,.m{font-family:EurostileExt-Reg, Eurostile Extd;}.i{letter-spacing:0.03em;}.j{letter-spacing:-0.01em;}.k{letter-spacing:0em;}.m{font-size:13.12px;letter-spacing:0.48em;}.n{letter-spacing:0.47em;}.o{letter-spacing:0.53em;}.p{letter-spacing:0.39em;}.q{letter-spacing:0.51em;}.r{letter-spacing:0.51em;}.s{letter-spacing:0.51em;}</style></defs><title>carbonbased-logo</title><text class="a" transform="translate(71.47 33.23)"><tspan class="b">C</tspan><tspan class="c" x="21.88" y="0">A</tspan><tspan class="d" x="43.01" y="0">R</tspan><tspan class="e" x="63.77" y="0">B</tspan><tspan class="f" x="85.07" y="0">O</tspan><tspan class="g" x="106.85" y="0">N</tspan><tspan class="h" x="129.72" y="0">B</tspan><tspan class="i" x="149.88" y="0">A</tspan><tspan class="j" x="168.94" y="0">S</tspan><tspan class="k" x="187.98" y="0">E</tspan><tspan class="l" x="205.73" y="0">D</tspan></text><text class="m" transform="translate(70.71 49.69)">C<tspan class="n" x="18.56" y="0">R</tspan><tspan class="o" x="37.14" y="0">E</tspan><tspan class="p" x="54.86" y="0">A</tspan><tspan class="q" x="71.29" y="0">T</tspan><tspan class="r" x="87.7" y="0">I</tspan><tspan class="s" x="97.91" y="0">V</tspan><tspan x="115.28" y="0">E</tspan></text><path class="t" d="M53.7,28.91a20.23,20.23,0,0,0-35.65-4,20.25,20.25,0,1,0,35.65,4m-5.57,16a16.2,16.2,0,0,1-2.82,3.15,1.88,1.88,0,0,1,1.44,1,1.92,1.92,0,0,1-3.43,1.71,1.88,1.88,0,0,1-.17-1.2,14.82,14.82,0,0,1-2.4,1.17A15.75,15.75,0,0,1,19.34,36.11,15.7,15.7,0,0,1,25.07,24a1.91,1.91,0,1,1,1.42-1,15.16,15.16,0,0,1,2.92-1.5,15.73,15.73,0,0,1,20.34,9h0a15.67,15.67,0,0,1-1.62,14.47Z"/><path class="t" d="M45.76,32a11.38,11.38,0,0,0-4.27-5.37,11.55,11.55,0,0,0-6.41-2,11.54,11.54,0,0,0-9.5,5.05,11.55,11.55,0,0,0-2,6.41,11.54,11.54,0,0,0,5.05,9.5,11.46,11.46,0,0,0,17.87-9.5A11.36,11.36,0,0,0,45.76,32M37.12,43.09a7.27,7.27,0,1,1,4.94-9A7.27,7.27,0,0,1,37.12,43.09Z"/><path class="t" d="M59.74,53.74A30.34,30.34,0,0,0,34.93,5.94c-.49,0-1,0-1.45,0a3.78,3.78,0,0,0,.67-2.15A3.82,3.82,0,1,0,27.9,6.76a30.41,30.41,0,0,0-17.71,12A5.29,5.29,0,1,0,5.29,26a5.12,5.12,0,0,0,1.12-.13A30.35,30.35,0,0,0,54.73,59.27a3.81,3.81,0,1,0,5-5.53Zm-4.59-3.83A24.56,24.56,0,0,1,34.83,60.73c-.7,0-1.4,0-2.1-.1a2,2,0,0,1,.36.62,2,2,0,1,1-3-1,24.79,24.79,0,0,1-8.93-3.7A24.53,24.53,0,0,1,10.31,36.21c0-.47,0-.93,0-1.4a2.52,2.52,0,1,1,.25-2.38A24.5,24.5,0,0,1,34.82,11.69c.78,0,1.55.05,2.32.12a2.58,2.58,0,0,1-.84-1.15,2.56,2.56,0,1,1,3.32,1.52,24.62,24.62,0,0,1,8.91,3.7,24.33,24.33,0,0,1,9.16,11.49h0a24.49,24.49,0,0,1,1.66,8.83c0,.5,0,1-.06,1.47a2.46,2.46,0,0,1,.65-.32,2.34,2.34,0,1,1-1.1,3.75A24.56,24.56,0,0,1,55.15,49.91Z"/></svg></a>
	<div class="site-menu">
		<span class="menu-label"></span>
		<div class="bar"></div>	
	</div>
</header>


<div class="nav-primary container opaque-hide">
	<div class="nav-layout col-md-12 col-lg-8 mx-auto opaque-hide animated">
		<div class="container">
		  <div class="row">
			<div class="col col-md-5 col-lg-5">
				<?php
					if ( has_nav_menu('primary_navigation') ) :
						wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
					endif;
				?>
			</div>
			<div class="col col-md-6 col-lg-4">
				<?php 
					if ( !empty( the_field( "menu_top_text_section", 'option' ) ) ):
						the_field( "menu_top_text_section", 'option' );
					endif;
				?>
				<?php 
					if ( !empty( the_field( "menu_bottom_text_section", 'option' ) ) ):
						the_field( "menu_bottom_text_section", 'option' );
					endif;
				?>
			</div>
		  </div>
		  <div class="row">
			<div class="col text-center pt-5">
				<?php 
					if ( !empty( the_field( "menu_contact_information", 'option' )) ):
						the_field( "menu_contact_information", 'option' );
					endif;
				?>
				<div class="text-center pt-3">
					<?php 
						if ( !empty( the_field( "menu_social_media_buttons", 'option' ) ) ):
							the_field( "menu_social_media_buttons", 'option' );
						endif;
					?>
				</div>
			</div>
		  </div>
		</div>
	</div>
</div>
