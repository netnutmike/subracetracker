
Ext.define('Admin.store.StatsStore', {
    extend: 'Ext.data.Store',
    alias: 'store.StatsStore',
    requires: [
        'Admin.model.Stats'
    ],

    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
        	autoLoad: true,
            storeId: 'StatsStore',
            model: 'Admin.model.Stats',
            proxy: {
                type: 'ajax',
                extraParams: { dataset: 'zoostats' },
                url: '/data/getjson.php',
                timeout: 60000,
                reader: {
                    type: 'json',
                    rootProperty: 'stats'
                }
            }
        }, cfg)]);
    }
});