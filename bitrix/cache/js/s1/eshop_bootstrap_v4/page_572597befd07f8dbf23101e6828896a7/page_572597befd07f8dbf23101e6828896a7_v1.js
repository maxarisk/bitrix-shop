
; /* Start:"a:4:{s:4:"full";s:81:"/local/components/magazin/catalog_sort/templates/.default/script.js?1709668335586";s:6:"source";s:67:"/local/components/magazin/catalog_sort/templates/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
document.addEventListener("DOMContentLoaded", function() {
	const form = document.forms['sort_form'];
	form.addEventListener("change", (event) => {
		event.preventDefault();
		const formData = new FormData();
		const selected = event.target.options[event.target.selectedIndex];
		formData.append('SORT_FIELD', selected.value);
		formData.append('SORT_ORDER', selected.dataset.order);
		$.ajax({
			type: 'POST',
			url: '/local/ajax/catalog_sort.php',
			data: formData,
			processData: false,
			contentType: false,
			success: function () {
				location.reload();
			},
		});
	});
});
/* End */
;; /* /local/components/magazin/catalog_sort/templates/.default/script.js?1709668335586*/
