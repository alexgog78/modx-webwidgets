'use strict';

Ext.namespace('WebWidgets.page.chunk');

Ext.onReady(function () {
    MODx.add({
        xtype: 'webwidgets-page-chunk-create'
    });
});

WebWidgets.page.chunk.create = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: WebWidgets.config.connectorUrl,
        formpanel: 'webwidgets-formpanel-chunk',
        components: [{
            xtype: 'webwidgets-formpanel-chunk',
            renderTo: 'modx-panel-holder'
        }]
    });
    WebWidgets.page.chunk.create.superclass.constructor.call(this, config);
};
Ext.extend(WebWidgets.page.chunk.create, WebWidgets.page.abstract, {
    getButtons: function () {
        return [
            this.renderSaveButton(),
            this.renderCloseButton()
        ];
    },

    renderSaveButton: function() {
        return {
            text: _('save'),
            process: 'mgr/chunk/create',
            method: 'remote',
            reload: true,
            cls: 'primary-button',
            keys: [{
                key: MODx.config.keymap_save || 's',
                ctrl: true
            }]
        };
    },

    renderCloseButton: function () {
        return {
            text: _('close'),
            handler: this.close,
            scope: this
        };
    },

    close: function () {
        MODx.loadPage('mgr/chunks', 'namespace=webwidgets')
    }
});
Ext.reg('webwidgets-page-chunk-create', WebWidgets.page.chunk.create);
