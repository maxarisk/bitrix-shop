<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?
$arComponentParameters = array(
	"GROUPS" => array(
		"SETTINGS" => array(
			"NAME" => "Настройки компонента"
		),
	),
	"PARAMETERS" => array(
		"EMAIL" => array(
			"PARENT" => "SETTINGS",
			"NAME" => "EMAIL для отправки",
			"TYPE" => "STRING",
			"MULTIPLE" => "N",
		),
		"NAME_FIELD" => array(
			"PARENT" => "SETTINGS",
			"NAME" => "Поле 'Имя' обязательно для заполнения",
			"TYPE" => "CHECKBOX",
			"MULTIPLE" => "N",
			"DEFAULT" => "Y",
		),
		"PHONE_FIELD" => array(
			"PARENT" => "SETTINGS",
			"NAME" => "Поле 'Телефон' обязательно для заполнения",
			"TYPE" => "CHECKBOX",
			"MULTIPLE" => "N",
			"DEFAULT" => "Y",
		),
		"QUESTION_FIELD" => array(
			"PARENT" => "SETTINGS",
			"NAME" => "Поле 'Вопрос' обязательно для заполнения",
			"TYPE" => "CHECKBOX",
			"MULTIPLE" => "N",
			"DEFAULT" => "Y",
		),
		"FILE_FIELD" => array(
			"PARENT" => "SETTINGS",
			"NAME" => "Поле 'Файл' обязательно для заполнения",
			"TYPE" => "CHECKBOX",
			"MULTIPLE" => "N",
			"DEFAULT" => "Y",
		),
	)
);