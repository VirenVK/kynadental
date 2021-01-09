<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-10">
					<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['title'])){ echo $pvalue['title'];}?></h6>
				</div>
				<div class="col-sm-2 text-right">
					<a class="btn btn-sm btn-outline-secondary" href="<?php echo WEB_URL.'csclmng/allState';?>">Back</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<?php
			$attributes = array('id' => 'myform');
			echo form_open(WEB_URL.'csclmng/addState',$attributes);
			?>
				<fieldset>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
						      <label for="id_country"> Add Country <star> *</star></label>
						      <select class="form-control" name="id_country" id="id_country">
						      	<option value="">Select Country </option>
						      	<?php foreach($cscs as $csc){ ?>
						        <option value="<?php echo $csc['id']; ?>"><?php echo $csc['name']; ?> </option>
						    	<?php } ?>
						      </select>
						    </div>
						    <?php echo form_error('id_country'); ?>
						</div>
						
					    <div class="col-6">
							<div class="form-group">
						      <label for="name"> Add State <star> *</star></label>
						      <input type="text" name="name" id="name" class="form-control" placeholder="Enter state name" style="text-transform: capitalize;">
						    </div>
						    <?php echo form_error('name'); ?>
						</div>
					</div>
					<div class="">
						<button type="submit" name="submit" value="submit" class="btn pl-3 pr-3 btn-primary">Submit</button>
						<a href="<?php echo WEB_URL.'csclmng/allState';?>" class="btn pl-3 pr-3 btn-danger">Cancel</a>
					</div>
				</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
