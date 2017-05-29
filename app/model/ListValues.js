
Ext.define('Admin.model.ListValues', {
    extend: 'Ext.data.Model',

    fields: [
        {
            name: 'uid',
            type: 'int'
        },
        {
            name: 'ListID',
            type: 'int'
        },
        {
            name: 'ItemText'
        },
        {
            name: 'Value'
        },
        {
            name: 'ExtraStr'
        },
        {
            name: 'ExtraInt'
        },
        {
            name: 'Status',
            type: 'int'
        },
        {
            name: 'StatusText'
        }
        
    ]
});