<div class="container-fluid">
	<div class="card shadow mb-4">

		<div class="card-header">
			<div class="row">
				<div class="col-sm-8">
					<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['title'])){ echo $pvalue['title'];}?></h6>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" name="name" id="" class="form-control" value="<?php if(isset($searchVal['name'])){ echo $searchVal['name'];}?>" placeholder="Search">
						<div class="input-group-append">
							<button type="button" class="btn btn-primary pl-3 pr-3 btnPaginationSearch" id="search" value="search"> Search </button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div id="tbldata">
				<?php $this->load->view('ajax_list_view');?>
			</div>
			<?php $this->load->view('ajaxmodel/popup_model_view');?>
		</div>
	</div>
</div>
