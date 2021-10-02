<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2>Accounts</h2>
<p class="toggler"><a href="javascript:toggleSearchForm()"><?php echo htmlspecialchars(Flux::message('SearchLabel')) ?></a></p>
<div class="mb-3">
<form action="<?php echo $this->url ?>" method="get">
	<?php echo $this->moduleActionFormInputs($params->get('module')) ?>
	<div class="form-group form-row mb-1">
		<label class="col-md-1 col-form-label col-form-label-sm mt-1" for="account_id"><?php echo htmlspecialchars(Flux::message('AccountIdLabel')) ?></label>
	    <div class="col-md-2 mt-1">
			<input class="form-control form-control-sm" type="text" name="account_id" id="account_id" value="<?php echo htmlspecialchars($params->get('account_id')) ?>" placeholder="<?php echo htmlspecialchars(Flux::message('AccountIdLabel')) ?>"/>
		</div>

		<label class="col-md-1 col-form-label col-form-label-sm mt-1" for="username"><?php echo htmlspecialchars(Flux::message('UsernameLabel')) ?></label>
	    <div class="col-md-2 mt-1">
			<input class="form-control form-control-sm" type="text" name="username" id="username" value="<?php echo htmlspecialchars($params->get('username')) ?>" placeholder="<?php echo htmlspecialchars(Flux::message('UsernameLabel')) ?>"/>
		</div>

		<?php if ($searchPassword): ?>
		<label class="col-md-1 col-form-label col-form-label-sm mt-1" for="password"><?php echo htmlspecialchars(Flux::message('PasswordLabel')) ?></label>
	    <div class="col-md-2 mt-1">
			<input class="form-control form-control-sm" type="text" name="password" id="password" value="<?php echo htmlspecialchars($params->get('password')) ?>" placeholder="<?php echo htmlspecialchars(Flux::message('PasswordLabel')) ?>"/>
		</div>
		<?php endif ?>

		<label class="col-md-1 col-form-label col-form-label-sm mt-1" for="email"><?php echo htmlspecialchars(Flux::message('EmailAddressLabel')) ?></label>
	    <div class="col-md-2 mt-1">
			<input class="form-control form-control-sm" type="text" name="email" id="email" value="<?php echo htmlspecialchars($params->get('email')) ?>" placeholder="<?php echo htmlspecialchars(Flux::message('EmailAddressLabel')) ?>"/>
		</div>

		<label class="col-md-1 col-form-label col-form-label-sm mt-1" for="last_ip"><?php echo htmlspecialchars(Flux::message('LastUsedIpLabel')) ?></label>
	    <div class="col-md-2 mt-1">
			<input class="form-control form-control-sm" type="text" name="last_ip" id="last_ip" value="<?php echo htmlspecialchars($params->get('last_ip')) ?>" placeholder="<?php echo htmlspecialchars(Flux::message('LastUsedIpLabel')) ?>"/>
		</div>

		<label class="col-md-1 col-form-label col-form-label-sm mt-1" for="gender"><?php echo htmlspecialchars(Flux::message('GenderLabel')) ?></label>
	    <div class="col-md-2 mt-1">
			<select class="custom-select custom-select-sm" name="gender" id="gender">
				<option value=""<?php if (!in_array($gender=$params->get('gender'), array('M', 'F'))) echo ' selected="selected"' ?>><?php echo htmlspecialchars(Flux::message('AllLabel')) ?></option>
				<option value="M"<?php if ($gender == 'M') echo ' selected="selected"' ?>><?php echo $this->genderText('M') ?></option>
				<option value="F"<?php if ($gender == 'F') echo ' selected="selected"' ?>><?php echo $this->genderText('F') ?></option>
			</select>
		</div>

		<label class="col-md-1 col-form-label col-form-label-sm mt-1" for="account_group_id_op"><?php echo htmlspecialchars(Flux::message('AccountGroupIDLabel')) ?></label>
	    <div class="col-md-1 mt-1">
			<select class="custom-select custom-select-sm" name="account_group_id_op">
				<option value="eq"<?php if (($account_group_id_op=$params->get('account_group_id_op')) == 'eq') echo ' selected="selected"' ?>>=</option>
				<option value="gt"<?php if ($account_group_id_op == 'gt') echo ' selected="selected"' ?>>&gt;</option>
				<option value="lt"<?php if ($account_group_id_op == 'lt') echo ' selected="selected"' ?>>&lt;</option>
			</select>
	    </div>
	    <div class="col-md-1 mt-1">
			<input class="form-control form-control-sm" type="text" name="account_group_id" id="account_group_id" value="<?php echo htmlspecialchars($params->get('account_group_id')) ?>" />
	    </div>

		<label class="col-md-1 col-form-label col-form-label-sm mt-1"  for="balance"><?php echo htmlspecialchars(Flux::message('CreditBalanceLabel')) ?></label>
		<div class="col-md-1 mt-1">
			<select class="custom-select custom-select-sm" name="balance_op">
				<option value="eq"<?php if (($balance_op=$params->get('balance_op')) == 'eq') echo ' selected="selected"' ?>>=</option>
				<option value="gt"<?php if ($balance_op == 'gt') echo ' selected="selected"' ?>>&gt;</option>
				<option value="lt"<?php if ($balance_op == 'lt') echo ' selected="selected"' ?>>&lt;</option>
			</select>
		</div>
	    <div class="col-md-1 mt-1">
			<input class="form-control form-control-sm" type="text" name="balance" id="balance" value="<?php echo htmlspecialchars($params->get('balance')) ?>" />
		</div>

		<label class="col-md-1 col-form-label col-form-label-sm mt-1"  for="logincount"><?php echo htmlspecialchars(Flux::message('LoginCountLabel')) ?></label>
	    <div class="col-md-1 mt-1">
			<select class="custom-select custom-select-sm" name="logincount_op">
				<option value="eq"<?php if (($logincount_op=$params->get('logincount_op')) == 'eq') echo ' selected="selected"' ?>>=</option>
				<option value="gt"<?php if ($logincount_op == 'gt') echo ' selected="selected"' ?>>&gt;</option>
				<option value="lt"<?php if ($logincount_op == 'lt') echo ' selected="selected"' ?>>&lt;</option>
			</select>
		</div>
	    <div class="col-md-1 mt-1">
	    	<input class="form-control form-control-sm" type="text" name="logincount" id="logincount" value="<?php echo htmlspecialchars($params->get('logincount')) ?>" />
		</div>

		<label class="col-md-1 col-form-label col-form-label-sm mt-1" for="account_state"><?php echo htmlspecialchars(Flux::message('AccountStateLabel')) ?></label>
	    <div class="col-md-2 mt-1">
			<select class="custom-select custom-select-sm" name="account_state" id="account_state">
				<option value=""<?php if (!($account_state=$params->get('account_state'))) echo ' selected="selected"' ?>><?php echo htmlspecialchars(Flux::message('AllLabel')) ?></option>
				<option value="normal"<?php if ($account_state == 'normal') echo ' selected="selected"' ?>><?php echo htmlspecialchars(Flux::message('AccountStateNormal')) ?></option>
				<option value="pending"<?php if ($account_state == 'pending') echo ' selected="selected"' ?>><?php echo htmlspecialchars(Flux::message('AccountStatePending')) ?></option>
				<option value="banned"<?php if ($account_state == 'banned') echo ' selected="selected"' ?>><?php echo htmlspecialchars(Flux::message('AccountStateTempBanLbl')) ?></option>
				<option value="permabanned"<?php if ($account_state == 'permabanned') echo ' selected="selected"' ?>><?php echo htmlspecialchars(Flux::message('AccountStatePermBanned')) ?></option>
			</select>
		</div>
	</div>

	<div class="form-group form-row mb-1">
		<label class="col-md-1 col-form-label col-form-label-sm mt-1" for="use_birthdate_after"><?php echo htmlspecialchars(Flux::message('BirthdateBetweenLabel')) ?></label>
	    <div class="col-md-4 mt-1 form-inline">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="use_birthdate_after" id="use_birthdate_after"<?php if ($params->get('use_birthdate_after')) echo ' checked="checked"' ?> />
			</div>
			<?php $t = str_replace(array('<span class="date-field">', '</span>', '-'), '', $this->dateField('birthdate_after')) ?>
			<?php echo preg_replace("/(\<select)/", "$1 class='custom-select custom-select-sm mr-1'", $t) ?>
			<small class="ml-2 mr-2">to</small>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="use_birthdate_before" id="use_birthdate_before"<?php if ($params->get('use_birthdate_before')) echo ' checked="checked"' ?> />
			</div>
			<?php $t = str_replace(array('<span class="date-field">', '</span>', '-'), '', $this->dateField('birthdate_before')) ?>
			<?php echo preg_replace("/(\<select)/", "$1 class='custom-select custom-select-sm mr-1'", $t) ?>
		</div>

		<label class="col-md-1 col-form-label col-form-label-sm mt-1" for="use_last_login_after"><?php echo htmlspecialchars(Flux::message('LoginBetweenLabel')) ?></label>
	    <div class="col-md-4 mt-1 form-inline">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="use_last_login_after" id="use_last_login_after"<?php if ($params->get('use_last_login_after')) echo ' checked="checked"' ?> />
			</div>
			<?php $t = str_replace(array('<span class="date-field">', '</span>', '-'), '', $this->dateField('last_login_after')) ?>
			<?php echo preg_replace("/(\<select)/", "$1 class='custom-select custom-select-sm mr-1'", $t) ?>
			<small class="ml-1 mr-2">to</small>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="use_last_login_before" id="use_last_login_before"<?php if ($params->get('use_last_login_before')) echo ' checked="checked"' ?> />
			</div>
			<?php $t = str_replace(array('<span class="date-field">', '</span>', '-'), '', $this->dateField('last_login_before')) ?>
			<?php echo preg_replace("/(\<select)/", "$1 class='custom-select custom-select-sm mr-1'", $t) ?>
		</div>

		<input class="btn btn-primary btn-sm mr-1" type="submit" value="<?php echo htmlspecialchars(Flux::message('SearchButton')) ?>" />
		<input class="btn btn-light btn-sm" type="button" value="<?php echo htmlspecialchars(Flux::message('ResetButton')) ?>" onclick="reload()" />
	</div>
</form>
</div>
<?php if ($accounts): ?>
<?php echo $paginator->infoText() ?>
<table class="horizontal-table">
	<tr>
		<th><?php echo $paginator->sortableColumn('login.account_id', Flux::message('AccountIdLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('login.userid', Flux::message('UsernameLabel')) ?></th>
		<?php if ($showPassword): ?><th><?php echo $paginator->sortableColumn('login.user_pass', Flux::message('PasswordLabel')) ?></th><?php endif ?>
		<th><?php echo $paginator->sortableColumn('login.sex', Flux::message('GenderLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('group_id', Flux::message('AccountGroupIDLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('state', Flux::message('AccountStateLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('balance', Flux::message('CreditBalanceLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('login.email', Flux::message('EmailAddressLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('logincount', Flux::message('LoginCountLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('birthdate', Flux::message('AccountBirthdateLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('lastlogin', Flux::message('LastLoginDateLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('last_ip', Flux::message('LastUsedIpLabel')) ?></th>
		<!-- <th><?php echo $paginator->sortableColumn('reg_date', 'Register Date') ?></th> -->
	</tr>
	<?php foreach ($accounts as $account): ?>
	<tr>
		<td align="right">
			<?php if ($auth->actionAllowed('account', 'view') && $auth->allowedToViewAccount): ?>
				<?php echo $this->linkToAccount($account->account_id, $account->account_id) ?>
			<?php else: ?>
				<?php echo htmlspecialchars($account->account_id) ?>
			<?php endif ?>
		</td>
		<td><?php echo htmlspecialchars($account->userid) ?></td>
		<?php if ($showPassword): ?><td><?php echo htmlspecialchars($account->user_pass) ?></td><?php endif ?>
		<td>
			<?php if ($gender = $this->genderText($account->sex)): ?>
				<?php echo htmlspecialchars($gender) ?>
			<?php else: ?>
				<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('UnknownLabel')) ?></span>
			<?php endif ?>
		</td>
		<td><?php echo (int)$account->group_id ?></td>
		<td>
			<?php if (!$account->confirmed && $account->confirm_code): ?>
				<span class="account-state state-pending">
					<?php echo htmlspecialchars(Flux::message('AccountStatePending')) ?>
				</span>
			<?php elseif (($state = $this->accountStateText($account->state)) && !$account->unban_time): ?>
				<?php echo $state ?>
			<?php elseif ($account->unban_time): ?>
				<span class="account-state state-banned">
					<?php echo htmlspecialchars(sprintf(Flux::message('AccountStateTempBanned'), date(Flux::config('DateTimeFormat'), $account->unban_time))) ?>
				</span>
			<?php else: ?>
				<span class="account-state state-unknown"><?php echo htmlspecialchars(Flux::message('UnknownLabel')) ?></span>
			<?php endif ?>
		</td>
		<td><?php echo number_format((int)$account->balance) ?></td>
		<td>
			<?php if ($account->email): ?>
				<?php echo $this->linkToAccountSearch(array('email' => $account->email), $account->email) ?>
			<?php else: ?>
				<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
			<?php endif ?>
		</td>
		<td><?php echo number_format((int)$account->logincount) ?></td>
		<td><?php echo $account->birthdate ?></td>
		<td>
			<?php if (!$account->lastlogin || $account->lastlogin <= '1000-01-01 00:00:00'): ?>
				<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NeverLabel')) ?></span>
			<?php else: ?>
				<?php echo $this->formatDateTime($account->lastlogin) ?>
			<?php endif ?>
		</td>
		<td>
			<?php if ($account->last_ip): ?>
				<?php echo $this->linkToAccountSearch(array('last_ip' => $account->last_ip), $account->last_ip) ?>
			<?php else: ?>
				<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
			<?php endif ?>
		</td>
		<!-- <td>
			<?php if (!$account->reg_date || $account->reg_date <= '1000-01-01 00:00:00'): ?>
				<span class="not-applicable">Unknown</span>
			<?php else: ?>
				<?php echo $this->formatDateTime($account->reg_date) ?>
			<?php endif ?>
		</td> -->
	</tr>
	<?php endforeach ?>
</table>
<?php echo $paginator->getHTML() ?>
<?php else: ?>
<p>
	<?php echo htmlspecialchars(Flux::message('AccountIndexNotFound')) ?>
	<a href="javascript:history.go(-1)"><?php echo htmlspecialchars(Flux::message('GoBackLabel')) ?></a>
</p>
<?php endif ?>
