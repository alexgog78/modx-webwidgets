'use strict';

Ext.namespace('webWidgets.page.chunk');

webWidgets.page.chunk.update = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: webWidgets.config.connectorUrl,
        formpanel: 'webwidgets-formpanel-chunk',
        components: [{
            xtype: 'webwidgets-formpanel-chunk',
            record: config.record,
        }],
        recordActions: {
            update: {
                action: 'mgr/chunk/update',
            },
            remove: {
                action: 'mgr/chunk/remove'
            },
            close: {
                loadPage: function () {
                    MODx.loadPage('mgr/chunk', 'namespace=webwidgets')
                }
            }
        },
    });
    webWidgets.page.chunk.update.superclass.constructor.call(this, config);
};
Ext.extend(webWidgets.page.chunk.update, webWidgets.page.abstract, {
    getButtons: function (config) {
        return [
            this.getUpdateButton(config),
            this.getDeleteButton(config),
            this.getCloseButton(config)
        ];
    }
});
Ext.reg('webwidgets-page-chunk-update', webWidgets.page.chunk.update);
