<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-10">
					<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['title'])){ echo $pvalue['title'];}?></h6>
				</div>
				<div class="col-sm-2 text-right">
					<a class="btn btn-sm btn-outline-primary" href="<?php echo WEB_URL.'menu/addSubMenu';?>">Add New</a>
				</div>
			</div>
		</div>
		<?php $this->load->view('theme/message_view');?>
		<div class="card-body">
			<div class="table-responsive">			
				<select class="form-control col-sm-3" id="subMenu">
					<option value="">No Selected</option>
						<?php 
							foreach($allSubMenu as $row){ 
								echo '<option value='.$row["id_menu"].'>'.$row['name'].'</option>';
							}
						?>
				</select>
			</div>
		</div>
	</div>
	<div id="menuData"></div>
</div>
<!-- /.container-fluid -->
<script>
$('#subMenu').change(function(){
	var id = $("#subMenu").val();
	console.log(id);
  $.ajax({url: "getMenusAjax/"+id, success: function(result){
    $("#menuData").html(result);
  }});
});
</script>
