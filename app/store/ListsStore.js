
Ext.define('Admin.store.ListsStore', {
    extend: 'Ext.data.Store',
    alias: 'store.ListsStore',
    requires: [
        'Admin.model.Lists'
    ],

    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
        	autoLoad: true,
            storeId: 'ListsStore',
            model: 'Admin.model.Lists',
            proxy: {
                type: 'ajax',
                extraParams: { dataset: 'tables' },
                url: '/data/getjson.php',
                timeout: 60000,
                reader: {
                    type: 'json',
                    rootProperty: 'tables'
                }
            }
        }, cfg)]);
    }
});