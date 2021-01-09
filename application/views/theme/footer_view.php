</div>
<!-- End of Main Content -->
<!-- Footer -->
<!-- <footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; <?php echo CLIENT_NAME.' '.date('Y');?></span>
		</div>
	</div>
</footer> -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?php echo WEB_URL.'login/logout'?>">Logout</a>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" >
			<div id="ajx_content"></div>
		</div>
	</div>
</div>

<script src="<?php echo WEB_PATH;?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo WEB_PATH;?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo WEB_PATH;?>js/sb-admin-2.min.js"></script>

<!-- CHART -->
<script src="<?php echo WEB_PATH;?>vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo WEB_PATH;?>js/demo/chart-area-demo.js"></script>
<script src="<?php echo WEB_PATH;?>js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
<script src="<?php echo WEB_PATH;?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo WEB_PATH;?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo WEB_PATH;?>js/demo/datatables-demo.js"></script>

<!-- Select Picker -->
<script src="<?php echo WEB_PATH_APJS;?>select_picker/bootstrap-select.min.js"></script>
<script src="<?php echo WEB_PATH_APJS;?>select_picker/ajax-bootstrap-select.min.js"></script>

<!--Pagination-->
<script src="<?php echo WEB_PATH_APJS; ?>js/jqAppClass.js?v=<?php echo CSSJS_VERSION;?>"></script>
<script src="<?php echo WEB_PATH_APJS; ?>js/paginationClass.js?v=<?php echo CSSJS_VERSION;?>"></script>
<script src="<?php echo WEB_PATH_APJS; ?>js/main.js?v=<?php echo CSSJS_VERSION;?>"></script>
<script src="<?php echo WEB_PATH_APJS; ?>js/bselect.js?v=<?php echo CSSJS_VERSION;?>"></script>
<script src="<?php echo WEB_PATH;?>js/custom.js"></script>
</body>
</html>
