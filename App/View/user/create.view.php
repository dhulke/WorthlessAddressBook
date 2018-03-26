<?php $this->import('layout.header', $data) ?>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form method="POST" action="<?php !empty($data['user']) ? $this->url('/User/update') : $this->url('/User/create') ?>">
			<p class="h4 text-center mb-4"><?= !empty($data['user']) ? 'Update User' : 'Sign up' ?></p>

			<input type="hidden" name="id" value="<?= !empty($data['user']->id) ? $data['user']->id : '' ?>" />

			<!-- Default input name -->
			<label for="firstname" class="grey-text">First Name</label>
			<input type="text" id="firstname" class="form-control" name="first_name" value="<?= !empty($data['user']->firstName) ? $data['user']->firstName : '' ?>"> <br>

			<!-- Default input email -->
			<label for="lastname" class="grey-text">Last Name</label>
			<input type="text" id="lastname" class="form-control" name="last_name" value="<?= !empty($data['user']->lastName) ? $data['user']->lastName : '' ?>"> <br>

			<!-- Default input email -->
			<label for="username" class="grey-text">Username</label> 
			<input type="text" id="username" class="form-control" name="username" value="<?= !empty($data['user']->username) ? $data['user']->username : '' ?>" <?= !empty($data['user']->username) ? 'readonly' : '' ?>> <br>

			<!-- Default input password -->
			<label for="password" class="grey-text">Your password</label> 
			<input type="password" id="password" class="form-control" name="password"> <br>

			<div class="text-center mt-4">
				<button class="btn btn-primary" type="submit">Submit</button>
			</div>
		</form>
	</div>
</div>
<?php $this->import('layout.trailer', $data) ?>