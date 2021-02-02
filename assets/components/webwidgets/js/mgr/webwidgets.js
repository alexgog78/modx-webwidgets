'use strict';

var webWidgets = function (config) {
    config = config || {};
    webWidgets.superclass.constructor.call(this, config);
};
Ext.extend(webWidgets, Ext.Component, abstractModule);
Ext.reg('webwidgets', webWidgets);
webWidgets = new webWidgets();
