jQuery(document).ready(function(){var t=jQuery(".admin_login_mystery_options_number");jQuery(".admin_login_mystery_options_form_button").click(function(){if(isNaN(t.val()))return alert("Please Input Number Value"),!1}),jQuery("#upload_image_button").on("click",function(){$imgs=wp.media({title:"Upload Media",multiple:!1}).open().on("select",function(){$get_the_attachment=$imgs.state().get("selection"),$get_url=$get_the_attachment.toJSON(),jQuery(".admin_login_mystery_options_text").attr("value",$get_the_attachment.toJSON()[0].url),jQuery(".img_addon").css("display","block"),jQuery(".exit_btn").css("display","block"),jQuery(".img_addon").attr("src",$get_the_attachment.toJSON()[0].url)})}),jQuery(".exit_btn").on("click",function(){jQuery(".img_addon").css("display","none"),jQuery(".admin_login_mystery_options_text").attr("value",""),jQuery(".exit_btn").css("display","none")}),wp.codeEditor.initialize(jQuery("#fancy-textarea"),cm_settings)});