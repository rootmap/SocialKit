// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 3; // min caracters to display the autocomplete
	var keyword = $('#query_string').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'themes/Suite7/ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#query_string_list').show();
				$('#query_string_list').html(data);
			}
		});
	} else {
		$('#query_string_list').hide();
	}
}
 
// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#query_string').val(item);
	// hide proposition list
	$('#query_string_list').hide();
	
	formSubmittal();
}

function formSubmittal() {
	$("form[name='UnifiedSearch']").submit();
}
