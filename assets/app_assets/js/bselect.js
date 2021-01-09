var options = {
	values: "a, b, c",
	ajax: {
		url: "ajax.php",
		type: "POST",
		dataType: "json",
		// Use "{{{q}}}" as a placeholder and Ajax Bootstrap Select will
		// automatically replace it with the value of the search query.
		data: {
			q: "{{{q}}}"
		}
	},
	locale: {
		emptyTitle: "Select and Begin Typing"
	},
	log: 3,
	preprocessData: function(data) {
		var i,
			l = data.length,
			array = [];
		if (l) {
			for (i = 0; i < l; i++) {
				array.push(
					$.extend(true, data[i], {
						text: data[i].Name,
						value: data[i].Email,
						data: {
							subtext: data[i].Email
						}
					})
				);
			}
		}
		// You must always return a valid array when processing data. The
		// data argument passed is a clone and cannot be modified directly.
		return array;
	}
};

$(".selectpicker").selectpicker().filter(".with-ajax").ajaxSelectPicker(options);
$("select").trigger("change");

function chooseSelectpicker(index, selectpicker) {
	$(selectpicker).val(index);
	$(selectpicker).selectpicker('refresh');
}
