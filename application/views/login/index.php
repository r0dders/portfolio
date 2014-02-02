
<?php
//show any errors
echo validation_errors() . '<br />';

//set the form attributes
$attributes = array('class' => 'form-inline', 'role' => 'form', 'width' => '200');

//open the form
echo form_open('login', $attributes) . '<br />';

//show any errors passed from controller
echo $login_error;

?>
	<h1>Login page</h1>
	<br />
	<div class='form-group'>
		<label for='username' class='sr-only'>User Name:</label>
		<input type='input' class='form-control' name='username' value="<?php echo set_value('username'); ?>" size="50"/><br/>
	</div>
	<div class='form-group'>
		<label for='password' class='sr-only'>Password:</label>
		<input type='password' class='form-control' name='password' value="<?php echo set_value('password'); ?>" size="50"/><br/>
	</div>
		<input type='submit' class='btn btn-default' name='submit' value='login' />

</form>






