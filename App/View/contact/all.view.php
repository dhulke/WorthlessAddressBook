<?php $this->import('layout.header', $data) ?>

<div class="table-wrapper">
	<div class="table-title">
		<div class="row">
			<div class="col-xs-8"><h2>Contact <b>Details</b></h2></div>
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
						<th>Phone</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
			<?php foreach($data['contacts'] as $contact) : ?>
                    <tr>
						<td><?= $contact->firstName?></td>
						<td><?= $contact->lastName?></td>
						<td><?= $contact->phone?></td>
						<td><?= $contact->email?></td>
						<td><a
							href="<?php $this->url('/Contact/update/' . $contact->id) ?>"
							class="btn btn-primary btn-sm"> <i
								class="glyphicon glyphicon-pencil"></i>
						</a> <a
							href="<?php $this->url('/Contact/delete/' . $contact->id) ?>"
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