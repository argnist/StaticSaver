<?php
if (empty($_POST['id']) || empty($_POST['static_file'])) {
    echo 1;
    return;
}

switch ($_POST['type']) {
    case 'template' : $class = 'modTemplate'; break;
    case 'chunk' : $class = 'modChunk'; break;
    case 'snippet' : $class = 'modSnippet'; break;
    case 'plugin' : $class = 'modPlugin'; break;
    case 'tv' : $class = 'modTemplateVar'; break;
    default: echo 1; return; break;
}

$response = array();

$object = $modx->getObject($class, array('id:<' => $_POST['id'], 'static_file' => $_POST['static_file'], 'source' => $_POST['source']));
$response["result"] = (!empty($object) ? 1 : 0);

if (!empty($_POST['category'])) {
	$modCat = $modx->getObject('modCategory', $_POST['category']);
	$category = $modCat->category;
	$response["category"] = (!empty($category) ? $category : "");
}

header('Content-Type: application/json');
echo json_encode($response);
