<?php 
	$this->viewVars['title_for_layout'] = __('GeTranslators translation login', true);
	echo $javascript->link('Scripts/UserLoginForm');
	echo $form->create('User');	
?>

<h2>
	<?php __("Login");?>
</h2>

<blockquote>
	<table width="100%">
		<tr>
			<td colspan="2">
				<h3>
					<?php __("Your login data");?>
				</h3>
				
			</td>
		</tr>
		<tr>
			<td>
				<p><?php __("E-mail address");?>:</p>
			</td>
			<td>
				<?php 				
					echo $form->input('username', array('class' => 'required email', 'label' => false));
				?>
			</td>
		</tr>
		<tr>
			<td>
				<p><?php __("Password");?>:</p>
			</td>
			<td>
				<?php 
					echo $form->input('password', array('class' => 'required', 'label' => false));
				?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
            	<p>
				<?php 
					echo $html->link('Forgotten password?', array('action' => 'forgotPassword'));
				?>
                </p>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
            	<p>
				<?php 
					echo $form->checkbox('remember');
					__('Remember me');
				?>
                </p>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php 
 					if ($session->check('Message.auth')){
 						echo '<br/><br/>';
    					echo $this->Session->flash('auth');
 					} 				
 				?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<br/><br/><hr/><br/><br/>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<?php 
					echo $form->end(__('Login', true));
				?>
			</td>
		</tr>
	</table>
</blockquote>
