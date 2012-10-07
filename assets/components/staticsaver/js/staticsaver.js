var StaticSaver = function(config) {
    Ext.onReady(function(){
        var nameInput = Ext.get(config.nameInput);
        var staticFile = Ext.getCmp(config.staticFile);
        var sourceInput = Ext.getCmp(config.sourceInput);
        if (!(nameInput && staticFile && sourceInput)) {
            return;
        }
        var sourceStore = sourceInput.getStore();  
        var sources = [];
        sourceStore.load({
            callback: function(r) {
                Ext.each(r, function(item, index) {
                    sources.push(item.data.id);
                    if (item.data.id == config.source) {
                        sourceInput.setValue(config.source);
                        return false;
                    }
                    return true;
                });
            }
        });
        nameInput.on('keyup', function(){
            if (MODx.config['staticsaver.static_file_extension'] !== '') {
                staticFile.setValue(this.getAttribute('value') + '.' + MODx.config['staticsaver.static_file_extension']);
            }
        });
    });
};