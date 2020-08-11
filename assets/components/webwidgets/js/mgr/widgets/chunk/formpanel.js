'use strict';

WebWidgets.formPanel.chunk = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'webwidgets-formpanel-chunk';
    }
    Ext.apply(config, {
        //Custom settings
        //id: 'webwidgets-formpanel-chunk',
        //tabs: true,
        url: WebWidgets.config.connectorUrl,
        baseParams: {
            actionGet: 'mgr/chunk/get'
        },
        pageHeader: _('webwidgets.section.chunk'),
        panelContent: [],
    });
    WebWidgets.formPanel.chunk.superclass.constructor.call(this, config);
};
Ext.extend(WebWidgets.formPanel.chunk, WebWidgets.formPanel.abstract, {
    formInputs: {
        'id': {xtype: 'hidden'},
    },
    formInputsLeft: {
        'name': {xtype: 'textfield', fieldLabel: _('webwidgets.field.name')},
        'is_active': {xtype: 'combo-boolean', fieldLabel: _('webwidgets.field.active')},
        'template_ids': {xtype: 'textfield', fieldLabel: _('webwidgets.field.templates'), readOnly: true},
        'resource_ids': {xtype: 'textfield', fieldLabel: _('webwidgets.field.resources'), readOnly: true}
    },
    formInputsRight: {
        'description': {xtype: 'textarea', fieldLabel: _('webwidgets.field.description'), height: 239}
    },
    formInputsBottom: {
        'code_header': {xtype: Ext.ComponentMgr.isRegistered('modx-texteditor') ? 'modx-texteditor' : 'textarea', fieldLabel: _('webwidgets.field.code_header'), height: 400, mimeType: 'text/html'},
        'code_footer': {xtype: Ext.ComponentMgr.isRegistered('modx-texteditor') ? 'modx-texteditor' : 'textarea', fieldLabel: _('webwidgets.field.code_footer'), height: 400, mimeType: 'text/html'}
    },
    defaultValues: {
        is_active: 1
    },

    getContent: function () {
        var form = [
            this.renderFormPanel(this.formInputs),
            {
                layout: 'column',
                items: [{
                    columnWidth: 0.5,
                    items: this.renderFormPanel(this.formInputsLeft)
                }, {
                    columnWidth: 0.5,
                    items: this.renderFormPanel(this.formInputsRight)
                }]
            },
            this.renderFormPanel(this.formInputsBottom),
        ];
        return [
            this.renderDescription(_('webwidgets.section.chunk.management')),
            this.renderContent(form)
        ]
    },

    success: function (o) {
        if (!this.record) {
            MODx.loadPage('mgr/chunk/update', 'namespace=webwidgets&id=' + o.result.object.id);
        }
        WebWidgets.formPanel.chunk.superclass.success.call(this, o);
    }
});
Ext.reg('webwidgets-formpanel-chunk', WebWidgets.formPanel.chunk);
