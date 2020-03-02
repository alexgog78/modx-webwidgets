'use strict';

WebWidgets.grid.chunk = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'webwidgets-grid-chunk';
    }
    Ext.applyIf(config, {
        url: WebWidgets.config.connectorUrl,
        baseParams: {
            action: 'mgr/chunk/getlist'
        },
        save_action: 'mgr/chunk/updatefromgrid',
        fields: [
            'id',
            'name',
            'description',
            'is_active',
        ],
        gridColumns: {
            'id': {header: _('id'), width: 0.05},
            'name': {header: _('webwidgets.field.name'), width: 0.2, editor: {xtype: 'textfield'}},
            'description': {header: _('webwidgets.field.description'), width: 0.7, editor: {xtype: 'textfield'}},
            'is_active': {header: _('webwidgets.field.active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: WebWidgets.renderer.boolean}
        },
        recordActions: {
            action: {
                create: 'mgr/chunk/create',
                update: 'mgr/chunk/update',
                remove: 'mgr/chunk/remove'
            }
        }
    });
    WebWidgets.grid.chunk.superclass.constructor.call(this, config);
};
Ext.extend(WebWidgets.grid.chunk, WebWidgets.grid.abstract, {
    createRecord: function (btn, e) {
        MODx.loadPage(this.recordActions.action.create, 'namespace=webwidgets');
    },

    updateRecord: function (btn, e) {
        MODx.loadPage(this.recordActions.action.update, 'namespace=webwidgets&id=' + this.menu.record.id);
    }
});
Ext.reg('webwidgets-grid-chunk', WebWidgets.grid.chunk);
