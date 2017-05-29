

Ext.define('Admin.store.DaysStore', {
    extend: 'Ext.data.Store',

    alias: 'store.DaysStore',
	storeId: 'DaysStore',

    fields: [
        'DayName', 'Days'
    ],

    data: { items: [
        { DayName: 'Today', Days: "0"},
		{ DayName: 'Last 2 Days', Days: "2"},
		{ DayName: 'Last 7 Days', Days: "7"},
		{ DayName: 'Last 2 Weeks', Days: "14"},
		{ DayName: 'Last 4 Weeks', Days: "28"},
		{ DayName: 'Last Quarter', Days: "91"}
    ]},

    proxy: {
        type: 'memory',
        reader: {
            type: 'json',
            rootProperty: 'items'
        }
    }
});