/*
 * File: app/store/ClassesSummaryStore.js
 *
 * This file was generated by Sencha Architect version 4.1.2.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Ext JS 6.2.x Classic library, under independent license.
 * License of Sencha Architect does not include license for Ext JS 6.2.x Classic. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

Ext.define('Admin.store.ClassesSummaryStore', {
    extend: 'Ext.data.Store',

    requires: [
        'Admin.model.ClassesSummary',
        'Ext.data.proxy.Ajax',
        'Ext.data.reader.Json'
    ],

    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'ClassesSummaryStore',
            autoLoad: true,
            model: 'Admin.model.ClassesSummary',
            proxy: {
                type: 'ajax',
                extraParams: {
                    dataset: 'classessummary'
                },
                url: '/data/getjson.php',
                reader: {
                    type: 'json',
                    rootProperty: 'classessummary'
                }
            }
        }, cfg)]);
    }
});