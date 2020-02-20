'use strict';

var WebWidgets = function (config) {
    config = config || {};
    WebWidgets.superclass.constructor.call(this, config);
};
Ext.extend(WebWidgets, Ext.Component, abstractModule);
Ext.reg('webwidgets', WebWidgets);
var WebWidgets = new WebWidgets();
