var StaticSaver = function(config) {
    Ext.onReady(function(){
        
        var nameInput = Ext.get(config.nameInput);
        var staticFile = Ext.getCmp(config.staticFile);
        var sourceInput = Ext.getCmp(config.sourceInput);
        var isStatic = Ext.getCmp(config.isStatic);
        var categoryInput = Ext.getCmp(config.categoryInput);
        var filename_sanitize = MODx.config['staticsaver.filename_sanitize'] || "0";
        var filename_sanitize_search = MODx.config['staticsaver.filename_sanitize_search'] || "[^\w\.]";
        filename_sanitize_search = new RegExp(filename_sanitize_search, "gi");
        var filename_sanitize_replace = MODx.config['staticsaver.filename_sanitize_replace'] || "_";
        var filename_clean_search = new RegExp(filename_sanitize_replace+"+", "gi");
        var lastUnderscore = new RegExp('_$','i');
        
        if (!(nameInput && staticFile && sourceInput)) {
            return;
        }

        if (MODx.config['staticsaver.static_default'] == 1) {
            isStatic.setValue(true);
        }

        var setValue = function(placeholder, value) {
            var new_value = '';
            if (MODx.config['staticsaver.static_file_extension'] !== '') {
                new_value = value + '.' + MODx.config['staticsaver.static_file_extension'];
            }
            else if (MODx.config[config.fileExt] !== '') {
                new_value = value + '.' + MODx.config[config.fileExt];
            }
            placeholder.setValue(new_value);
        }

        var getRequest = function() {
            var catval = categoryInput.getValue();
            Ext.Ajax.request({
                url:  MODx.config['assets_url'] + 'components/staticsaver/connector.php',
                success: function(e){
                    var response = JSON.parse(e.responseText);
                    var value = response.result;
                    var name = nameInput.getAttribute('value').toLowerCase();
                    var name_orig = name;
                    var category;
                    var category_folder = "";
                    var rewriteFile = false;
                    var rewriteCat = false;
                    
                    if( filename_sanitize == "1" ) {
                        name = name.replace(filename_sanitize_search,filename_sanitize_replace).replace(filename_clean_search,filename_sanitize_replace);
                        name = name.replace(/^_/,'').replace(/_$/,'');
                        if( name != name_orig ) {
                        	rewriteFile = true;
                        }
                    }
                    if (MODx.config['staticsaver.enable_rewrite'] == "1" || value == "1") {
                    	rewriteFile = true;
                    }
                    if (rewriteFile) {
                    	setValue(staticFile, name);
                    }
                    
                    if( catval != "" ) {
                        category = response.category;
                        category_folder = category.toLowerCase();
                        if( filename_sanitize == "1" ) {
                            category_folder = category_folder.replace(filename_sanitize_search,filename_sanitize_replace).replace(filename_clean_search,filename_sanitize_replace);
                        	rewriteCat = true;
                        }
                        category_folder += "/";
                    }
                    if (MODx.config['staticsaver.include_category'] == "1") {
                    	rewriteCat = true;
                    }
                    
                    if (rewriteCat) { 
                    	setValue(staticFile, category_folder+name);
                    }
                },
                params: {
                    action: 'check',
                    type : config.type,
                    id: MODx.request.id,
                    source: sourceInput.getValue(),
                    category: categoryInput.getValue(),
                    static_file: staticFile.getValue()
                }
            });
        }

        if (staticFile.getValue() == '') {
            var name = nameInput.getAttribute('value').toLowerCase();
            if( filename_sanitize == "1" ) {
                name = name.replace(filename_sanitize_search,filename_sanitize_replace).replace(filename_clean_search,filename_sanitize_replace);
            }
            setValue(staticFile, name);
        }
        
        getRequest();
        
        if (sourceInput.getValue() != config.source) {
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
        }
        

        nameInput.on('keyup', function() {
            getRequest();
        });
        categoryInput.on('select', function(){
            getRequest();
        });
    });
};
