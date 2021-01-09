<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-10">
					<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['title'])){ echo $pvalue['title'];}?></h6>
				</div>
				<div class="col-sm-2 text-right">
					<a class="btn btn-sm btn-outline-secondary" href="<?php echo WEB_URL.'csclmng/allCountry';?>">Back</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<?php
			$attributes = array('id' => 'myform');
			echo form_open(WEB_URL.'csclmng/addCountry', $attributes);
			?>
				<fieldset>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
						      <label for="exampleSelect1"> Add Country <star> *</star></label>
						      <input type="text" name="name" class="form-control" placeholder="Enter country name" style="text-transform: capitalize;">
						    </div>
						    <?php echo form_error('name');?>
						</div>
					</div>
					<div class="">
						<button type="submit" name="submit" value="submit" class="btn pl-3 pr-3 btn-primary">Submit</button>
						<a href="<?php echo WEB_URL.'csclmng/allCountry';?>" class="btn pl-3 pr-3 btn-danger">Cancel</a>
					</div>
				</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
