var Login = function() {
		"use strict";
		
		return { init: init };

		function init() {
			$.support.placeholder = false;
			var test = document.createElement('input');
			if('placeholder' in test) $.support.placeholder = true;
			
			if (!$.support.placeholder) {
				$('#login-form').find ('label').show();			
			}
			console.info('Login module loaded.');
			console.info(window);
		}
	}();

$(function() {
	Login.init ();
});