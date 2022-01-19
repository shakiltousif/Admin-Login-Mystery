jQuery(document).ready(function () {
	// Image Upload
    jQuery('.admin_login_mystery_options_img-button').click(()=>{

    	setTimeout(()=>{
    		jQuery('.supports-drag-drop .media-button-select').click(()=>{
   			jQuery("#login h1 a").css("background-image", "url(" + jQuery('.admin_login_mystery_options_img-hidden-text').val() + ")");
   	});
    	
    	}, 1000);
    });

    jQuery('.admin_login_mystery_options_img-exit_btn').click(()=>{
        jQuery("#login h1 a").css("background-image", "none");
    });

    jQuery('.admin_login_mystery_options_background_image-button').click(()=>{

    	setTimeout(()=>{
    		jQuery('.supports-drag-drop .media-button-select').click(()=>{
   			jQuery(".right-side").css({"background-image":"url(" + jQuery('.admin_login_mystery_options_background_image-hidden-text').val() + ")"});
   			
   	});
    	
    	}, 1000);
    });
    jQuery('.admin_login_mystery_options_background_image-exit_btn').click(()=>{
        jQuery(".right-side").css("background-image", "none");
    });



//         wp.codeEditor.initialize(jQuery("#fancy-textarea"), {
//      mode: { name: "text/css", htmlMode: true },
//      lineNumbers: true,
//      tabMode: "indent",
// });

var editor = wp.CodeMirror.fromTextArea(document.getElementById("fancy-textarea"), {
     mode: { name: "css", htmlMode: true },
     linerWrapping: true,
     lineNumbers: true,
     tabMode: "indent",
     autoCloseTags: true,
     autoCloseBrackets: true,
   });
let text = "";
editor.on('change', (value)=>{
    text = value.doc.getValue();
    jQuery('#editor_additional_css').html(`<style type="text/css">`+text+`</style>`);
    if(text == ''){

        text = 'empty';

    }
});

        //Color Picker
    jQuery('.my-color-field').wpColorPicker({
        	defaultColor: "#F0F0F1",
    // a callback to fire whenever the color changes to a valid color
    change: function(event, ui){
    	jQuery(".right-side").css({"background-color":jQuery(this).val()});
    }
    });




    var e = jQuery("input[name='admin_login_mystery_options_height']"),
        t = jQuery("input[name='admin_login_mystery_options_width']"),
        n = jQuery("input[name='admin_login_mystery_options_border_radius']"),
        br = jQuery("select[name='admin_login_mystery_options_background_repeat']"),
        bp = jQuery("select[name='admin_login_mystery_options_background_position']");
        bs = jQuery("select[name='admin_login_mystery_options_background_size']");

    jQuery("textarea[name='admin_login_mystery_options_additional_css']");

    e.keyup(() => {
        jQuery("#login h1 a").css("height", e.val()), jQuery("#login h1 a").css("background-size", e.val() + "px " + t.val() + "px");
    }),
        t.keyup(() => {
            jQuery("#login h1 a").css("width", t.val()), jQuery("#login h1 a").css("background-size", e.val() + "px " + t.val() + "px");
        }),
        n.keyup(() => {
            jQuery("#login h1 a").css("border-radius", n.val() + "px");
        })
        br.change(() => {
            jQuery(".right-side").css("background-repeat", br.val());
        })
        bp.change(() => {
            jQuery(".right-side").css("background-position", bp.val());
        });
        bs.change(() => {
            jQuery(".right-side").css("background-size", bs.val());
        });



//padding Field change
var padding_change = ()=>{ jQuery('.right-side #loginform').css('padding', jQuery('input[name="admin_login_mystery_options_login_form_padding[1]"]').val() + 'px ' + jQuery('input[name="admin_login_mystery_options_login_form_padding[2]"]').val() + 'px ' + jQuery('input[name="admin_login_mystery_options_login_form_padding[3]"]').val() + 'px ' + jQuery('input[name="admin_login_mystery_options_login_form_padding[4]"]').val() + 'px' );
}

jQuery('.admin_login_mystery_options_login_form_padding_design input[type="number"]').keyup(()=>{

    padding_change();

            });
jQuery('.admin_login_mystery_options_login_form_padding_design a[name="admin_login_mystery_options_login_form_padding[5]"]').click(()=>{

    setTimeout(()=>{
        padding_change();
    }, 100);
    

})

//margin fields change
var margin_change = ()=>{
    jQuery('.right-side #loginform').css('margin', jQuery('input[name="admin_login_mystery_options_login_form_margin[1]"]').val() + 'px ' + jQuery('input[name="admin_login_mystery_options_login_form_margin[2]"]').val() + 'px ' + jQuery('input[name="admin_login_mystery_options_login_form_margin[3]"]').val() + 'px ' + jQuery('input[name="admin_login_mystery_options_login_form_margin[4]"]').val() + 'px' );
};
jQuery('.admin_login_mystery_options_login_form_margin_design input[type="number"]').keyup(()=>{
                
margin_change();
});


jQuery('.admin_login_mystery_options_login_form_margin_design a[name="admin_login_mystery_options_login_form_margin[5]"]').click(()=>{

    setTimeout(()=>{
        margin_change();
    }, 100);

});


// On Submit Settings Save Ajax

jQuery('.admin_login_mystery_options_form_button').click((e)=>{
e.preventDefault();
jQuery('.admin_login_mystery_options_form_button').attr('disabled','disabled');
jQuery('p.p-submit .dashicons').attr('style','display:block');


 var data = {
            action: 'save_and_update_options',
            admin_login_mystery_options_img: jQuery('input[name="admin_login_mystery_options_img"]').val(),
            admin_login_mystery_options_height: jQuery('input[name="admin_login_mystery_options_height"]').val(),
            admin_login_mystery_options_width: jQuery('input[name="admin_login_mystery_options_width"]').val(),
            admin_login_mystery_options_border_radius: jQuery('input[name="admin_login_mystery_options_border_radius"]').val(),
            admin_login_mystery_options_background_color: jQuery('input[name="admin_login_mystery_options_background_color"]').val(),
            admin_login_mystery_options_background_image: jQuery('input[name="admin_login_mystery_options_background_image"]').val(),
            admin_login_mystery_options_background_repeat: jQuery('select[name="admin_login_mystery_options_background_repeat"]').val(),
            admin_login_mystery_options_background_position: jQuery('select[name="admin_login_mystery_options_background_position"]').val(),
            admin_login_mystery_options_background_size: jQuery('select[name="admin_login_mystery_options_background_size"]').val(),
            admin_login_mystery_options_login_form_padding: [ jQuery('input[name="admin_login_mystery_options_login_form_padding[1]"]').val(), jQuery('input[name="admin_login_mystery_options_login_form_padding[2]"]').val(), jQuery('input[name="admin_login_mystery_options_login_form_padding[3]"]').val(), jQuery('input[name="admin_login_mystery_options_login_form_padding[4]"]').val(), jQuery('input[name="admin_login_mystery_options_login_form_padding[5]"]').val()],
            admin_login_mystery_options_login_form_margin: [ jQuery('input[name="admin_login_mystery_options_login_form_margin[1]"]').val(), jQuery('input[name="admin_login_mystery_options_login_form_margin[2]"]').val(), jQuery('input[name="admin_login_mystery_options_login_form_margin[3]"]').val(), jQuery('input[name="admin_login_mystery_options_login_form_margin[4]"]').val(), jQuery('input[name="admin_login_mystery_options_login_form_margin[5]"]').val()],
            admin_login_mystery_options_additional_css: text
        };
jQuery.post( ajaxurl, data, function(response) {
            // handle response from the AJAX request.
            console.log('success');
            console.log(response);
        });


setTimeout(()=>{
    jQuery('.admin_login_mystery_options_form_button').removeAttr('disabled');
jQuery('p.p-submit .dashicons').attr('style','display:none');
},100)

});


// Toggle Panel Button

jQuery('.left-side a[class="toggle-panel-button"]').click(()=>{
    if(jQuery('.left-side').hasClass('open')){

        jQuery('.left-side').removeClass('open');
        jQuery('.left-side').addClass('close');
        jQuery('.left-side a[class="toggle-panel-button"] span').addClass('dashicons-arrow-right-alt');
        jQuery('.left-side a[class="toggle-panel-button"] span').removeClass('dashicons-arrow-left-alt');
        jQuery('.left-side input[type="submit"]').css('display', 'none');
        jQuery('.left-side a[class="toggle-panel-button"]').css('left', '2%');
        jQuery('.right-side').css('width', '100%');

    }else{

        jQuery('.left-side').removeClass('close');
        jQuery('.left-side').addClass('open');
        jQuery('.left-side a[class="toggle-panel-button"] span').removeClass('dashicons-arrow-right-alt');
        jQuery('.left-side a[class="toggle-panel-button"] span').addClass('dashicons-arrow-left-alt');
        jQuery('.left-side input[type="submit"]').css('display', 'block');
        jQuery('.left-side a[class="toggle-panel-button"]').css('left', '22%');
        jQuery('.right-side').css('width', '80%');


    }
});
});
