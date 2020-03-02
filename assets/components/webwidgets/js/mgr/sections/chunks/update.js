'use strict';

Ext.namespace('WebWidgets.page.chunk');

/*Ext.onReady(function () {
    MODx.add({
        xtype: 'webwidgets-page-chunk-update',
        recordId: MODx.request.id
    });
});*/

WebWidgets.page.chunk.update = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: WebWidgets.config.connectorUrl,
        formpanel: 'webwidgets-formpanel-chunk',
        components: [{
            xtype: 'webwidgets-formpanel-chunk',
            renderTo: 'modx-panel-holder',
            recordId: config.recordId,
            record: config.record
        }]
    });
    WebWidgets.page.chunk.update.superclass.constructor.call(this, config);
};
Ext.extend(WebWidgets.page.chunk.update, WebWidgets.page.abstract, {
    getButtons: function () {
        return [
            this.renderSaveButton(),
            this.renderDeleteButton(),
            this.renderCloseButton()
        ];
    },

    renderSaveButton: function () {
        return {
            text: _('save'),
            process: 'mgr/chunk/update',
            method: 'remote',
            cls: 'primary-button',
            keys: [{
                key: MODx.config.keymap_save || 's',
                ctrl: true
            }]
        };
    },

    renderDeleteButton: function () {
        return {
            text: _('delete'),
            handler: this.delete,
            scope: this
        };
    },

    renderCloseButton: function () {
        return {
            text: _('close'),
            handler: this.close,
            scope: this
        };
    },

    delete: function () {
        MODx.msg.confirm({
            title: _('delete'),
            text: _('confirm_remove'),
            url: this.config.url,
            params: {
                action: 'mgr/chunk/remove',
                id: this.config.recordId
            },
            listeners: {
                success: {
                    fn: function (r) {
                        MODx.loadPage('mgr/chunks', 'namespace=webwidgets');
                    }, scope: this
                }
            }
        });
    },

    close: function () {
        MODx.loadPage('mgr/chunks', 'namespace=webwidgets')
    }
});
Ext.reg('webwidgets-page-chunk-update', WebWidgets.page.chunk.update);
