<?php $this->import('layout.header', $data) ?>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form method="POST" action="<?php $this->url('/Auth/login') ?>">
			<p class="h4 text-center mb-4">Login</p>

			<!-- Default input name -->
			<label for="username" class="grey-text">Username</label>
			<input type="text" id="username" class="form-control" name="username"> <br>

			<!-- Default input email -->
			<label for="password" class="grey-text">Password</label>
			<input type="password" id="password" class="form-control" name="password"> <br>

			<div class="text-center mt-4">
				<button class="btn btn-primary" type="submit">Login</button>
			</div>
		</form>
	</div>
</div>

<?php $this->import('layout.trailer', $data) ?>