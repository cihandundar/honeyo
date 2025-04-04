$('form[method="post"]').submit(function (e) {
	var $catpcha = $(this).find('.g-recaptcha');
	var button =  $(this).find('button[type="submit"]');
	var buttonHtml =  button.html();
	function disabledButton() {
		button.prop('disabled', true);
		button.html('Gönderiliyor...');
	}
	function activatedButton() {
		button.prop('disabled', false);
		button.html(buttonHtml);
	}
	var clientID = !1;
	if ($catpcha.length) {
		disabledButton();
		Object.keys(window.___grecaptcha_cfg.clients).forEach(function (key) {
			Object.keys(window.___grecaptcha_cfg.clients[key]).forEach(function (_key) {
				if ($catpcha.is(window.___grecaptcha_cfg.clients[key][_key])) {
					clientID = key
				}
			})
		});
		if (clientID !== !1) {
			if (!grecaptcha.getResponse(clientID)) {
				e.preventDefault();
				activatedButton();
				$('.fake_error').remove();
				$catpcha.prepend('<div class="fake_error">Doğrulama gerekli !</div>')
			} else {
				$('.fake_error').remove()
			}
		}
	}
});