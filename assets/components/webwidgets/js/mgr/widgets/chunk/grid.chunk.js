'use strict';

webWidgets.grid.chunk = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'webwidgets-grid-chunk';
    }
    Ext.applyIf(config, {
        url: webWidgets.config.connectorUrl,
        baseParams: {
            action: 'mgr/chunk/getlist'
        },
        save_action: 'mgr/chunk/updatefromgrid',
        fields: [
            'id',
            'name',
            'description',
            'sort_order',
            'is_active',
        ],
        columns: [
            this.getGridColumn('id', {header: _('id'), width: 0.05}),
            this.getGridColumn('name', {header: _('webwidgets_chunk_name'), width: 0.2, editor: {xtype: 'textfield'}}),
            this.getGridColumn('description', {header: _('webwidgets_chunk_description'), width: 0.7}),
            this.getGridColumn('is_active', {header: _('webwidgets_chunk_active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: webWidgets.renderer.boolean}),
        ],
        recordActions: {
            create: function () {
                MODx.loadPage('mgr/chunk/create', 'namespace=webwidgets');
            },
            update: function () {
                MODx.loadPage('mgr/chunk/update', 'namespace=webwidgets&id=' + this.menu.record.id);
            },
            remove: {
                action: 'mgr/chunk/remove'
            },
        },
    });
    webWidgets.grid.chunk.superclass.constructor.call(this, config);
};
Ext.extend(webWidgets.grid.chunk, webWidgets.grid.abstract, {
    getMenu: function () {
        return [{
            text: _('edit'),
            handler: this._updateRecord,
            scope: this
        }, '-', {
            text: _('delete'),
            handler: this._removeRecord,
            scope: this
        }];
    },

    getToolbar: function () {
        return [
            this.getCreateButton(),
            '->',
            this.getSearchPanel()
        ];
    },
});
Ext.reg('webwidgets-grid-chunk', webWidgets.grid.chunk);
