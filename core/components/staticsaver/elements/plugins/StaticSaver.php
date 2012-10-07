<?php
/**
* StaticSaver plugin
*
* Copyright 2012 by Vitaly Kireev <kireevvit@gmail.com>
*
* StaticSaver is free software; you can redistribute it and/or modify it under the
* terms of the GNU General Public License as published by the Free Software
* Foundation; either version 2 of the License, or (at your option) any later
* version.
*
* StaticSaver is distributed in the hope that it will be useful, but WITHOUT ANY
* WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
* A PARTICULAR PURPOSE. See the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along with
* miniShop; if not, write to the Free Software Foundation, Inc., 59 Temple
* Place, Suite 330, Boston, MA 02111-1307 USA
*
* @package staticsaver
*/
switch ($modx->event->name)
{
    case 'OnTempFormRender':
        $config = array(
            'nameInput' => 'modx-template-templatename',
            'staticFile' => 'modx-template-static-file',
            'sourceInput' => 'modx-template-static-source',
            'source' => $modx->getOption('staticsaver.static_template_media_source'),
        );
        break;
    case 'OnChunkFormRender':
        $config = array(
            'nameInput' => 'modx-chunk-name',
            'staticFile' => 'modx-chunk-static-file',
            'sourceInput' => 'modx-chunk-static-source',
            'source' => $modx->getOption('staticsaver.static_chunk_media_source'),
        );
        break;
    case 'OnSnipFormRender':
        $config = array(
            'nameInput' => 'modx-snippet-name',
            'staticFile' => 'modx-snippet-static-file',
            'sourceInput' => 'modx-snippet-static-source',
            'source' => $modx->getOption('staticsaver.static_snippet_media_source'),
        );
        break;
    case 'OnPluginFormRender':
        $config = array(
            'nameInput' => 'modx-plugin-name',
            'staticFile' => 'modx-plugin-static-file',
            'sourceInput' => 'modx-plugin-static-source',
            'source' => $modx->getOption('staticsaver.static_plugin_media_source'),
        );
        break;
    case 'OnTVFormRender':
        $config = array(
            'nameInput' => 'modx-tv-name',
            'staticFile' => 'modx-tv-static-file',
            'sourceInput' => 'modx-tv-static-source',
            'source' => $modx->getOption('staticsaver.static_tv_media_source'),
        );
        break;
    default: $config = null;
        break;
}

if ($config)
{
    $json_config = json_encode($config);
    $modx->regClientStartupScript('<script src="/../assets/components/staticsaver/js/staticsaver.js"></script>');
    $modx->regClientStartupScript('<script>StaticSaver = new StaticSaver(' . $json_config . ')</script>');
}