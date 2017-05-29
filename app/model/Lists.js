
Ext.define('Admin.model.Lists', {
    extend: 'Ext.data.Model',

    fields: [
        {
            name: 'uid',
            type: 'int'
        },
        {
            name: 'Name'
        },
        {
            name: 'RestrictedTableID'
        }
    ]
});