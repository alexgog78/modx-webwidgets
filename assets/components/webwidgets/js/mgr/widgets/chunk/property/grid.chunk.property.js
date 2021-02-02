'use strict';

webWidgets.grid.chunkProperty = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'webwidgets-grid-chunkproperty';
    }
    Ext.apply(config, {
        fields: [
            'key',
            'value'
        ],
        columns: [
            this.getGridColumn('key', {header: _('webwidgets_chunk_property_key')}),
            this.getGridColumn('value', {header: _('webwidgets_chunk_property_value')}),
        ],
        editWindow: {
            xtype: 'webwidgets-window-chunkproperty',
        },
    });
    webWidgets.grid.chunkProperty.superclass.constructor.call(this, config);
};
Ext.extend(webWidgets.grid.chunkProperty, webWidgets.localGrid, {});
Ext.reg('webwidgets-grid-chunkproperty', webWidgets.grid.chunkProperty);
