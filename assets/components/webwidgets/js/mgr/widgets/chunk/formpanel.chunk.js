'use strict';

webWidgets.formPanel.chunk = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'webwidgets-formpanel-chunk';
    }
    Ext.apply(config, {
        url: webWidgets.config.connectorUrl,
        title: config.record
            ? _('webwidgets_chunk_editing')
            : _('webwidgets_chunk_creating')
    });
    webWidgets.formPanel.chunk.superclass.constructor.call(this, config);
};
Ext.extend(webWidgets.formPanel.chunk, webWidgets.formPanel.abstract, {
    defaultValues: {
        parser_class: 'modParser',
        is_active: 1,
    },

    setRecord: function () {
        let grid = Ext.getCmp('webwidgets-grid-chunkproperty');
        let store = grid.getStore();
        store.removeAll();
        Ext.each(this.record.properties, function (item) {
            store.add(new Ext.data.Record(item));
        }, this);
        webWidgets.formPanel.chunk.superclass.setRecord.call(this);
    },

    beforeSubmit: function (o) {
        let grid = Ext.getCmp('webwidgets-grid-chunkproperty');
        let store = grid.getStore();
        let records = store.getRange();
        let properties = [];
        Ext.each(records, function (rec, idx, list) {
            properties.push(rec.data);
        }, this);
        o.form.setValues({
            properties: Ext.encode(properties)
        });
        return webWidgets.formPanel.chunk.superclass.beforeSubmit.call(this, o);
    },

    success: function (o) {
        if (!this.record) {
            MODx.loadPage('mgr/chunk/update', 'namespace=webwidgets&id=' + o.result.object.id);
        }
        return webWidgets.formPanel.chunk.superclass.success.call(this, o);
    },

    getComponents: function (config) {
        return [
            this.renderTabsPanel([{
                title: _('webwidgets_chunk_data'),
                items: this.getMainSection(config)
            }, {
                title: _('webwidgets_chunk_code'),
                items: this.getContentSection(config),
            }, {
                title: _('webwidgets_chunk_properties'),
                items: this.getPropertiesSection(config),
            }]),
        ];
    },

    getMainSection: function (config) {
        return this.getContent([
            {xtype: 'hidden', name: 'id'},
            {
                layout: 'column',
                defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                items: [{
                    columnWidth: .5,
                    layout: 'form',
                    defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                    items: [
                        this.getFormInput('name', {fieldLabel: _('webwidgets_chunk_name')}),
                        this.getFormInput('parser_class', {fieldLabel: _('webwidgets_chunk_parser_class')}),
                        this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('webwidgets_chunk_active')}),
                    ]
                }, {
                    columnWidth: .5,
                    layout: 'form',
                    defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                    items: [
                        this.getFormInput('description', {xtype: 'textarea', fieldLabel: _('webwidgets_chunk_description'), height: 170}),
                    ]
                }]
            }
        ]);
    },

    getContentSection: function (config) {
        return this.renderPlainPanel([
            this.getDescription(_('webwidgets_chunk_code_header')),
            this.getContent([
                this.getFormInput('code_header', {
                    xtype: Ext.ComponentMgr.isRegistered('modx-texteditor')
                        ? 'modx-texteditor'
                        : 'textarea',
                    mimeType: 'text/html',
                    fieldLabel: '',
                    height: 400,
                }),
            ]),
            {html: '<hr>'},
            //MODx.PanelSpacer,
            this.getDescription(_('webwidgets_chunk_code_footer')),
            this.getContent([
                this.getFormInput('code_footer', {
                    xtype: Ext.ComponentMgr.isRegistered('modx-texteditor')
                        ? 'modx-texteditor'
                        : 'textarea',
                    mimeType: 'text/html',
                    fieldLabel: '',
                    height: 400,
                }),
            ]),
        ]);
    },

    getPropertiesSection: function (config) {
        return [
            this.getDescription(_('webwidgets_chunk_properties_management')),
            this.getContent([
                {xtype: 'hidden', name: 'properties'},
                {xtype: 'webwidgets-grid-chunkproperty'},
            ])
        ];
    },
});
Ext.reg('webwidgets-formpanel-chunk', webWidgets.formPanel.chunk);
