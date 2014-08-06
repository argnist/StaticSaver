var StaticSaver = function(config) {
    Ext.onReady(function(){
    	
        var nameInput = Ext.get(config.nameInput);
        var staticFile = Ext.getCmp(config.staticFile);
        var sourceInput = Ext.getCmp(config.sourceInput);
        var isStatic = Ext.getCmp(config.isStatic);
        var categoryInput = Ext.getCmp(config.categoryInput);
        
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

            if (MODx.config['staticsaver.include_category'] == "1") {
                var category = categoryInput.getRawValue();
                if (category != categoryInput.getValue() && category.toLowerCase() != "none" ) {
                    new_value = category.toLowerCase().replace(/ /g,"_") + '/' + new_value;
                }
            }
            placeholder.setValue(new_value);
        }

        if (staticFile.getValue() == '') {
            setValue(staticFile, nameInput.getAttribute('value'));
        } else {
            Ext.Ajax.request({
                url:  MODx.config['assets_url'] + 'components/staticsaver/connector.php',
                success: function(e){
                	var response = JSON.parse(e.responseText);
                	var value = response.result;
                    if (MODx.config['staticsaver.enable_rewrite'] || value == '1') {
						setValue(staticFile, nameInput.getAttribute('value'));
                    }
					var category;
                	var category_folder = "";
                	if( catval != "" ) {
                		category = response.category;
                		category_folder = category.toLowerCase().replace(/ /g,"_")+"/";
                	}
                    if (MODx.config['staticsaver.include_category'] == "1") {
                    	setValue(staticFile, category_folder+nameInput.getAttribute('value'));
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
        
        var catval = categoryInput.getValue();
        nameInput.on('keyup', function() {
        	Ext.Ajax.request({
                url:  MODx.config['assets_url'] + 'components/staticsaver/connector.php',
                success: function(e){
                	var response = JSON.parse(e.responseText);
                	var value = response.result;
                	var category;
                	var category_folder = "";
                	if( catval != "" ) {
                		category = response.category;
                		category_folder = category.toLowerCase().replace(/ /g,"_")+"/";
                	}
                    if (MODx.config['staticsaver.include_category'] == "1") {
                    	setValue(staticFile, category_folder+nameInput.getAttribute('value'));
                    }
                },
                params: {
                    action: 'check',
                    type : config.type,
                    id: MODx.request.id,
                    source: sourceInput.getValue(),
                    category: catval,
                    static_file: staticFile.getValue()
                }
            });
        });
        categoryInput.on('select', function(){
        	catval = categoryInput.getValue();
            Ext.Ajax.request({
                url:  MODx.config['assets_url'] + 'components/staticsaver/connector.php',
                success: function(e){
                	var response = JSON.parse(e.responseText);
                	var value = response.result;
                	var category;
                	var category_folder = "";
                	if( catval != "" ) {
                		category = response.category;
                		category_folder = category.toLowerCase().replace(/ /g,"_")+"/";
                	}
                    if (MODx.config['staticsaver.include_category'] == "1") {
                    	setValue(staticFile, category_folder+nameInput.getAttribute('value'));
                    }
                },
                params: {
                    action: 'check',
                    type : config.type,
                    id: MODx.request.id,
                    source: sourceInput.getValue(),
                    category: catval,
                    static_file: staticFile.getValue()
                }
            });
        });
    });
};
