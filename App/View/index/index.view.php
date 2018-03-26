<?php $this->import('layout.header', $data) ?>

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">Contacts per User</div>
			<div class="panel-body">
				<div id="usercontacts" style="height: 250px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">Useless BarChart</div>
			<div class="panel-body">
				<div id="barchart" style="height: 250px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">Whatever</div>
			<div class="panel-body">
				<div id="whatever" style="height: 250px;"></div>
			</div>
		</div>
	</div>
</div>



<script>
$(function(){

    $.getJSON(url + '/Report/contactsPerUser', function(results) {
        Morris.Donut({
            element: 'usercontacts',
            data: results
        });
    });

    $.getJSON(url + '/Report/uselessData', function(results) {
        Morris.Bar({
            element: 'barchart',
            data: results,
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B']
        });
    });

    $.getJSON(url + '/Report/whatever', function(results) {
        Morris.Line({
            element: 'whatever',
            data: results,
            xkey: 'year',
            ykeys: ['value'],
            labels: ['Value']
        });
    });
    
});
</script>



<?php $this->import('layout.trailer', $data) ?>