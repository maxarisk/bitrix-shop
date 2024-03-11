document.addEventListener("DOMContentLoaded", function() {
	const form = document.forms['sort_form'];
	if (form)
	{
		form.addEventListener("change", (event) => {
			form.submit();
		});
	}
});