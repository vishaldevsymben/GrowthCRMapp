<div class="users form">
	<?php 
		$this->viewVars['title_for_layout'] = __('growthcrm.com', true);
/*		echo $html->css('ui-lightness/jquery-ui-1.8.2.custom.css');
		echo $javascript->link('jquery.ui.dialog');
		echo $javascript->link('jquery-ui-1.8.2.custom');*/	
		//echo $javascript->link('Scripts/UserAddForm');
		echo $this->Form->create('User');
	?>
	<h2>
		<?php echo  $this->Form->label("Customer registration");?>
	</h2>
	<blockquote>
		<table width="100%">
			<tr>
				<td colspan="2">
					<h3>
						<?php echo  $this->Form->label("Your details");?>
					</h3>
				</td>
			</tr>
			
			<tr>
				<td valign="top" width="32%">
					<p><?php echo  $this->Form->label("Title");?>*:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('sex', array('label' => false, 'class' => 'required', 'options' => array('M' => 'Mr.', 'F' => 'Ms.')));
					?>
				</td>
			</tr>
			
			<tr>
				<td valign="top">
					<p><?php echo  $this->Form->label("First name");?>*:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('first_name', array('label' => false, 'class' => 'required'));
					?>
				</td>
			</tr>
			
			<tr>
				<td valign="top">
					<p><?php echo  $this->Form->label("Surname");?>*:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('last_name', array('label' => false, 'class' => 'required'));
					?>
				</td>
			</tr>
			
			<tr>
				<td>
					<p><?php echo  $this->Form->label("Company");?>:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('company', array('label' => false));
					?>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<br/><hr/><br/>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<h3>
						<?php echo  $this->Form->label("Contact information");?>
					</h3>
				</td>
			</tr>
			
			<tr>
				<td valign="top">
					<p><?php echo  $this->Form->label("Street");?>*:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('street', array('label' => false, 'class' => 'required'));
					?>
				</td>
			</tr>
			
			<tr>
				<td valign="top">
					<p><?php echo  $this->Form->label("Postal code");?>*:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('postal_code', array('label' => false, 'class' => 'required number'));
					?>
				</td>
			</tr>
			
			<tr>
				<td valign="top">
					<p><?php echo  $this->Form->label("City");?>*:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('city', array('label' => false, 'class' => 'required'));
					?>
				</td>
			</tr>
			
			<tr>
				<td valign="top">
					<p><?php echo  $this->Form->label("Country");?>*:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('country_id', array('label' => false, 'class' => 'required'));
					?>
				</td>
			</tr>
			
			<tr>
				<td>
					<p><?php echo  $this->Form->label("Telephone number");?>*:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('phone', array('label' => false, 'class' => 'required number'));
					?>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<br/><hr/><br/>
				</td>
			</tr>
			
			<tr>
				<td valign="top">
					<p><?php echo  $this->Form->label("Information");?>:</p>
				</td>
				<td>
					<code>
						<?php echo  $this->Form->label("Please activate this option if you require a net invoice (without VAT)");?>
					</code>
					<?php 
						echo $this->Form->input('net', array('label' => false, 'class' => 'required number','type'=>'checkbox')); 
					?>
					<p><?php echo  $this->Form->label("Net invoice");?></p>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<br/><hr/><br/>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<h3>
						<?php echo  $this->Form->label("Login information");?>
					</h3>
				</td>
			</tr>
			
			<tr>
				<td valign="top">
					<p><?php echo  $this->Form->label("E-mail address");?>*:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('username', array('label' => false, 'class' => 'required email'));
					?>
				</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<div id="div_email_exists">
						<?php 
							echo $this->html->image('error.jpg');
						?>
						<?php echo  $this->Form->label("This email already exists, please select another one");?>
					</div>
					<div id="div_email_available">
						<?php 
							echo $this->html->image('true.jpg');
						?>
						<?php echo  $this->Form->label("Email available");?>
					</div>
				</td>
			</tr>
			
			<tr>
				<td valign="top">
					<p><?php echo  $this->Form->label("Confirm e-mail address");?>*:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('username2', array('label' => false, 'class' => 'required email', 'equalTo' => '#UserUsername'));
					?>
				</td>
			</tr>
			
			<tr>
				<td valign="top">
					<p><?php echo  $this->Form->label("Choose password");?>*:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('password', array('label' => false, 'class' => 'required'));
					?>
					
					<b>
					<div id="div_passError">
						<?php echo  $this->Form->label("The password length can't be less than 6 characters");?>
					</div>
					</b>
				</td>
			</tr>
			
			<tr>
				<td valign="top">
					<p><?php echo  $this->Form->label("Confirm password");?>*:</p>
				</td>
				<td>
					<?php 
						echo $this->Form->input('password2', array('label' => false, 'class'=>'required', 'type' => 'password', 'equalTo' => '#UserPassword'));
					?>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<br/><hr/><br/>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<h3>
						<?php echo  $this->Form->label("Terms and conditions");?>
					</h3>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					
                    <p><?php 
						echo $this->Form->checkbox('accepted');
					?>
					<?php echo  $this->Form->label("Yes, I have read and accepted the") . ' ';?> <?php echo $this->html->link( __('general terms and conditions', true), 'javascript:showDialogGeneral();')?> and <?php echo $this->html->link('data protection', 'javascript:showDialogDataProtec();')?>.
                    </p>
					<div id="div_accept">
						<br/>
						<?php echo  $this->Form->label("Please agree with our conditions first to continue registration");?>
					</div>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<br/><hr/><br/>
				</td>
			</tr>
			
			<tr>
				<td>
					<p><?php echo  $this->Form->label("(*) required field");?></p>
				</td>
				<td align="right">
					<?php 
						echo $this->Form->end('Complete registration', true);
					?>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<div id="dialog-general-terms" title="General terms and Conditions of Use (Customers)">
						<?php echo  $this->Form->label("The General terms and Conditions of Use (Customers) will be here");?>
					</div>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<div id="dialog-data-protection" title="Data Protection Agreement">
						<?php echo  $this->Form->label("The Data Protection Agreement will be here");?>
					</div>
				</td>
			</tr>
		</table>
	</blockquote>
</div>