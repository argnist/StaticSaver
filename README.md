## StaticSaver

StaticSaver is a plugin for MODx Revolution that automatically sets up the name of file and media 
source of element (template, chunk, snippet, TV or plugin) when wanting 
to make this element be static.

## Configuration

You can create different Media Sources for different elements. For example,
create Media Source with name "Templates" and path something like 
"{core_path}/elements/templates/". The id of new Media Source is 2.
Now follow to System -> System Settings -> File System.
Modify "static_template_media_source" to "2".
Also you can modify setting "static_file_extension", it is "php" by default.

## Information

This package do the following:
- Add plugin StaticSaver (events OnTempFormRender, OnChunkFormRender, 
OnSnipFormRender, OnTVFormRender, OnPluginFormRender);
- Add System Settings static_file_extension, static_plugin_media_source, static_chunk_media_source
static_snippet_media_source, static_template_media_source, static_tv_media_source;

## Copyright Information

StaticSaver is distributed as GPL (as MODx Revolution is), but the copyright owner
(Vitaly Kireev) grants all users of StaticSaver the ability to modify, distribute
and use StaticSaver in MODx development as they see fit, as long as attribution
is given somewhere in the distributed source of all derivative works.
