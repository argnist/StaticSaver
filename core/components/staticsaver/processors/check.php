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

$object = $modx->getObject($class, array('id:<' => $_POST['id'], 'static_file' => $_POST['static_file'], 'source' => $_POST['source']));
echo !empty($object) ? 1 : 0;
