'use strict';

Ext.onReady(function () {
    MODx.add({
        xtype: 'webwidgets-panel-widgets'
    });
});

WebWidgets.panel.widgets = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'webwidgets-panel-widgets';
    }
    Ext.applyIf(config, {
        pageHeader: _('webwidgets.section.widgets')
    });
    WebWidgets.panel.widgets.superclass.constructor.call(this, config);
};
Ext.extend(WebWidgets.panel.widgets, WebWidgets.panel.abstract, {
    getContent: function () {
        return [
            this.renderDescription(_('webwidgets.section.widgets.management')),
            this.renderContent([{xtype: 'webwidgets-grid-widget'}])
        ];
        /*return [{
            title: _('webwidgets.tab.productwidgets'),
            items: [
                this.renderDescription(_('webwidgets.tab.productwidgets.management')),
                this.renderContent([{xtype: 'webwidgets-grid-producttab'}])
            ]
        }, {
            title: _('webwidgets.tab.categorywidgets'),
            items: [
                this.renderDescription(_('webwidgets.tab.categorywidgets.management')),
                this.renderContent([{xtype: 'webwidgets-grid-categorytab'}])
            ]
        }, {
            title: _('webwidgets.tab.settingswidgets'),
            items: [
                this.renderDescription(_('webwidgets.tab.settingswidgets.management')),
                this.renderContent([{xtype: 'webwidgets-grid-settingstab'}])
            ]
        }];*/
    }
});
Ext.reg('webwidgets-panel-widgets', WebWidgets.panel.widgets);
