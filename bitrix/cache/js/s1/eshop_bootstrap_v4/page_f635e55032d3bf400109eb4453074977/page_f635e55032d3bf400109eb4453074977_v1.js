
; /* Start:"a:4:{s:4:"full";s:81:"/local/components/magazin/catalog_sort/templates/.default/script.js?1709664572444";s:6:"source";s:67:"/local/components/magazin/catalog_sort/templates/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
document.addEventListener("DOMContentLoaded", function() {
	const formSort = document.querySelector('[name="sort_form"]');
	formSort.addEventListener("change", (event) => {
		event.preventDefault();
		const formData = new FormData(formSort);
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
;; /* /local/components/magazin/catalog_sort/templates/.default/script.js?1709664572444*/
