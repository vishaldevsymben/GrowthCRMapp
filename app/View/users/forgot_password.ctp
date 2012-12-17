<?php 
	$this->viewVars['title_for_layout'] = __('GeTranslators translations - forgot password', true);
	echo $javascript->link('Scripts/UserForgotPasswordForm'); 
	echo $form->create('User');
?>

<font size="4">
	<?php __("Forgotten password");?>?
</font>

<blockquote>
	<font size="3">
		<?php __("Required data");?>
	</font>
	<br/><br/>
	<code>
		<?php 
			echo $html->image('information.png');
		?>
		<?php __("In order to request a new password please enter your e-mail address. GeTranslators will then send you an e-mail to this address containing a link that you need to follow in order to generate a new password.");?>
	</code>
	<br/><br/>
	<table width="100%">
		<tr>
			<td valign="top"><?php __("E-mail address");?>:</td>
			<td>
				<?php 
					echo $form->input('email', array('label' => false, 'class' => 'required email'));
				?>
			</td>
		</tr>
	</table>
	
	
	<br/><hr/><br/>
	<div align="right">
		<?php 
			echo $form->end(__('Send', true));
		?>
	</div>
</blockquote>