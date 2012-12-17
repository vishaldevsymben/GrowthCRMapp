<?php 
	$this->viewVars['title_for_layout'] = __('GeTranslators.com', true);
	echo $javascript->link('Scripts/UserEditPasswordForm'); 
	echo $this->Form->create('User');
?>

<h2>
	<?php __("Edit password");?>
</h2>
<blockquote>
	<table width="100%">
		<tr>
			<td colspan="2">
				<p><b>
					<?php __("Required data");?>
				</b></p>
			</td>
		</tr>
		<tr>
			<td valign="top" width="25%">
				 <p><?php __("Former password");?>*:</p>
			</td>
			<td>
				<?php 
				if(isset($enc)){
					print_r($enc);
					echo $enc1;
				}
					echo $this->Form->input('id', array('label' => false, 'type' => 'hidden'));
					echo $this->Form->input('username', array('label' => false, 'type' => 'hidden'));
					echo $this->Form->input('password', array('label' => false, 'class' => 'required', 'type' => 'password'));
										
				?>
				
				
			</td>
		</tr>
		<tr>
			<td valign="top">
				 <p><?php __("Password");?>*:</p>
			</td>
			<td>
				<?php 
					echo $this->Form->input('newPassword', array('label' => false, 'class' => 'required', 'type' => 'password'));					
				?>
				<b>
					<div id="div_passError">
						<?php __("The password length can't be less than 6 characters");?>
					</div>
					</b>
			</td>
		</tr>
		<tr>
			<td valign="top">
				 <p><?php __("Confirm password");?>*:</p>
			</td>
			<td>
				<?php 
					echo $this->Form->input('password2', array('label' => false, 'class' => 'required', 'type' => 'password', 'equalTo' => '#UserNewPassword'));					
				?>
				<br/>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right"><hr/><br/><?php echo $this->Form->end(__('Save changes', true));?></td>
		</tr>
	</table>
</blockquote>