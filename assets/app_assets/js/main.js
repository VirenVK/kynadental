/*Date*/
$('.basic-date').datepicker({
	autoclose: true,
	minViewMode: 'date',
	format: 'yyyy-mm-dd',
	todayHighlight: true
});

$('#start-from-today').datepicker({
	autoclose: true,
	minViewMode: 'date',
	format: 'yyyy-mm-dd',
	todayHighlight: true,
	startDate: 'dateToday'
});

$(document).ready(function() {
	var weburl = $('meta[name="weburl"]').attr('content');
	/*On change country*/
	$(document).on("change", "#id_country", function (e) {
		var countryID = $(this).val();
		if (countryID) {
			$.get(weburl + 'ajaxctrl/getLocation?id='+countryID, function (d) {
				$('#id_state').html(d);
			});
		} else {
			$('#id_state').html('<option value="">Select State</option>');
		}
	});

	/*On change state*/
	$(document).on("change", "#id_state", function (e) {
		var stateID = $(this).val();
		if (stateID) {
			$.get(weburl + 'ajaxctrl/getLocation?id='+stateID, function (d) {
				$('#id_city').html(d);
			});
		} else {
			$('#id_city').html('<option value="">Select City</option>');
		}
	});

	/*On change country*/
	$(document).on("change", "#id_country2", function (e) {
		var countryID = $(this).val();
		if (countryID) {
			$.get(weburl + 'ajaxctrl/getLocation?id='+countryID, function (d) {
				$('#id_state2').html(d);
			});
		} else {
			$('#id_state2').html('<option value="">Select State</option>');
		}
	});

	/*On change state*/
	$(document).on("change", "#id_state2", function (e) {
		var stateID = $(this).val();
		if (stateID) {
			$.get(weburl + 'ajaxctrl/getLocation?id='+stateID, function (d) {
				$('#id_city2').html(d);
			});
		} else {
			$('#id_city2').html('<option value="">Select City</option>');
		}
	});
});

