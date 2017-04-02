//Desplegables
jQuery(document).ready(function($) {
	$('#seeUsers').click(function(e) {
		$(this).siblings('#showUsers').toggle(200);
	});
	$('#seeCat').click(function(e) {
		$(this).siblings('#showCat').toggle(200);
	});
	$('#seeProduct').click(function(e) {
		$(this).siblings('#showProduct').toggle(200);
	});
});
