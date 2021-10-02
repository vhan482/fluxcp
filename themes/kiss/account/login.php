<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2><?php echo htmlspecialchars(Flux::message('LoginHeading')) ?></h2>
<div class="row justify-content-md-center">
<div class="col-12 col-md-8">
<?php if (isset($errorMessage)): ?>
	<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($errorMessage) ?></div>
<?php else: ?>

	<?php if ($auth->actionAllowed('account', 'create')): ?>
	<p><?php printf(Flux::message('LoginPageMakeAccount'), $this->url('account', 'create')); ?></p>
	<?php endif ?>
<?php endif ?>
	<form action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="post">
		<?php if (count($serverNames) === 1): ?>
		<input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
		<?php endif ?>
		<div class="form-group">
			<label for="login_username"><?php echo htmlspecialchars(Flux::message('AccountUsernameLabel')) ?></label>
			<input class="form-control" type="text" name="username" id="login_username" value="<?php echo htmlspecialchars($params->get('username')) ?>" autocomplete="new-username" />
		</div>
		<div class="form-group">
			<label for="login_password"><?php echo htmlspecialchars(Flux::message('AccountPasswordLabel')) ?></label>
			<input class="form-control" type="password" name="password" id="login_password" autocomplete="new-password" />
		</div>
		<?php if (count($serverNames) > 1): ?>
		<div class="form-group">
			<label for="login_server"><?php echo htmlspecialchars(Flux::message('AccountServerLabel')) ?></label>
			<select class="form-control" name="server" id="login_server"<?php if (count($serverNames) === 1) echo ' disabled="disabled"' ?>>
				<?php foreach ($serverNames as $serverName): ?>
				<option value="<?php echo htmlspecialchars($serverName) ?>"><?php echo htmlspecialchars($serverName) ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<?php endif ?>
		<?php if (Flux::config('UseLoginCaptcha')): ?>
		<div class="form-group">
			<?php if (Flux::config('EnableReCaptcha')): ?>
				<label for="register_security_code"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></label>
				<div class="g-recaptcha" data-theme = "<?php echo $theme;?>" data-sitekey="<?php echo $recaptcha ?>"></div>
			<?php else: ?>
				<label for="register_security_code"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></label>
				<div class="security-code">
					<img src="<?php echo $this->url('captcha') ?>" />
				</div>
				<input class="form-control" type="text" name="security_code" id="register_security_code" />
				<div style="font-size: smaller;" class="action">
					<strong><a href="javascript:refreshSecurityCode('.security-code img')"><?php echo htmlspecialchars(Flux::message('RefreshSecurityCode')) ?></a></strong>
				</div>
			<?php endif ?>
		</div>
		<?php endif ?>
		<input class="btn btn-primary btn-block" type="submit" value="<?php echo htmlspecialchars(Flux::message('LoginButton')) ?>" />
	</form>
</div>
</div>