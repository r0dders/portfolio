<?php
//show any errors
echo validation_errors() . '<br />';

//set the form attributes
$attributes = array('class' => 'form-horizontal', 'role' => 'form');

//open the form
echo form_open('login/register', $attributes) . '<br />';

//show any errors passed from controller
echo $login_error;

?>
	<div class='form-group'>
		<label for='username' class="col-sm-2 control-label">User Name:</label>
		<div class="col-sm-4">
			<input type='input' class='form-control' name='username' value="<?php echo set_value('username'); ?>"/><br/>
		</div>
	</div>

	<div class='form-group'>
		<label for='password'  class="col-sm-2 control-label">Password:</label>
		<div class="col-sm-4">
			<input type='password' class='form-control' name='password' value="<?php echo set_value('password'); ?>"/><br/>
		</div>
	</div>

	<div class='form-group'>
		<label for='passconf' class="col-sm-2 control-label">Confirm Password:</label>
		<div class="col-sm-4">
			<input type='password' class='form-control' name='passconf' value="" size="50"/><br/>
		</div>
	</div>

	<div class='form-group'>
		<label  class="col-sm-2 control-label" for='first_name'>First Name:</label>
		<div class="col-sm-4">
			<input type='input' class='form-control' name='first_name' value="<?php echo set_value('first_name'); ?>"/><br/>
		</div>

	</div>

	<div class='form-group'>
		<label for='surname' class="col-sm-2 control-label">Last Name:</label>
		<div class="col-sm-4">
			<input type='input' class='form-control' name='last_name' value="<?php echo set_value('last_name'); ?>"/><br/>
		</div>
	</div>

	<div class='form-group'>
		<label for='email' class="col-sm-2 control-label">Email:</label>
		<div class="col-sm-4">
			<input type='input' class='form-control' name='email' value="<?php echo set_value('email'); ?>"/><br/>
		</div>
	</div>

		<input type='submit' class='btn btn-default' name='submit' value='login' />

</form>






