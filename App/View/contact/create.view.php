<?php $this->import('layout.header', $data) ?>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form method="POST" action="<?php $this->url('/Contact/create') ?>" class="validable">
			<p class="h4 text-center mb-4">Sign up</p>
			
			<input type="hidden" name="id" value="<?= !empty($data['contact']->id) ? $data['contact']->id : '' ?>" />

			<!-- Default input name -->
			<label for="firstname" class="grey-text">First Name</label>
			<input required type="text" id="firstname" class="form-control" name="first_name" value="<?= !empty($data['contact']->firstName) ? $data['contact']->firstName : '' ?>"> <br>

			<!-- Default input email -->
			<label for="lastname" class="grey-text">Last Name</label>
			<input required type="text" id="lastname" class="form-control" name="last_name" value="<?= !empty($data['contact']->lastName) ? $data['contact']->lastName : '' ?>"> <br>

			<!-- Default input email -->
			<label for="phone" class="grey-text">Phone</label> 
			<input type="text" id="phone" class="form-control phone" name="phone" value="<?= !empty($data['contact']->phone) ? $data['contact']->phone : '' ?>"> <br>
			
			<!-- Default input email -->
			<label for="email" class="grey-text">Email</label> 
			<input type="email" id="email" class="form-control" name="email" value="<?= !empty($data['contact']->email) ? $data['contact']->email : '' ?>"> <br>

			<!-- Default input email -->
			<label for="address" class="grey-text">Address</label> 
			<input type="text" id="address" class="form-control" name="address" value="<?= !empty($data['contact']->address) ? $data['contact']->address : '' ?>"> <br>
			
			<div class="text-center mt-4">
				<button class="btn btn-primary" type="submit">Submit</button>
			</div>
		</form>
	</div>
</div>

<?php $this->import('layout.trailer', $data) ?>