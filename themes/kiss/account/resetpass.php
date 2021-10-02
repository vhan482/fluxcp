<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2><?php echo htmlspecialchars(Flux::message('ResetPassTitle')) ?></h2>
<div class="row justify-content-md-center">
<div class="col-12 col-md-8">
	<?php if (!empty($errorMessage)): ?>
	<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($errorMessage) ?></div>
	<?php endif ?>
	<p><?php echo htmlspecialchars(Flux::message('ResetPassInfo')) ?></p>
	<p><?php echo htmlspecialchars(Flux::message('ResetPassInfo2')) ?></p>
	<form action="<?php echo $this->urlWithQs ?>" method="post">
		<?php if (count($serverNames) > 1): ?>
		<div class="form-group">
			<label for="login"><?php echo htmlspecialchars(Flux::message('ResetPassServerLabel')) ?></label>
			<select class="form-control" name="login" id="login"<?php if (count($serverNames) === 1) echo ' disabled="disabled"' ?>>
			<?php foreach ($serverNames as $serverName): ?>
				<option value="<?php echo htmlspecialchars($serverName) ?>"<?php if ($params->get('server') == $serverName) echo ' selected="selected"' ?>><?php echo htmlspecialchars($serverName) ?></option>
			<?php endforeach ?>
			</select>
			<small class="form-text text-muted"><?php echo htmlspecialchars(Flux::message('ResetPassServerInfo')) ?></small>
		</div>
		<?php endif ?>
		<div class="form-group">
			<label for="userid"><?php echo htmlspecialchars(Flux::message('ResetPassAccountLabel')) ?></label>
			<input class="form-control" type="text" name="userid" id="userid" />
			<small class="form-text text-muted"><?php echo htmlspecialchars(Flux::message('ResetPassAccountInfo')) ?></small>
		</div>
		<div class="form-group">
			<label for="email"><?php echo htmlspecialchars(Flux::message('ResetPassEmailLabel')) ?></label>
			<input class="form-control" type="text" name="email" id="email" />
			<small class="form-text text-muted"><?php echo htmlspecialchars(Flux::message('ResetPassEmailInfo')) ?></small>
		</div>
		<input class="btn btn-primary btn-block" type="submit" value="<?php echo htmlspecialchars(Flux::message('ResetPassButton')) ?>" />
	</form>
</div>
</div>
