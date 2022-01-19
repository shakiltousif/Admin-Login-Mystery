<?php
class allFields
{
    public function inputFields($type, $class, $name, $value)
    {
?>
        
            <input type="<?php echo $type; ?>" class="<?php echo $class; ?>" name="<?php echo $name; ?>" value="<?php esc_html_e(get_option($name, $value[0])); ?>" <?php if ($type == "number")
        {
            echo "step='any'";
        } ?> ><?php echo $value[1]; ?>

        <?php
    }

    public function input4Box($id, $class, $defaults)
    {

        $options = get_option($id);
        if (!isset($options[5]))
        {
            $options[5] = 'disabled';
        }
?>

<script type="text/javascript">
    jQuery(document).ready(()=>{


            jQuery('input[name="<?php echo $id ?>[1]"]').keyup(()=>{
                if(jQuery('.<?php echo $id ?>_button').hasClass('enabled')){
                jQuery('.<?php echo $class ?> input[type="number"]').val(jQuery('input[name="<?php echo $id ?>[1]"]').val());
            }
            });
            jQuery('input[name="<?php echo $id ?>[2]"]').keyup(()=>{
                if(jQuery('.<?php echo $id ?>_button').hasClass('enabled')){
                jQuery('.<?php echo $class ?> input[type="number"]').val(jQuery('input[name="<?php echo $id ?>[2]"]').val());
            }
            });
            jQuery('input[name="<?php echo $id ?>[3]"]').keyup(()=>{
                if(jQuery('.<?php echo $id ?>_button').hasClass('enabled')){
                jQuery('.<?php echo $class ?> input[type="number"]').val(jQuery('input[name="<?php echo $id ?>[3]"]').val());
            }
            });
            jQuery('input[name="<?php echo $id ?>[4]"]').keyup(()=>{
                if(jQuery('.<?php echo $id ?>_button').hasClass('enabled')){
                jQuery('.<?php echo $class ?> input[type="number"]').val(jQuery('input[name="<?php echo $id ?>[4]"]').val());
            }
            });


        jQuery('.<?php echo $id ?>_button').click(()=>{
            
            if(jQuery('.<?php echo $id ?>_button').hasClass('enabled')){
                jQuery('.<?php echo $id ?>_button').removeClass('enabled');
                jQuery('.<?php echo $id ?>_button').addClass('disabled');
                jQuery('.<?php echo $id ?>_button span').removeClass('dashicons-admin-links');
                jQuery('.<?php echo $id ?>_button span').addClass('dashicons-editor-unlink');
                jQuery('.<?php echo $id ?>_button input[type="hidden"]').val('disabled');
            } 
            else if(jQuery('.<?php echo $id ?>_button').hasClass('disabled')) {

                jQuery('.<?php echo $id ?>_button').addClass('enabled');
                jQuery('.<?php echo $id ?>_button').removeClass('disabled');
                jQuery('.<?php echo $id ?>_button span').addClass('dashicons-admin-links');
                jQuery('.<?php echo $id ?>_button span').removeClass('dashicons-editor-unlink');
                jQuery('.<?php echo $id ?>_button input[type="hidden"]').val('enabled');
                jQuery('.<?php echo $class ?> input[type="number"]').val(jQuery('.<?php echo $class ?> input').val());
            }
        });

        });
</script>

<div class="<?php echo $class; ?>">

<input type="number" name="<?php echo $id; ?>[1]" step="any" class="small-text text-4" value="<?php if (isset($options['1']))
        {
            echo $options['1'];
        }
        else
        {
            echo $defaults[0];
        } ?>">

<input type="number" name="<?php echo $id; ?>[2]" step="any" class="small-text text-4" value="<?php if (isset($options['2']))
        {
            echo $options['2'];
        }
        else
        {
            echo $defaults[1];
        } ?>">

<input type="number" name="<?php echo $id; ?>[3]" step="any" class="small-text text-4" value="<?php if (isset($options['3']))
        {
            echo $options['3'];
        }
        else
        {
            echo $defaults[2];
        } ?>">

<input type="number" name="<?php echo $id; ?>[4]" step="any" class="small-text text-4" value="<?php if (isset($options['4']))
        {
            echo $options['4'];
        }
        else
        {
            echo $defaults[3];
        } ?>">

<a name="<?php echo $id ?>[5]" class='m-text <?php echo $id ?>_button <?php if ($options['5'] == 'enabled')
        {
            echo "enabled";
        }
        else
        {
            echo "disabled";
        } ?>'><span class="dashicons <?php if ($options['5'] == 'enabled')
        {
            echo "dashicons-admin-links";
        }
        else
        {
            echo "dashicons-editor-unlink";
        } ?>"></span><input type="hidden" name="<?php echo $id ?>[5]" value="<?php echo $options['5'] ?>"></a>

</div>

        <?php
    }

    public function imageFields($imgSrc, $class, $btnText)
    {
?>
    <script type="text/javascript">
        jQuery(document).ready(function () {
        jQuery(".<?php echo $imgSrc[0]; ?>-button").on("click", function () {
        $imgs = wp.media({ title: "Upload Media", multiple: !1 }).open().on("select", function () {
                ($get_the_attachment = $imgs.state().get("selection"));
                    ($get_url = $get_the_attachment.toJSON());
                    jQuery(".<?php echo $imgSrc[0]; ?>-hidden-text").attr("value", $get_the_attachment.toJSON()[0].url),
                    jQuery(".<?php echo $imgSrc[0]; ?>-img_addon").css("display", "block"),
                    jQuery(".<?php echo $imgSrc[0]; ?>-exit_btn").css("display", "block"),
                    jQuery(".<?php echo $imgSrc[0]; ?>-img_addon").attr("src", $get_the_attachment.toJSON()[0].url);
            });
    }),
        jQuery(".<?php echo $imgSrc[0]; ?>-exit_btn").on("click", function () {
        jQuery(".<?php echo $imgSrc[0]; ?>-img_addon").css("display", "none");
        jQuery(".<?php echo $imgSrc[0]; ?>-hidden-text").attr("value", "");
        jQuery(".<?php echo $imgSrc[0]; ?>-exit_btn").css("display", "none");
    })
        if(jQuery('.<?php echo $imgSrc[0]; ?>-hidden-text').val() == ''){
            jQuery(".<?php echo $imgSrc[0]; ?>-img_addon").css("display", "none");
            jQuery(".<?php echo $imgSrc[0]; ?>-exit_btn").css("display", "none");
        }
    });
    </script>
        <span style="display: block;cursor: pointer;" class="dashicons dashicons-no <?php echo $imgSrc[0]; ?>-exit_btn"></span>

        <img style="display: block; height: 100px; width:100px;" src="<?php esc_html_e(get_option($imgSrc[0], esc_url($imgSrc[1]))); ?>" name="<?php echo $imgSrc[0] ?>" class="<?php if ($class)
        {
            echo $class;
        }
        else
        {
            echo $imgSrc[0] . '-img_addon';
        } ?>" style="height: 100px; width: 150px;">

        <input type="hidden" value="<?php esc_html_e(get_option($imgSrc[0], esc_url($imgSrc[1]))); ?>" class="regular-text <?php echo $imgSrc[0]; ?>-hidden-text" name="<?php echo $imgSrc[0]; ?>">

        <input type="button" value="<?php esc_html(_e($btnText, "admin-login-mystery")) ?>" class="<?php echo $imgSrc[0]; ?>-button upload_image_button">

        <?php
    }
    public function selectFields()
    {
?>
        <select name="admin_login_mystery_options_background_repeat">
            <option value="no-repeat" <?php selected(get_option('admin_login_mystery_options_background_repeat') , 'no-repeat', true); ?>>no-repeat</option>
            <option value="repeat" <?php selected(get_option('admin_login_mystery_options_background_repeat') , 'repeat', true); ?>>repeat</option>
            <option value="inherit" <?php selected(get_option('admin_login_mystery_options_background_repeat') , 'inherit', true); ?>>inherit</option>
        </select>
        <?php
    }

    public function fancyEditorCSS($name)
    {

?>

        <textarea id="fancy-textarea" name="<?php echo $name; ?>"><?php echo esc_textarea(get_option($name)); ?></textarea>

        <?php
    }
}

?>
