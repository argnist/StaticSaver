<?php
/**
 * Resolve creating db tables
 *
 * @package staticsaver
 * @subpackage build
 */
if ($object->xpdo) {
	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
			$modx =& $object->xpdo;
			$modelPath = $modx->getOption('staticsaver.core_path',null,$modx->getOption('core_path').'components/staticsaver/').'model/';
			$modx->addPackage('staticsaver',$modelPath);

			$manager = $modx->getManager();

			$manager->createObjectContainer('StaticSaverItem');

			break;
		case xPDOTransport::ACTION_UPGRADE:
			break;
	}
}
return true;