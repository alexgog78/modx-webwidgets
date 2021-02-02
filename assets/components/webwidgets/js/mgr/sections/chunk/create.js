'use strict';

Ext.namespace('webWidgets.page.chunk');

webWidgets.page.chunk.create = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: webWidgets.config.connectorUrl,
        formpanel: 'webwidgets-formpanel-chunk',
        components: [{
            xtype: 'webwidgets-formpanel-chunk',
        }],
        recordActions: {
            create: {
                action: 'mgr/chunk/create',
            },
            close: {
                loadPage: function () {
                    MODx.loadPage('mgr/chunk', 'namespace=webwidgets')
                }
            }
        },
    });
    webWidgets.page.chunk.create.superclass.constructor.call(this, config);
};
Ext.extend(webWidgets.page.chunk.create, webWidgets.page.abstract, {
    getButtons: function (config) {
        return [
            this.getCreateButton(config),
            this.getCloseButton(config)
        ];
    }
});
Ext.reg('webwidgets-page-chunk-create', webWidgets.page.chunk.create);
