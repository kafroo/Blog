<?php
view('header');
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<?php
/**
 * check if there is an errors during the SignUp
 * Print the errors
 * @param string $SignUperrors
 * @param string $error
 */

if (isset($signUpErrors)) {
    foreach ($signUpErrors as $error) {?>
			<div><?php echo $error ?></div>

		<?php }}

?>
		<?php
/**
 * check if there is an errors during the SignIn
 * Print the errors
 * @param bool $LogInErrors
 * @param bool $error
 */
if (isset($LogInErrors)) {
    foreach ($LogInErrors as $error) {?>
			<div><?php echo $error ?></div>

		<?php }}

?>
		<form class="signup-form" action= "<?php echo url('/signup'); ?>" method="POST">
			<input type="text" name="first" placeholder="First Name">
			<input type="text" name="last" placeholder="Last Name">
			<input type="text" name="email" placeholder="E-Mail">
			<input type="text" name="user" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">
			<button type="submit" name="submit">SignUp</button>
		</form>
	</div>

</section>
<?php
view('footer');
?>