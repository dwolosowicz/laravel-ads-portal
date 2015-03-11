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

	$('select[data-select]').select2();
	$('select[name="tags[]"]').on('change', function(e) {
			$('*[data-tag]').hide();

			if(!$(this).val()) {
				return;
			}

			for(var i = 0; i < $(this).val().length; i +=1 ) {
				var text = $(this).find('option[value="' + $(this).val()[i] + '"]').text();

				$('*[data-tag="' + text + '"]').show();
			}
		}).trigger('change');

	$('button[data-create-row]').on('click', function() {
		var $this = $(this);

		var $targetContainer = $('*[data-row-container]');
		var targetTemplate = $($this.attr('data-create-row')).html();
		var $newChild = $(targetTemplate);

		$targetContainer.append($newChild);

		$('*[data-row] button[data-remove-row]').first().attr('disabled', 'disabled');
	});

	$('*[data-row-container]').on('click', 'button[data-remove-row]', function() {
		if($("*[data-row-container] *[data-row]").length > 1) {
			$(this).parents('*[data-row]').remove();
		}
	});
});