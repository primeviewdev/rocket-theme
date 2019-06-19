<?php
	/**
	 * Register Theme Options
	 */
	function rocketThemeOptions(){
		  add_theme_page(
			  'Rocket Theme Options', 	//Page Title
			  'Rocket Theme Options',   //Menu Title
			  'manage_options', 			//Capability
			  'theme-options', 				//Page ID
			  'rocketThemeOptionsPage',		//Functions
			  null, 						//Favicon
			  99							//Position
		  );
	}
	/**
	 * Theme Options Page
	 */
	function rocketThemeOptionsPage() {
		echo '<div class="wrap">';
			echo '<h1>Primeview Rocket Theme Options</h1>';

			$tab_option = array ('Home','Social Media','Website Settings','Enable Theme Features','Frontend Settings', 'Page Settings', 'Copyright Section', 'Third Party Scripts');
			$x = 0;
			echo '<div class="tab">';
			foreach ($tab_option as $option_setting) {
				echo '<button class="tablinks" onclick="openCity(event, '.$x.')">'.$option_setting.'</button>';
				$x++;
			}
			echo '</div>';
			?>
			<!-- Home -->
			<div id="0" class="tabcontent active">
					<div class="zjl-home">
						<img src='<?= get_template_directory_uri() ?>/assets/images/banner.png'>
						<h2>Social Media Shortcode</h2>
						<p><b>Shortcode :</b> [social-media]</p>
						<p><b>Parameters : </b> mode = facebook , twitter , google_plus , linkedin , youtube , instagram , pinterest </p>
						<p><b>Example : </b> [social-media mode="facebook"]</p>
						<h2>Other Shortcodes</h2>
						<p><b>Get Developer Part : </b> [developer] </p>
						<p><b>Get Copyright Part : </b> [copyright] </p>
						<p><b>Get Year Part : </b>[year]</p>
					</div>
				</div>
			<form method="post" enctype="multipart/form-data" action="options.php">
			<?php
				settings_fields( 'option-group' );
				do_settings_sections( 'option-group' );
			?>
				<!-- Social Media settings -->
				<div id="1" class="tabcontent">
					<h3>I. Social Media settings</h3>
					<p><b>Shortcode :</b> [social-media]</p>
					<p><b>Parameters : </b> mode = facebook , twitter , google_plus , linkedin , youtube , instagram , pinterest </p>
					<p><b>Example : </b> [social-media mode="facebook"]</p>
					<table class="zjl-table">
						<tr>
							<td>Facebook: </td>
							<td><input placeholder="Facebook" type="text" name="facebook" value="<?= esc_attr( get_option('facebook') ) ?>" /> </td>
						</tr>
						<tr>
							<td>Twitter: </td>
							<td><input placeholder="Twitter" type="text" name="twitter" value="<?= esc_attr( get_option('twitter') )?>" /></td>
						</tr>
						<tr>
							<td>Google Plus: </td>
							<td><input placeholder="Google Plus" type="text" name="google_plus" value="<?= esc_attr( get_option('google_plus') )?>" /></td>
						</tr>
						<tr>
							<td>LinkedIn: </td>
							<td><input placeholder="LinkedIN" type="text" name="linkedin" value="<?= esc_attr( get_option('linkedin') )?>" /></td>
						</tr>
						<tr>
							<td>Youtube: </td>
							<td><input placeholder="Youtube" type="text" name="youtube" value="<?= esc_attr( get_option('youtube') )?>" /></td>
						</tr>
						<tr>
							<td>Instagram: </td>
							<td><input placeholder="Instagram" type="text" name="instagram" value="<?= esc_attr( get_option('instagram') )?>" /></td>
						</tr>
						<tr>
							<td>Pinterest: </td>
							<td><input placeholder="Pinterest" type="text" name="pinterest" value="<?= esc_attr( get_option('pinterest') )?>" /></td>
						</tr>
					</table>
				</div>
			
				<!-- Website settings -->
				<div id="2" class="tabcontent">
					<h3>II. Website Settings</h3>
					<table class="zjl-table">
						<tr>
							<td>Frontend Favicon: </td>
							<td><input placeholder="Frontend Favicon" type="text" name="favicon" value="<?= esc_attr( get_option('favicon') )?>" /></td>
						</tr>
						<tr>
							<td>Backend Favicon: </td>
							<td><input placeholder="Admin Backend Favicon" type="text" name="admin_favicon" value="<?= esc_attr( get_option('admin_favicon') )?>" /></td>
						</tr>
					</table>
				</div>
			
				<!-- Theme Features settings -->
				<div id="3" class="tabcontent">
					<h3>III. Enable Theme Features</h3>
					<table class="zjl-table">
						<tr>
							<td>FontAwesome v4.4.0 : </td>
							<td><input type="checkbox" name="font_awesome" value="true" <?php if(get_option('font_awesome') == "true") echo "checked"; ?> /> <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">Read Documentation</a></td>
						</tr>
						<tr>
							<td>Scroll Reveal : </td>
							<td><input type="checkbox" name="scroll_reveal" value="true" <?php if(get_option('scroll_reveal') == "true") echo "checked"; ?> /><a target="_blank" href="https://github.com/jlmakes/scrollreveal.js">Read Documentation</a> </td>
						</tr>
						<tr>
							<td>Owl Carousel v2.3.3: </td>
							<td><input type="checkbox" name="owl" value="true" <?php if(get_option('owl') == "true") echo "checked"; ?> /> <a target="_blank" href="https://owlcarousel2.github.io/OwlCarousel2/demos/basic.html">Read Documentation</a> </td>
						</tr>
						<tr>
							<td>JS Parallax Scrolling : </td>
							<td><input type="checkbox" name="parallax" value="true" <?php if(get_option('parallax') == "true") echo "checked"; ?> /> Example :  $("SELECTOR").parallax("50%", 0.1); </td>
						</tr>
					</table>
				</div>
			
				<!-- Page settings  -->
				<div id="4" class="tabcontent">
					<h3>IV. Frontend Settings</h3>
					<table class="zjl-table">
						<tr>
							<td>Header Background Color </td>
							<td><input type="color" name="header-bgcolor" value="<?= esc_attr( get_option('header-bgcolor') )?>" /></td>
						</tr>
						<tr>
							<td>Page Background Color </td>
							<td><input type="color" name="page-bgcolor" value="<?= esc_attr( get_option('page-bgcolor') )?>" /></td>
						</tr>
						<tr>
							<td>Footer Background Color </td>
							<td><input type="color" name="footer-bgcolor" value="<?= esc_attr( get_option('footer-bgcolor') )?>" /></td>
						</tr>
						<tr>
							<td>Default Banner Images </td>
							<td>
								<input type="file" id="input_banner" name="input_banner" accept=".jpg, .jpeg, .png" value="">
								<input class="f-right" type="button" id="btn_cancel" value="cancel">
							</td>
						</tr>
						<tr>
							<td colspan="2"><input class="w-100" type="text" id="banner_name" value="<?= esc_attr( get_option('input_banner') )?>" disabled></td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="container-output">
								<?php
									$preview = 'http://via.placeholder.com/1920x580';
									if(get_option('input_banner') != $preview){
										if (get_option('input_banner') == null){
											$preview = 'http://via.placeholder.com/1920x580';
										} else {
											$preview = get_option('input_banner');
										}
									}
								?>
									<img class="w-100" id="output_banner" src="<?= $preview ?>" alt="Banner Preview" />
								</div>
							</td>
						</tr>
					</table>
				</div>
			
				<!-- Copyright settings -->
				<div id="5" class="tabcontent">
					<h3>V. Page Settings</h3>
					<table class="zjl-table">
						<tr>
							<td class="w-25">Header Template</td>
							<td class="w-25"><input type="radio" name="header-template" value="left"<?= ((get_option('header-template') === 'left') ? "checked='checked'" : '') ?>>Default</td>
							<td class="w-25"><input type="radio" name="header-template" value="center"<?= ((get_option('header-template') === 'center') ? "checked='checked'" : '') ?>>Center Logo</td>
							<td class="w-25"><input type="radio" name="header-template" value="right"<?= ((get_option('header-template') === 'right') ? "checked='checked'" : '') ?>>Right Logo</td>
						</tr>
					</table>
				</div>
					
				<div id="6" class="tabcontent">
					<p><b>Get Developer Part : </b> [developer] </p>
					<p><b>Get Copyright Part : </b> [copyright] </p>
					<p><b>Get Year Part : </b>[year]</p>
					<table class="zjl-table">
						<tr>
							<td>Copyright : </td>
							<td><textarea rows="6" type="text" name="copyright" value="<?= esc_attr( get_option('copyright') )?>" ><?= esc_attr( get_option('copyright') )?></textarea></td>
						</tr>
						<tr>
							<td>Developer : </td>
							<td><textarea rows="6" type="text" name="developer" value="<?= esc_attr( get_option('developer') )?>" ><?= esc_attr( get_option('developer') )?></textarea></td>
						</tr>
					</table>
				</div>
			
				<div id="7" class="tabcontent">
					<h3>VII. Third Party Scripts</h3>
					<table class="zjl-table">
						<tr>
							<td>Third Party Scripts : </td>
							<td><textarea rows="10" type="text" name="rocket_scripts" value="<?= esc_attr( get_option('rocket_scripts') )?>" ><?= esc_attr( get_option('rocket_scripts') )?></textarea></td>
						</tr>
					</table>
				</div>
				<div class="copyright"><p>© copyright 2019<a href="https://primeview.com" target="_blank">  Primeview</a></p></div>
				<?= submit_button(); ?>
			</form>

		</div>

		<script type="text/javascript">
			document.getElementById(0).style.display = "block";
			function openCity(evt, tabname) {
			  document.getElementById(0).className += " active";
			  var i, tabcontent, tablinks;
			  tabcontent = document.getElementsByClassName("tabcontent");
			  for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			  }
			  tablinks = document.getElementsByClassName("tablinks");
			  for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			  }
			  document.getElementById(tabname).style.display = "block";
			  evt.currentTarget.className += " active";
			}
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function(e) {
					$('#output_banner').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#input_banner").change(function() {
				readURL(this);
			});
			$("#btn_cancel").click(function() {
				$("#output_banner").attr("src", "http://via.placeholder.com/1920x580").addClass('w-100');
				$("#input_banner").val('');
			});
		</script>	
<?php
	}

	/**
	 * Register Theme Settings
	 */
	function rocketThemeSettings() {

		add_option( 'header-bgcolor', '#F8EAE7' );
		add_option( 'page-bgcolor', '#FFFFFF' );
		add_option( 'footer-bgcolor', '#8E8A89' );
		add_option( 'header-template', 'left' );

		add_option('input_banner','None');

		register_setting( 'option-group', 'facebook' );
		register_setting( 'option-group', 'twitter' );
		register_setting( 'option-group', 'google_plus' );
		register_setting( 'option-group', 'linkedin' );
		register_setting( 'option-group', 'youtube' );
		register_setting( 'option-group', 'instagram' );
		register_setting( 'option-group', 'pinterest' );
		register_setting( 'option-group', 'favicon' );
		register_setting( 'option-group', 'admin_favicon' );
		register_setting( 'option-group', 'font_awesome' );
		register_setting( 'option-group', 'scroll_reveal' );
		register_setting( 'option-group', 'owl' );
		register_setting( 'option-group', 'parallax' );
		register_setting( 'option-group', 'loader' );
		register_setting( 'option-group', 'copyright' );
		register_setting( 'option-group', 'developer' );
		register_setting( 'option-group', 'rocket_scripts' );

		register_setting( 'option-group', 'header-bgcolor' );
		register_setting( 'option-group', 'page-bgcolor' );
		register_setting( 'option-group', 'footer-bgcolor' );
		register_setting( 'option-group', 'header-template' );

		register_setting( 'option-group', 'input_banner' );

	}

	function dynamicCSS() {
		$header = get_option('header-bgcolor');
		$footer = get_option('footer-bgcolor');
		$page   = get_option('page-bgcolor');
	?>
		<style type='text/css'>
			.site-header, nav.navbar {
				background-color:<?php echo $header; ?>!important;
			}
			footer, .site_main_footer, .site_copyright {
				background-color:<?php echo $footer; ?>!important;
			}
			/* span.text-muted{
				mix-blend-mode: difference;
			} */
			.site{
				background-color:<?php echo $page; ?>!important;
			}
		</style>
	<?php

	}


	function dynamicJS() {
		$optionJS = get_option('header-template');
	?>
		<script>
			function mobyMobileMenu(){
			var 	template  = '<div id="main-mobile-menu" class="moby-inner">';
					template +=     '<div class="moby-close">x</div>';
					template +=     '<div class="moby-wrap">';
					template +=             '<div class="moby-menu"></div>';
					template +=     '</div>';
					template += '</div>';

			var mobyMenu = new Moby({
				menu       		: $('nav#nav-menu'), // The menu that will be cloned

		<?php if ($optionJS == 'right') { ?>
				menuClass  :  'left-side' ,
		<?php } else if ($optionJS == 'center') { ?>
				menuClass  :  'top-full' ,
		<?php } else if ($optionJS == 'left') { ?>
				menuClass  :  'right-side' ,
		<?php } ?>

				mobyTrigger		: $('#moby-button'), // Button that will trigger the Moby menu to open
				template 		: template

			});

			}

		</script>

	<?php
	}
	?>
