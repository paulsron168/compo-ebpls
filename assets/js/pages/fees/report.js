(function($) {

	$('a.get_report').on('click',function(e){
		var year = $('select[name=getyeardilg]').val(),
			quarter = $('select[name=setting_id]').val();
			window.open(baseurl+'report/get_dilg_report/'+year+'/'+quarter);
	});

	$('a.get_blgf_report').on('click',function(e){
		var year = $('select[name=getyeardilg]').val(),
			quarter = $('select[name=setting_id]').val();
			window.open(baseurl+'report/get_blgf_report/'+year+'/'+quarter);
	});
	
})(jQuery);