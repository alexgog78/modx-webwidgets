'use strict';

webWidgets.window.chunkProperty = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'webwidgets-window-chunkproperty';
    }
    Ext.apply(config, {});
    webWidgets.window.chunkProperty.superclass.constructor.call(this, config);
};
Ext.extend(webWidgets.window.chunkProperty, webWidgets.window.abstract, {
    getFields: function (config) {
        return [
            this.getFormInput('key', {fieldLabel: _('webwidgets_chunk_property_key'), allowBlank: false}),
            this.getFormInput('value', {xtype: 'textarea', fieldLabel: _('webwidgets_chunk_property_value'), allowBlank: false}),
        ];
    },

    beforeSubmit: function (record) {
        return this.fp.getForm().isValid();
    },

    submit: function (close) {
        let values = this.fp.getForm().getValues();
        let store = this.grid.getStore();
        if (!this.fireEvent('beforeSubmit', values)) {
            return false;
        }
        if (this.config.record && this.config.record.key) {
            let idx = store.find('key', this.config.record.key);
            store.removeAt(idx);
            store.add(new Ext.data.Record(values));
        } else {
            store.add(new Ext.data.Record(values));
        }
        this.close();
    }
});
Ext.reg('webwidgets-window-chunkproperty', webWidgets.window.chunkProperty);
