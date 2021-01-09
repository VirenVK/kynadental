<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 * Date: 4/10/19
 * Time: 11:18 AM
 */
function calculatePageNumber($page){
	$post_search['n1'] = ($page * PERPAGE_RECORDS) - PERPAGE_RECORDS;
	$post_search['n2'] = PERPAGE_RECORDS;
	return $post_search;
}
function displayPagination($total,$per_page,$page,$pclname){
	$adjacents = "2";
	$page = ($page == 0 ? 1 : $page);
	$start = ($page - 1) * $per_page;
	$prev = $page - 1;
	$next = $page + 1;
	$setLastpage = ceil($total/$per_page);
	$lpm1 = $setLastpage - 1;
	$setPaginate = "";
	$p = (($page-1)*$per_page) + 1;
	if($setLastpage > 1) {
		$setPaginate .= "<ul class='setPaginate pagination'>";
		$setPaginate .= "<li class='setPage page-item disabled'><a href='#' class='page-link '>Total Records : <b>$total</b>&nbsp;&nbsp;|&nbsp;&nbsp;Page&nbsp;<i><b>$page</b></i>&nbsp;of&nbsp;<i><b>$setLastpage</b></i>&nbsp;&nbsp;</a></li>";

		if(($page != 0) && ($page != 1)){
			$setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_1' title='First'>&laquo;</a></li>";
			$setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$prev' title='Prev'>&lsaquo;</a></li>";
		}

		if ($setLastpage < 7 + ($adjacents * 2)) {
			for ($counter = 1; $counter <= $setLastpage; $counter++) {
				if ($counter == $page)
					$setPaginate.= "<li class='page-item active'><a href='#' class='page-link current_page '>$counter</a></li>";
				else
					$setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$counter' >$counter</a></li>";
			}
		}elseif($setLastpage > 5 + ($adjacents * 2)) {
			if($page < 1 + ($adjacents * 2)){
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
					if ($counter == $page)
						$setPaginate.= "<li class='page-item active' ><a href='#' class='page-link current_page '>$counter</a></li>";
					else
						$setPaginate.= "<li class='page-item' ><a href='#' class='page-link $pclname' id='pg_$counter' >$counter</a></li>";
				}
				$setPaginate.= "<li class='dot'>...</li>";
				$setPaginate.= "<li class='page-item' ><a href='#' class='page-link $pclname' id='pg_$lpm1'>$lpm1</a></li>";
				$setPaginate.= "<li class='page-item' ><a href='#' class='page-link $pclname' id='pg_$setLastpage' >$setLastpage</a></li>";
			}elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)){
				$setPaginate.= "<li class='page-item' ><a href='#' class='page-link $pclname' id='pg_1'>1</a></li>";
				$setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_2'>2</a></li>";
				$setPaginate.= "<li class='dot'>...</li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
					if ($counter == $page)
						$setPaginate.= "<li class='page-item active' ><a href='#' class='page-link current_page '>$counter</a></li>";
					else
						$setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$counter'>$counter</a></li>";
				}
				$setPaginate.= "<li class='page-item'>..</li>";
				$setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$lpm1' >$lpm1</a></li>";
				$setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$setLastpage'>$setLastpage</a></li>";
			}else{
				$setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_1'>1</a></li>";
				$setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_2'>2</a></li>";
				$setPaginate.= "<li class='dot'>..</li>";
				for ($counter = $setLastpage - (2 + ($adjacents * 2));
					 $counter <= $setLastpage; $counter++) {
					if ($counter == $page)
						$setPaginate.= "<li class='page-item active'><a href='#' class='page-link current_page '>$counter</a></li>";
					else
						$setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$counter'>$counter</a></li>";
				}
			}
		}
		if($page < $counter - 1){
			$setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$next' title='Next'>&rsaquo;</a></li>";
			$setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$setLastpage' title='Last'>&raquo;</a></li>";
		}
		$setPaginate.= "</ul>\n";
	}
	return $setPaginate;
}
?>
