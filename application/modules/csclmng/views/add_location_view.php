<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-10">
					<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['title'])){ echo $pvalue['title'];}?></h6>
				</div>
				<div class="col-sm-2 text-right">
					<a class="btn btn-sm btn-outline-secondary" href="<?php echo WEB_URL.'csclmng/allLocation';?>">Back</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<?php
			$attributes = array('id' => 'myform');
			echo form_open(WEB_URL.'csclmng/addLocation',$attributes);
			?>
				<fieldset>
					<div class="row address">
						<div class="col-6">
							<div class="form-group">
						      <label for="country"> Add Country <star> *</star></label>
						      <select class="form-control" name="id_country" id="country">
						        <option value=""> Select Country </option>
						        <?php foreach($cscs as $csc){?>
						        <option value="<?php echo $csc['id']; ?>"><?php echo $csc['name']; ?></option>
						       <?php } ?>
						      </select>
						    </div>
						    <?php echo form_error('id_country'); ?>
						</div>
						 
						<div class="col-6">
							<div class="form-group">
						      <label for="state"> Add State <star> *</star></label>
						      <select class="form-control" name="id_state" id="state">
						      	<option value=""> Select State </option>
						      </select>
						    </div>
						    <?php echo form_error('id_state'); ?>
						</div>
						 
						<div class="col-6">
							<div class="form-group">
						      <label for="city"> Add City <star> *</star></label>
						      <select class="form-control" name="id_city" id="city">
						      	<option value=""> Select City </option>
						      </select>
						    </div>
						    <?php echo form_error('id_city'); ?>
						</div>
						 
						<div class="col-6">
							<div class="form-group">
						      <label for="exampleSelect1"> Add Location <star> *</star></label>
						      <input type="text" name="name" class="form-control" placeholder="Enter location" style="text-transform: capitalize;">
						    </div>
						    <?php echo form_error('name'); ?>
						</div>
					</div>
					<div class="">
						<button type="submit" name="submit" value="submit" class="btn pl-3 pr-3 btn-primary"> Submit </button>
						<a href="<?php echo WEB_URL.'csclmng/allLocation';?>" class="btn pl-3 pr-3 btn-danger">Cancel</a>
					</div>
				</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
	    $('body').on('change','#country', function(){
	        var countryID = $(this).val();
	        var $this=$(this);
	        if(countryID){
	            $.ajax({
	                type:'GET',
	                url:'Csclmng/ajaxGetState',
	                dataType: 'json',
	                data:'id='+countryID,
	                success:function(html){
	                	// alert();
						console.log(html);
	                	var opt_str='<option value="">Select State</option>';

	                	$.each(html, function(i,v) {
		 				 	opt_str+='<option value="'+v.id+'">'+v.name+'</option>';
						});
		                	
	                	$this.parents('.address').find('#state').html(opt_str);
	                	
	                }
	                   
	                    // $('#city').html('<option value="">Select state first</option>'); 
	            });    
	            
	        }else{
	            $('.cscl').html('<option value="">Select country first</option>');
	            // $('#city').html('<option value="">Select state first</option>'); 
	        }
	    });

	    $('body').on('change','#state', function(){
	        var stateID = $(this).val();
	        var $this=$(this);
	        // alert();
	        if(stateID){
	            $.ajax({
	                type:'GET',
	                url:'Csclmng/ajaxGetCity',
	                dataType: 'json',
	                data:'id='+stateID,
	                success:function(html){
					console.log(html);
	                	var opt_str='<option value="">Select City</option>';

	                	$.each(html, function(i,v) {
		 				 	opt_str+='<option value="'+v.id+'">'+v.name+'</option>';
						});
		                	
						
	                	$this.parents('.address').find('#city').html(opt_str);
	                	
	                }
	                   
	                    // $('#city').html('<option value="">Select state first</option>'); 
	            });    
	            
	        }else{
	            $('.state').html('<option value="">Select State first</option>');
	            // $('#city').html('<option value="">Select state first</option>'); 
	        }
	    });
	
});
</script>
