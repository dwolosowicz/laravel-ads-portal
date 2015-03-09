$(function () {
	$.extend(backend, {
		get: function(key) {
			if(typeof backend[key] == 'undefined') {
				throw key + " is not defined in the Backend.";
			}

			return backend[key];
		}
	});

	$('div[data-plugin-datetimepicker]').datetimepicker({
		format: backend.get('dateFormat')
	});
});