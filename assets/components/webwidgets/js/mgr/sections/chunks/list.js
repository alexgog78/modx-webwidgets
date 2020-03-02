'use strict';

Ext.onReady(function () {
    MODx.add({
        xtype: 'webwidgets-panel-chunks'
    });
});

WebWidgets.panel.chunks = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'webwidgets-panel-chunks';
    }
    Ext.applyIf(config, {
        pageHeader: _('webwidgets.section.chunks')
    });
    WebWidgets.panel.chunks.superclass.constructor.call(this, config);
};
Ext.extend(WebWidgets.panel.chunks, WebWidgets.panel.abstract, {
    getContent: function () {
        return [
            this.renderDescription(_('webwidgets.section.chunks.management')),
            this.renderContent([{xtype: 'webwidgets-grid-chunk'}])
        ];
    }
});
Ext.reg('webwidgets-panel-chunks', WebWidgets.panel.chunks);
