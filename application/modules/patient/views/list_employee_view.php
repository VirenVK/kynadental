<!-- Begin Page Content -->
<div class="container-fluid">
	<?php
	$attributes = array('id' => 'searchForm', 'autocomplete'=>'off');
	echo form_open(WEB_URL.$post_url, $attributes);
	?>
	<input type="hidden" name="post_url" id="post_url" value="<?php echo $post_url;?>">
	<input type="hidden" id='page_num' name='page_num' value='1'>
	<div class="card shadow mb-4">
		<div class="card-header">
		  <div class="row">
			<div class="col-sm-10">
			  <h6 class="font-weight-bold text-primary"><?php if(isset($pvalue['title'])){ echo $pvalue['title'];}?></h6>
			</div>
			<!-- <div class="col-sm-2 text-right">
			  <a class="btn btn-sm btn-outline-primary" href="<?php echo WEB_URL.'employee/addEmployee';?>">Add New</a>
			</div> -->
		  </div>
		</div>
		<?php $this->load->view('theme/message_view');?>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control" value="<?php if(isset($searchVal['name'])){ echo $searchVal['name'];}?>" placeholder="Name">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" class="form-control" value="<?php if(isset($searchVal['email'])){ echo $searchVal['email'];}?>" placeholder="Email">
							</div>
						</div>
					</div>

					<div class="col-lg-12 px-0">
						<button type="button" class="btn btn-primary pl-3 pr-3 
						btnPaginationSearch" id="search" value="search"> Search </button>
						<button type="button" class="btn btn-danger pl-3 pr-3 btnPaginationSearch" id="reset" value="reset" aria-hidden="true"> Reset </button>
					</div>
				</div>
			</div>
		</div>
	  </div>
	<div class="card shadow mb-4">
		<div class="card-body">
			<div id="tbl-data">
				<?php $this->load->view('ajax_list_employee_view');?>
			</div>
			<?php $this->load->view('ajaxmodel/popup_model_view');?>
		</div>
	</div>
	<?php echo form_close();?>

</div>
<!-- /.container-fluid -->
<!-- <script>
$('.btnList').click(function(e){
  var id_emp = $(this).data('index');
  console.log(id_emp);
    $.ajax({
        url:"<?php echo base_url();?>index.php/employee/ajaxTestData",
        type:"POST",
        data:{id_employee:id_emp},
        success: function(result){
          //  var obj = $.parseJSON(result);
            console.log(result);
           // $.each(result.results,function(item){
           //     $('ul').append('<li>' + item + '</li>')
           // })
        }
    })
    $('#div_list').toggle(900)
})
</script> -->
