<?php 
	$this->viewVars['title_for_layout'] = __('GeTranslators translations - forgot password', true);
	echo $form->create('User');
?>
<font size="4">
	<?php __("Forgotten password");?>
</font>
<blockquote>
	<font size="3">
		<?php __("Generate new password");?>
	</font>
	<br/><br/>
	<code>
		<?php echo $html->image('information.png')?>
		<?php __("A new password has been generated for your account. Please check your e-mail inbox for the new login data. You can change your new password at any time in your profile.");?>
	</code>
	<?php 
		echo $form->input('username', array('type' => 'hidden'));
		echo $form->input('password', array('type' => 'hidden'));
	?>
</blockquote>