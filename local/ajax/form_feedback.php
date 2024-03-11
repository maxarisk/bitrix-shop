<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
use Bitrix\Main\Mail\Event;
CModule::IncludeModule('iblock');

$el = new CIBlockElement;

$PROP = array();
$PROP['NAME'] = $_POST['name'];
$PROP['PHONE'] = $_POST['name'];
$PROP['QUESTION'] = $_POST['question'];

$fields = array(
	"DATE_CREATE" => date("d.m.Y H:i:s"),
	"CREATED_BY" => 1,
	"IBLOCK_ID" => 4,
	"NAME" => "Сообщение с формы обратной связи",
	"ACTIVE" => "Y",
	"PROPERTY_VALUES" => $PROP,
	"PREVIEW_PICTURE" => $_FILES['file'],
);

if($el_id = $el->Add($fields))
{
	if ($_FILES['file'])
	{
		$res = CIBlockElement::GetByID($el_id); 
		if($ar_res = $res->GetNext())
		{
			$fileId = $ar_res["PREVIEW_PICTURE"];
		}
	}

	$result = Event::send(array(
		"EVENT_NAME" => "FORM_FEEDBACK",
		"LID" => "s1",
		"C_FIELDS" => array(
		   "NAME" => $_POST['name'],
		   "PHONE" => $_POST['tel'],
		   "QUESTION" => $_POST['question'],
		),
		"FILE" => array($fileId),
	));
	if($result->GetId())
		echo json_encode(['success' => 'Сообщение отправлено!']);
	else
		echo json_encode(['error' => 'Ошибка при отправке']);
}
else
	echo json_encode(['error' => 'Ошибка: ' . $el->LAST_ERROR]);
?>