<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div class="form_body">
	<span class="form_header">Обратная связь</span>
	<span class="form_response"></span>
	<form name="form_feedback" class="form_feedback">
		<div class="form_inputs">
			<input class="form_input" name="name" type="text" placeholder="Ваше имя" <?=$arParams['NAME_FIELD'] == 'Y' ? 'required' : ''?>>
			<input class="form_input" name="tel" type="tel" placeholder="Телефон" <?=$arParams['PHONE_FIELD'] == 'Y' ? 'required' : ''?>>
			<textarea class="form_input" name="question" placeholder="Ваш вопрос" <?=$arParams['QUESTION_FIELD'] == 'Y' ? 'required' : ''?>></textarea>
			<input class="form_input" name="file" type="file" <?=$arParams['FILE_FIELD'] == 'Y' ? 'required' : ''?>>
			<div class="g-recaptcha" data-sitekey="<?=RE_SITE_KEY?>"></div>
			<button class="form_submit" type="submit">Отправить</button>
		</div>
	</form>
</div>