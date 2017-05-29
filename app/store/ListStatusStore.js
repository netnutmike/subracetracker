Ext.define('Admin.store.ListStatusStore', {
    extend: 'Ext.data.Store',

    alias: 'store.ListStatusStore',
	storeId: 'ListStatusStore',

    fields: [
        'Name', 'Value'
    ],

    data: { items: [
        { Name: 'Disabled', Value: "0"},
		{ Name: 'Enabled', Value: "1"}
    ]},

    proxy: {
        type: 'memory',
        reader: {
            type: 'json',
            rootProperty: 'items'
        }
    }
});