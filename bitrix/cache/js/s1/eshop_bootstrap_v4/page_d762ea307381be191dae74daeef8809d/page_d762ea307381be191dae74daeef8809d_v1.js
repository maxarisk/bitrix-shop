
; /* Start:"a:4:{s:4:"full";s:85:"/local/components/magazin/magazin_feedback/templates/.default/script.js?1710095541812";s:6:"source";s:71:"/local/components/magazin/magazin_feedback/templates/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
document.addEventListener("DOMContentLoaded", function() {
	const form = document.forms['form_feedback'];
	const response = document.querySelector('.form_response');
	if (form && response)
	{
		form.addEventListener("submit", (event) => {
			event.preventDefault();
			const formData = new FormData(form);
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '/local/ajax/form_feedback.php',
				data: formData,
				processData: false,
				contentType: false,
				success: function (data) {
					if (data.error) {
						response.classList.add('error');
						response.innerHTML = data.error;
					}
					else if (data.success) {
						response.classList.remove('error');
						response.innerHTML = data.success;
						if (grecaptcha) {
							grecaptcha.reset();
						}
					}
				},
			});
		});
	}
});
/* End */
;; /* /local/components/magazin/magazin_feedback/templates/.default/script.js?1710095541812*/
