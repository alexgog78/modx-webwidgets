'use strict';

Ext.namespace('webWidgets.page.chunk');

webWidgets.page.chunk.list = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'webwidgets-panel-chunks'
        }]
    });
    webWidgets.page.chunk.list.superclass.constructor.call(this, config);
};
Ext.extend(webWidgets.page.chunk.list, webWidgets.page.abstract, {});
Ext.reg('webwidgets-page-chunk-list', webWidgets.page.chunk.list);
