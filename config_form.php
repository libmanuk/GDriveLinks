<?php
$link_target_value = get_option('default_link_target_value');
$link_text_value = get_option('default_link_text_value');
$embed_width_value = get_option('default_embed_width_value');
$embed_height_value = get_option('default_embed_height_value');
$view = get_view();
?>
<div class="field">
	<h3>Default Target Value for GoogleDoc Link</h3>
    <div class="inputs">
        <div class="input-block">
            <div class="input">
                <?php echo $view->formTextarea('link_target_value', $link_target_value, array('rows' => '3', 'cols' => '50', 'class' => array('textinput'))); ?>
            </div>
			<p class="explanation">
				Enter text '_blank' or '_self'.  The value '_blank' sets the hyperlink to a GoogleDrive item to open in a new tab or window.  The value '_self' sets the hyperlink to a GoogleDrive item to open in the current frame.  The default value is '_blank'.
			</p>
        </div>
    </div>
</div>

<div class="field">
	<h3>Default Text for GoogleDoc Link</h3>
    <div class="inputs">
        <div class="input-block">
            <div class="input">
				<?php echo $view->formTextarea('link_text_value', $link_text_value, array('rows' => '3', 'cols' => '50', 'class' => array('textinput'))); ?>
            </div>

        <p class="explanation">
            Enter text for the hotlink.
        </p>
        </div>
    </div>
</div>

<div class="field">
	<h3>Default Height for Embedded GoogleDoc</h3>
    <div class="inputs">
        <div class="input-block">
            <div class="input">
				<?php echo $view->formTextarea('embed_height_value', $embed_height_value, array('rows' => '3', 'cols' => '50', 'class' => array('textinput'))); ?>
			</div>

        <p class="explanation">
            Enter a value for the height of the embedded GoogleDoc.
        </p>
        </div>
    </div>
</div>

<div class="field">
	<h3>Default Width for Embedded GoogleDoc</h3>
    <div class="inputs">
        <div class="input-block">
            <div class="input">
				<?php echo $view->formTextarea('embed_width_value', $embed_width_value, array('rows' => '3', 'cols' => '50', 'class' => array('textinput'))); ?>
			</div>

        <p class="explanation">
            Enter a value for the width of the embedded GoogleDoc.  Use %, if desired.
        </p>
        </div>
    </div>
</div>
