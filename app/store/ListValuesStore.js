
Ext.define('Admin.store.ListValuesStore', {
    extend: 'Ext.data.Store',
    alias: 'store.ListValuesStore',
    requires: [
        'Admin.model.ListValues'
    ],

    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
        	autoLoad: true,
            storeId: 'ListValuesStore',
            model: 'Admin.model.ListValues',
            proxy: {
                type: 'ajax',
                extraParams: { dataset: 'tabledata' },
                url: '/data/getjson.php',
                timeout: 60000,
                reader: {
                    type: 'json',
                    rootProperty: 'tabledata'
                }
            }
        }, cfg)]);
    }
});