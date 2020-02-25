'use strict';

WebWidgets.grid.widget = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'webwidgets-grid-widget';
    }
    Ext.applyIf(config, {
        url: WebWidgets.config.connectorUrl,
        baseParams: {
            action: 'mgr/widget/getlist'
        },
        save_action: 'mgr/widget/updatefromgrid',
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
        /*recordActions: {
            xtype: 'webwidgets-window-widget',
            action: {
                create: 'mgr/widget/create',
                update: 'mgr/widget/update',
                remove: 'mgr/widget/remove'
            }
        }*/
    });
    WebWidgets.grid.widget.superclass.constructor.call(this, config);
};
Ext.extend(WebWidgets.grid.widget, WebWidgets.grid.abstract, {

});
Ext.reg('webwidgets-grid-widget', WebWidgets.grid.widget);
