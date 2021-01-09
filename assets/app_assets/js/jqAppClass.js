/*
 * jqAppClass
 */
var jqAppClass = function(){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var base_url = $('meta[name="weburl"]').attr('content');
    this.methodPost = function(method_url,search_val){
    	$(".modalprocess").show();
    	$.ajax({
            type: "POST",
            url: base_url+method_url,
            data: {csrf_fnc_name:CSRF_TOKEN,'search_val':search_val},
            success: function(data){
            	$("#tbl-data").html(data);
            	$(".modalprocess").hide();
            },
            timeout: 10000,
            error:function(error,textStatus){
            	$(".modalprocess").hide();
            	if(textStatus==="timeout") {
            		$("#tbl-data").html("Please try after some time");
                 } 
            	$("#tbldata").html("Please try after some time");
            }
          });
    };
    /*
     * Cansole Log
     * */
    var applog = function(serach_val) {
        console.log(serach_val);
    };
//End    
};
