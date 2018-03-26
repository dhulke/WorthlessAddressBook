<?php $this->import('layout.header', $data) ?>

<div class="table-wrapper">
	<div class="table-title">
		<div class="row">
			<div class="col-xs-8"><h2>User <b>Details</b></h2></div>
			<div class="col-xs-4">
				<a href="<?php $this->url('/Contact/create')?>" class="btn btn-info add-new pull-right"><i class="glyphicon glyphicon-plus"></i> Add New</a></h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table
				class="table table-bordered table-hover table-responsive-sm table-striped">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Username</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
			<?php foreach($data['users'] as $user) : ?>
                    <tr>
						<td><?= $user->firstName?></td>
						<td><?= $user->lastName?></td>
						<td><?= $user->username?></td>
						<td><a
							href="<?php $this->url('/User/update/' . $user->id) ?>"
							class="btn btn-primary btn-sm"> <i
								class="glyphicon glyphicon-pencil"></i>
						</a> <a
							href="<?php $this->url('/User/delete/' . $user->id) ?>"
							class="btn btn-danger btn-sm"> <i
								class="glyphicon glyphicon-trash"></i>
						</a></td>
					</tr>
            <?php endforeach; ?>
			</tbody>
			</table>
		</div>
	</div>
</div>
<?php $this->import('layout.trailer', $data) ?>