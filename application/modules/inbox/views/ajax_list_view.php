<div class="table-responsive">
	<table class="table table-hover" width="100%" cellspacing="0">
		<thead>
		<tr>
			<th class="border-0">From</th>
			<th class="border-0">Subject</th>
			<th class="border-0">Attachment</th>
			<th class="border-0">Date</th>
		</tr>
		</thead>
		<tbody>
			<tr class="clickable-row" data-href='<?php echo WEB_URL.'inbox/inboxDetail'?>'>
				<td>test@gmail.com</td>
				<td>Payment Receipt</td>
				<td class="text-left">
					<i class='material-icons'>
						attachment
					</i>
				</td>
				<td>August 23,2019 09:30</td>
			</tr>
		</tbody>
	</table>
</div>
<!-- pagination start-->
<div class="row" style="margin-top: 10px;">
	<div class="col-md-12 text-left">
		<?php
		if(isset($pagination)){
			echo $pagination;
		}
		?>
	</div>
</div>
<!-- pagination end-->
<script>
	jQuery(document).ready(function($) {
		$(".clickable-row").click(function() {
			window.location = $(this).data("href");
		});
	});
</script>
