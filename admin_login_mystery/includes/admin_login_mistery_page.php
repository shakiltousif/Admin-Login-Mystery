<?php
function admin_login_mystery_addon_menu_page()
{

    add_submenu_page('options-general.php', esc_html(__("Admin Login Mystery Options", "admin-login-mystery")) , esc_html(__("Admin Login Mystery", "admin-login-mystery")) , 'manage_options', 'admin_login_mystery', 'admin_login_mystery_addon_menu_page_design', 99);
}

add_action('admin_menu', 'admin_login_mystery_addon_menu_page');

function admin_login_mystery_addon_menu_page_design()
{

?>

<div class="main_editor">
		
		<?php
    // $control_link = add_query_arg( array(
    // 	'url'	 => wp_login_url(),
    // 	'autofocus' => 'admin_login_mystery_panel_id',
    // ), admin_url( 'customize.php' ) );
    

    $previous = "javascript:history.go(-1)";
    if (isset($_SERVER['HTTP_REFERER']))
    {
        $previous = $_SERVER['HTTP_REFERER'];
    }
    if ($previous == admin_url("options-general.php?page=admin_login_mystery"))
    {
        $previous = admin_url();
    }

?>
		
		<div class="row">
			<div class="column left-side open">
				<div class="row header-element">
					<a class="go-back-btn dashicons dashicons-arrow-left-alt2" href="<?php echo esc_url($previous); ?>"></a>
					<h2>Admin Login Options</h2>
				</div>
				<div class="admin_login_mystery_options_div">
					<form class="admin_login_mystery_options_form" action="options.php" method="POST">
						<?php wp_enqueue_media(); ?>
						<?php do_settings_sections('admin_login_mystery'); ?>
						<?php settings_fields('admin_login_mystery_section'); ?>

						<p class="submit p-submit"><input type="submit" name="submit" id="submit" class="button admin_login_mystery_options_form_button" value="Save"><i style="display:none" class="dashicons dashicons-image-rotate"></i></p>

					</form>
					<a class="toggle-panel-button"><span class="dashicons dashicons-arrow-left-alt"></span></a>
				</div>
			</div>

			<style type="text/css">
				a {
					color: #2271b1;
					transition-property: border, background, color;
					transition-duration: .05s;
					transition-timing-function: ease-in-out
				}

				a {
					outline: 0
				}

				a:active,
				a:hover {
					color: #135e96
				}

				a:focus {
					color: #043959;
					box-shadow: 0 0 0 1px #4f94d4, 0 0 2px 1px rgba(79, 148, 212, .8)
				}

				p {
					line-height: 1.5
				}

				#login #login_error,
				#login .message,
				#login .success {
					border-left: 4px solid #72aee6;
					padding: 12px;
					margin-left: 0;
					margin-bottom: 20px;
					background-color: #fff;
					box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1)
				}

				#login .success {
					border-left-color: #00a32a
				}

				#login #login_error {
					border-left-color: #d63638
				}

				#loginform p.submit,
				#login-action-lostpassword p.submit {
					border: none;
					margin: -10px 0 20px
				}

				#login * {
					margin: 0;
					padding: 0
				}

				#login .input::-ms-clear {
					display: none
				}

				#login .pw-weak {
					margin-bottom: 15px
				}

				#login .button.wp-hide-pw {
					background: 0 0;
					border: 1px solid transparent;
					box-shadow: none;
					font-size: 14px;
					line-height: 2;
					width: 2.5rem;
					height: 2.5rem;
					min-width: 40px;
					min-height: 40px;
					margin: 0;
					padding: 5px 9px;
					position: absolute;
					right: 0;
					top: 0
				}

				#login .button.wp-hide-pw:hover {
					background: 0 0
				}

				#login .button.wp-hide-pw:focus {
					background: 0 0;
					border-color: #3582c4;
					box-shadow: 0 0 0 1px #3582c4;
					outline: 2px solid transparent
				}

				#login .button.wp-hide-pw:active {
					background: 0 0;
					box-shadow: none;
					transform: none
				}

				#login .button.wp-hide-pw .dashicons {
					width: 1.25rem;
					height: 1.25rem;
					top: .25rem
				}

				#login .wp-pwd {
					position: relative
				}

				.no-js .hide-if-no-js {
					display: none
				}
				<?php $form_padding_admin = get_option('admin_login_mystery_options_login_form_padding'); ?>
				<?php $form_margin_admin = get_option('admin_login_mystery_options_login_form_margin'); ?>
				#login form {
					<?php if (isset($form_margin_admin[1]) || isset($form_margin_admin[2]) || isset($form_margin_admin[3]) || isset($form_margin_admin[4]))
    { ?>
					margin: <?php esc_html_e($form_margin_admin[1]); ?>px <?php esc_html_e($form_margin_admin[2]); ?>px <?php esc_html_e($form_margin_admin[3]); ?>px <?php esc_html_e($form_margin_admin[4]); ?>px;
						<?php
    }
    else
    {
        esc_html_e('margin-top: 20px;margin-left: 0;');
    } ?>

					<?php if (isset($form_padding_admin[1]) || isset($form_padding_admin[2]) || isset($form_padding_admin[3]) || isset($form_padding_admin[4]))
    { ?>
					padding: <?php esc_html_e($form_padding_admin[1]); ?>px <?php esc_html_e($form_padding_admin[2]); ?>px <?php esc_html_e($form_padding_admin[3]); ?>px <?php esc_html_e($form_padding_admin[4]); ?>px;

					<?php
    }
    else
    {
        esc_html_e('padding: 26px 24px 34px;');
    } ?>
					/*padding: 26px 24px 34px;*/
					font-weight: 400;
					overflow: hidden;
					background: #fff;
					border: 1px solid #c3c4c7;
					box-shadow: 0 1px 3px rgba(0, 0, 0, .04)
				}

				#login form.shake {
					animation: shake .2s cubic-bezier(.19, .49, .38, .79) both;
					animation-iteration-count: 3;
					transform: translateX(0)
				}

				@keyframes shake {
					25% {
						transform: translateX(-20px)
					}
					75% {
						transform: translateX(20px)
					}
					100% {
						transform: translateX(0)
					}
				}

				@media (prefers-reduced-motion:reduce) {
					#login form.shake {
						animation: none;
						transform: none
					}
				}

				#login-action-confirm_admin_email #login {
					width: 60vw;
					max-width: 650px;
					margin-top: -2vh
				}

				@media screen and (max-width:782px) {
					#login-action-confirm_admin_email #login {
						box-sizing: border-box;
						margin-top: 0;
						padding-left: 4vw;
						padding-right: 4vw;
						width: 100vw
					}
				}

				#login form .forgetmenot {
					font-weight: 400;
					float: left;
					margin-bottom: 0
				}

				#login .button-primary {
					float: right
				}

				#login .reset-pass-submit {
					display: flex;
					flex-flow: row wrap;
					justify-content: space-between
				}

				#login .reset-pass-submit .button {
					display: inline-block;
					float: none;
					margin-bottom: 6px
				}

				#login .admin-email-confirm-form .submit {
					text-align: center
				}

				.admin-email__later {
					text-align: left
				}

				#login form p.admin-email__details {
					margin: 1.1em 0
				}

				#login h1.admin-email__heading {
					border-bottom: 1px #f0f0f1 solid;
					color: #50575e;
					font-weight: 400;
					padding-bottom: .5em;
					text-align: left
				}

				.admin-email__actions div {
					padding-top: 1.5em
				}

				#login .admin-email__actions .button-primary {
					float: none;
					margin-left: .25em;
					margin-right: .25em
				}

				#login form p {
					margin-bottom: 0
				}

				#login form p.submit {
					margin: 0;
					padding: 0
				}

				#login label {
					font-size: 14px;
					line-height: 1.5;
					display: inline-block;
					margin-bottom: 3px
				}

				#login .forgetmenot label,
				#login .pw-weak label {
					line-height: 1.5;
					vertical-align: baseline
				}

				#login h1 {
					text-align: center
				}

				#login h1 a {
					background-image: url(<?php esc_html_e(get_option('admin_login_mystery_options_img', esc_url(plugin_dir_url(__DIR__) . 'admin/img/default_wordpress.png'))); ?>);
					background-image: none, url(<?php esc_html_e(get_option('admin_login_mystery_options_img', esc_url(plugin_dir_url(__DIR__) . 'admin/img/default_wordpress.png'))); ?>);
					height: <?php esc_html_e(get_option('admin_login_mystery_options_height', '150')); ?>px;
					width: <?php esc_html_e(get_option('admin_login_mystery_options_width', '150')); ?>px;
					background-size: <?php esc_html_e(get_option('admin_login_mystery_options_width', '150')); ?>px <?php esc_html_e(get_option('admin_login_mystery_options_height', '150')); ?>px;
					background-position: center top;
					background-repeat: no-repeat;
					border-radius: <?php esc_html_e(get_option('admin_login_mystery_options_border_radius', '50')); ?>px;
					color: #3c434a;
					font-size: 20px;
					font-weight: 400;
					line-height: 1.3;
					margin: 0 auto 25px;
					padding: 0;
					text-decoration: none;
					text-indent: -9999px;
					outline: 0;
					overflow: hidden;
					display: block
				}

				#login {
					width: 320px;
					padding: 8% 0 0;
					margin: auto
				}

				#login #backtoblog,
				#login #nav {
					font-size: 13px;
					padding: 0 24px 0
				}

				#login #nav {
					margin: 24px 0 0 0
				}

				#backtoblog {
					margin: 16px 0;
					word-break: break-word
				}

				#login #backtoblog a,
				#login #nav a {
					text-decoration: none;
					color: #50575e
				}

				#login #backtoblog a:hover,
				#login #nav a:hover,
				#login h1 a:hover {
					color: #135e96
				}

				#login #backtoblog a:focus,
				#login #nav a:focus,
				#login h1 a:focus {
					color: #043959
				}

				#login .privacy-policy-page-link {
					text-align: center;
					width: 100%;
					margin: 5em 0 2em
				}

				#login form .input,
				#login input[type=password],
				#login input[type=text] {
					font-size: 24px;
					line-height: 1.33333333;
					width: 100%;
					border-width: .0625rem;
					padding: .1875rem .3125rem;
					margin: 0 6px 16px 0;
					min-height: 40px;
					max-height: none
				}

				#login input.password-input {
					font-family: Consolas, Monaco, monospace
				}

				.js#login input.password-input,
				.js#login-action-rp form .input,
				.js#login-action-rp input[type=text] {
					padding-right: 2.5rem
				}

				#login form .input,
				#login form input[type=checkbox],
				#login input[type=text] {
					background: #fff
				}

				.js#login-action-rp input[type=password],
				.js#login-action-rp input[type=text] {
					margin-bottom: 0
				}

				#login #pass-strength-result {
					font-weight: 600;
					margin: -1px 5px 16px 0;
					padding: 6px 5px;
					text-align: center;
					width: 100%
				}

				body.interim-login {
					height: auto
				}

				.interim-login #login {
					padding: 0;
					margin: 5px auto 20px
				}

				.interim-login#login h1 a {
					width: auto
				}

				.interim-login #login_error,
				.interim-login#login .message {
					margin: 0 0 16px
				}

				.interim-login#login form {
					margin: 0
				}

				.screen-reader-text,
				.screen-reader-text span {
					border: 0;
					clip: rect(1px, 1px, 1px, 1px);
					-webkit-clip-path: inset(50%);
					clip-path: inset(50%);
					height: 1px;
					margin: -1px;
					overflow: hidden;
					padding: 0;
					position: absolute;
					width: 1px;
					word-wrap: normal!important
				}

				input::-ms-reveal {
					display: none
				}

				@media screen and (max-height:550px) {
					#login {
						padding: 20px 0
					}
				}

				@media screen and (max-width:782px) {
					.interim-login input[type=checkbox] {
						width: 1rem;
						height: 1rem
					}
					.interim-login input[type=checkbox]:checked:before {
						width: 1.3125rem;
						height: 1.3125rem;
						margin: -.1875rem 0 0 -.25rem
					}
				}
				.right-side{
					background: <?php esc_html_e(get_option('admin_login_mystery_options_background_color', '#F0F0F1')); ?>;
					background-image: url(<?php esc_html_e(get_option('admin_login_mystery_options_background_image', 'none')); ?>);
					background-repeat: <?php esc_html_e(get_option('admin_login_mystery_options_background_repeat', 'no-repeat')); ?>;
					background-position: <?php esc_html_e(get_option('admin_login_mystery_options_background_position', 'center center')); ?>;
					background-size: <?php esc_html_e(get_option('admin_login_mystery_options_background_size', 'auto')); ?>;
				}
				<?php esc_html_e(get_option('admin_login_mystery_options_additional_css')); ?>
			</style>
			<div class="column right-side">
				<div id="editor_additional_css"></div>
					<body>
						<div id="login">
						<h1><a href="https://wordpress.org/">Powered by WordPress</a></h1>
					
						<form name="loginform" autocomplete="off" id="loginform" action="http://localhost/devcode/wp-login.php" method="post">
							<p>
								<label for="user_login">Username or Email Address</label>
								<input type="text" name="log" id="user_login" class="input" value="" size="20" autocapitalize="off">
							</p>

							<div class="user-pass-wrap">
								<label for="user_pass">Password</label>
								<div class="wp-pwd">
									<input type="password" name="pwd" id="user_pass" class="input password-input" value="" size="20">
									<button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="Show password">
										<span class="dashicons dashicons-visibility" aria-hidden="true"></span>
									</button>
								</div>
							</div>
										<p class="forgetmenot"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> <label for="rememberme">Remember Me</label></p>
							<p class="submit">
								<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In">
													<input type="hidden" name="redirect_to" value="http://localhost/devcode/wp-admin/admin.php?page=quiz-maker">
													<input type="hidden" name="testcookie" value="1">
							</p>
						</form>

									<p id="nav">
												<a href="http://localhost/devcode/wp-login.php?action=lostpassword">Lost your password?</a>
							</p>
									<script type="text/javascript">
							function wp_attempt_focus() {setTimeout( function() {try {d = document.getElementById( "user_login" );d.focus(); d.select();} catch( er ) {}}, 200);}
				wp_attempt_focus();
				if ( typeof wpOnload === 'function' ) { wpOnload() }		</script>
								<p id="backtoblog">
							<a href="http://localhost/devcode/">← Go to Plugin Development</a>		</p>
							</div>
					</body>
			</div>
		</div>
	</div>

<?php
}

