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
	$('#seeShoppingCart').click(function(e) {
		$(this).siblings('#showPurchase').toggle(200);
	});
});

//Edit values
jQuery(document).ready(function($) {	
	//edit user data
	$('.edit-usu').click(function(e) {
		var self = $(this);
		var id = self.parent('td').parent('tr').find('td:nth-child(2)').text();
		var nombre = self.parent('td').parent('tr').find('td:nth-child(3)').text();
		var pass = self.parent('td').parent('tr').find('td:nth-child(4)').text();
		var tipo = self.parent('td').parent('tr').find('td:nth-child(5)').text();
		var modal = $('#edit_user_modal');
		modal.find('#set_idUserId').val(id);
		modal.find('#set_nameUserId').val(nombre);
		modal.find('#set_passwordUserId').val(pass);
		modal.find('#set_tipoUserId').val(tipo);
	});
	//edit category data
	$('.edit-cat').click(function(e) {
		var self = $(this);
		var id = self.parent('td').parent('tr').find('td:nth-child(2)').text();
		var nombre = self.parent('td').parent('tr').find('td:nth-child(3)').text();
		var modal = $('#edit_category_modal');
		modal.find('#set_idCategoryId').val(id);
		modal.find('#set_nameCategoryId').val(nombre);
	});
	//edit product data
	$('.edit-product').click(function(e) {
		var self = $(this);
		var id = self.parent('td').parent('tr').find('td:nth-child(2)').text();
		var nombrePro = self.parent('td').parent('tr').find('td:nth-child(4)').text();
		var cat = self.parent('td').parent('tr').find('td:nth-child(3)').text();
		var desc = self.parent('td').parent('tr').find('td:nth-child(5)').text();
		var cant = self.parent('td').parent('tr').find('td:nth-child(6)').text();
		var modal = $('#edit_product_modal');
		modal.find('#set_idProductId').val(id);
		modal.find('#set_nameProductId').val(nombrePro);
		modal.find('#set_nameCatProductId').val(cat);
		modal.find('#set_descriptionProductId').val(desc);
		modal.find('#set_amountId').val(cant);
	});
});
