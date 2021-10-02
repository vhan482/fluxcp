<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2><?php echo htmlspecialchars(Flux::message('AccountCreateHeading')) ?></h2>
<div class="row justify-content-md-center">
<div class="col-12 col-md-8">
	<p><?php printf(htmlspecialchars(Flux::message('AccountCreateInfo')), '<a href="'.$this->url('service', 'tos').'">'.Flux::message('AccountCreateTerms').'</a>') ?></p>

	<?php if (isset($errorMessage)): ?>
		<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($errorMessage) ?></div>
	<?php endif ?>

	<form action="<?php echo $this->url ?>" method="post">
		<?php if (count($serverNames) === 1): ?>
		<input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
		<?php endif ?>
		<?php if (count($serverNames) > 1): ?>
		<div class="form-group">
			<label for="register_server"><?php echo htmlspecialchars(Flux::message('AccountServerLabel')) ?></label>
			<select class="form-control" name="server" id="register_server"<?php if (count($serverNames) === 1) echo ' disabled="disabled"' ?>>
			<?php foreach ($serverNames as $serverName): ?>
				<option value="<?php echo htmlspecialchars($serverName) ?>"<?php if ($params->get('server') == $serverName) echo ' selected="selected"' ?>><?php echo htmlspecialchars($serverName) ?></option>
			<?php endforeach ?>
			</select>
		</div>
		<?php endif ?>
		<div class="form-group">
			<label for="register_username"><?php echo htmlspecialchars(Flux::message('AccountUsernameLabel')) ?></label>
			<input class="form-control" type="text" name="username" id="register_username" value="<?php echo htmlspecialchars($params->get('username')) ?>" />
			<small class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>
		<div class="form-group">
			<label for="register_password"><?php echo htmlspecialchars(Flux::message('AccountPasswordLabel')) ?></label>
			<input class="form-control" type="password" name="password" id="register_password" />
			<small class="form-text text-muted"><strong>Note:</strong> <?php echo sprintf("Your password must be between %d and %d characters.", Flux::config('MinPasswordLength'), Flux::config('MaxPasswordLength')) ?></small>
			<?php if (Flux::config('PasswordMinUpper') > 0): ?>
			<small class="form-text text-muted"><strong>Note:</strong> <?php echo sprintf(Flux::message('PasswordNeedUpper'), Flux::config('PasswordMinUpper')) ?></small>
			<?php endif ?><?php if (Flux::config('PasswordMinLower') > 0): ?>
			<small class="form-text text-muted"><strong>Note:</strong> <?php echo sprintf(Flux::message('PasswordNeedLower'), Flux::config('PasswordMinLower')) ?></small>
			<?php endif ?><?php if (Flux::config('PasswordMinNumber') > 0): ?>
			<small class="form-text text-muted"><strong>Note:</strong> <?php echo sprintf(Flux::message('PasswordNeedNumber'), Flux::config('PasswordMinNumber')) ?></small>
			<?php endif ?><?php if (Flux::config('PasswordMinSymbol') > 0): ?>
			<small class="form-text text-muted"><strong>Note:</strong> <?php echo sprintf(Flux::message('PasswordNeedSymbol'), Flux::config('PasswordMinSymbol')) ?></small>
			<?php endif ?><?php if (!Flux::config('AllowUserInPassword')): ?>
			<small class="form-text text-muted"><strong>Note:</strong> <?php echo Flux::message('PasswordContainsUser') ?></small>
			<?php endif ?>
		</div>
		<div class="form-group">
			<label for="register_confirm_password"><?php echo htmlspecialchars(Flux::message('AccountPassConfirmLabel')) ?></label>
			<input class="form-control" type="password" name="confirm_password" id="register_confirm_password" />
		</div>
		<div class="form-group">
			<label for="register_email_address"><?php echo htmlspecialchars(Flux::message('AccountEmailLabel')) ?></label>
			<input class="form-control" type="text" name="email_address" id="register_email_address" value="<?php echo htmlspecialchars($params->get('email_address')) ?>" />
			<?php if (Flux::config('RequireEmailConfirm')): ?>
			<small class="form-text text-muted"><strong>Note:</strong> You will need to provide a working e-mail address to confirm your account before you can log-in.</small>
			<?php endif ?>
		</div>
		<div class="form-group">
			<label for="register_email_address"><?php echo htmlspecialchars(Flux::message('AccountEmailLabel2')) ?></label>
			<input class="form-control" type="text" name="email_address2" id="register_email_address2" value="<?php echo htmlspecialchars($params->get('email_address2')) ?>" />
		</div>
		<fieldset class="form-group">
		    <div class="row">
	      		<legend class="col-form-label col-sm-2 pt-0"><?php echo htmlspecialchars(Flux::message('AccountGenderLabel')) ?></legend>
	      		<div class="col-sm-10">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" id="register_gender_m" value="M"<?php if ($params->get('gender') === 'M') echo ' checked="checked"' ?> />
						<label class="form-check-label" for="register_gender_m"><?php echo $this->genderText('M') ?></label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" id="register_gender_f" value="F"<?php if ($params->get('gender') === 'F') echo ' checked="checked"' ?> />
						<label class="form-check-label" for="register_gender_f"><?php echo $this->genderText('F') ?></label>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset class="form-group">
		    <div class="row">
	      		<legend class="col-form-label col-sm-2 pt-0"><?php echo htmlspecialchars(Flux::message('AccountBirthdateLabel')) ?></legend>
	      		<div class="col-sm-10">
	      			<div class="custom-control-inline">
	      			<?php $t = str_replace(array('<span class="date-field">', '</span>'), '', $this->dateField('birthdate',null,0)) ?>
					<?php echo preg_replace("/(\<select)/", "$1 class='form-control nowidth'", $t) ?>
	      			</div>
				</div>
			</div>
		</fieldset>
		<?php if (Flux::config('UseCaptcha')): ?>
		<fieldset class="form-group">
		    <div class="row">
	      		<legend class="col-form-label col-sm-2 pt-0"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></legend>
	      		<div class="col-sm-10">
			    	<?php if (Flux::config('EnableReCaptcha')): ?>
					<div class="g-recaptcha" data-theme = "<?php echo $theme;?>" data-sitekey="<?php echo $recaptcha ?>"></div>
					<?php else: ?>
					<div class="security-code">
						<img src="<?php echo $this->url('captcha') ?>" />
					</div>

					<input class="form-control" type="text" name="security_code" id="register_security_code" style="width: 145px;" />
					<div style="font-size: smaller;" class="action">
						<i class="fas fa-redo"></i> <strong><a href="javascript:refreshSecurityCode('.security-code img')"><?php echo htmlspecialchars(Flux::message('RefreshSecurityCode')) ?></a></strong>
					</div>
				</div>
				<?php endif ?>
			</div>
		</fieldset>
		<?php endif ?>
		<div class="form-group">
			<small class="form-text text-muted"><?php printf(htmlspecialchars(Flux::message('AccountCreateInfo2')), '<a href="'.$this->url('service', 'tos').'">'.Flux::message('AccountCreateTerms').'</a>') ?></small>
		</div>
		<input class="btn btn-primary btn-block" type="submit" value="<?php echo htmlspecialchars(Flux::message('AccountCreateButton')) ?>"></input>
	</form>
</div>
</div>