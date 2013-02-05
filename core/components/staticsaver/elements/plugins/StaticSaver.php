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
            'type' => 'template',
            'nameInput' => 'modx-template-templatename',
            'staticFile' => 'modx-template-static-file',
            'sourceInput' => 'modx-template-static-source',
            'categoryInput' => 'modx-template-category',
            'isStatic' => 'modx-template-static',
            'source' => $modx->getOption('staticsaver.static_template_media_source'),
            'fileExt' => 'staticsaver.static_template_file_extension',
        );
        break;
    case 'OnChunkFormRender':
        $config = array(
            'type' => 'chunk',
            'nameInput' => 'modx-chunk-name',
            'staticFile' => 'modx-chunk-static-file',
            'sourceInput' => 'modx-chunk-static-source',
            'categoryInput' => 'modx-chunk-category',
            'isStatic' => 'modx-chunk-static',
            'source' => $modx->getOption('staticsaver.static_chunk_media_source'),
            'fileExt' => 'staticsaver.static_chunk_file_extension',
        );
        break;
    case 'OnSnipFormRender':
        $config = array(
            'type' => 'snippet',
            'nameInput' => 'modx-snippet-name',
            'staticFile' => 'modx-snippet-static-file',
            'sourceInput' => 'modx-snippet-static-source',
            'categoryInput' => 'modx-snippet-category',
            'isStatic' => 'modx-snippet-static',
            'source' => $modx->getOption('staticsaver.static_snippet_media_source'),
            'fileExt' => 'staticsaver.static_snippet_file_extension',
        );
        break;
    case 'OnPluginFormRender':
        $config = array(
            'type' => 'plugin',
            'nameInput' => 'modx-plugin-name',
            'staticFile' => 'modx-plugin-static-file',
            'sourceInput' => 'modx-plugin-static-source',
            'categoryInput' => 'modx-plugin-category',
            'isStatic' => 'modx-plugin-static',
            'source' => $modx->getOption('staticsaver.static_plugin_media_source'),
            'fileExt' => 'staticsaver.static_plugin_file_extension',
        );
        break;
    case 'OnTVFormRender':
        $config = array(
            'type' => 'tv',
            'nameInput' => 'modx-tv-name',
            'staticFile' => 'modx-tv-static-file',
            'sourceInput' => 'modx-tv-static-source',
            'categoryInput' => 'modx-tv-category',
            'isStatic' => 'modx-tv-static',
            'source' => $modx->getOption('staticsaver.static_tv_media_source'),
            'fileExt' => 'staticsaver.static_tv_file_extension',
        );
        break;
    default: $config = null;
        break;
}

if ($config)
{
    $json_config = json_encode($config);
    $modx->regClientStartupScript('<script src="' . $modx->getOption('assets_url') . 'components/staticsaver/js/staticsaver.js"></script>');
    $modx->regClientStartupScript('<script>StaticSaver = new StaticSaver(' . $json_config . ');</script>', true);
}