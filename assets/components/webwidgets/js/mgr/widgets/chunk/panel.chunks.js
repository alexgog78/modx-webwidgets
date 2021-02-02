'use strict';

webWidgets.panel.chunks = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'webwidgets-panel-chunks';
    }
    Ext.applyIf(config, {
        title: _('webwidgets_chunk_list')
    });
    webWidgets.panel.chunks.superclass.constructor.call(this, config);
};
Ext.extend(webWidgets.panel.chunks, webWidgets.panel.abstract, {
    getComponents: function (config) {
        return this.renderPlainPanel([
            this.getDescription(_('webwidgets_chunk_list_management')),
            this.getContent([{xtype: 'webwidgets-grid-chunk'}]),
        ]);
    }
});
Ext.reg('webwidgets-panel-chunks', webWidgets.panel.chunks);
