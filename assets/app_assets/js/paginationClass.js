$(document).ready(function(){
	var WEBURL = $('meta[name="weburl"]').attr('content');//$("#weburl").val();
    $('.delrcrdcnfm').on('click', function(){
        var bkurl = $(this).attr("href");
        event.preventDefault();
        bootbox.confirm({
            title: "Delete Confirmation",
            message: "Do you want to delete now? This cannot be undone.",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Confirm'
                }
            },
            callback: function (result) {
                if (result) {
                    window.location = bkurl;
                } else {
                }
            }
        });
    });
    $('[data-toggle="tooltip-edit"]').tooltip();
    $('[data-toggle="tooltip-delete"]').tooltip();

    /*Create Class Object*/
    var jqObjCls = new jqAppClass();

    $(document).on("click",".btnPaginationSearch",function (e){
        e.preventDefault();

        var pageNo = $(this).attr('id').replace('pg_','');
        if($(this).attr("id") == "reset"){
            $('#searchForm input:not(#post_url,#weburl,#page_report_request,#clsId,#idCm) ').val('');
            $('#searchForm select ').each(function () {
             $(this).children().removeAttr('selected');
             $(this).children().eq(0).attr('selected','selected');
            });
            $("#page_num").val(1);
        }else if($(this).attr("id") != "search"){
            $("#page_num").val(pageNo);
        }else{
            $("#page_num").val(1);
        }
        var search_val = {};
        $('#searchForm select,#searchForm input').each(function(el){
            return search_val[$(this).attr('id')] = $(this).val()
        });
        jqObjCls.methodPost($("#post_url").val(),search_val);
    });

//End
});
