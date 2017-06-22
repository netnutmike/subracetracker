Ext.define('Admin.view.dashboard.ReadyQueuePanel', {
    extend: 'Ext.panel.Panel',
    xtype: 'readyqueue',

    requires: [
        'Ext.grid.Panel',
        'Ext.grid.View',
        'Ext.form.field.Text',
        'Ext.button.Button',
        'Ext.selection.CheckboxModel'
    ],

    cls: 'todo-list shadow-panel',

    title: 'Waiting to Run',
    height: 320,
    bodyPadding: 15,
    layout: 'fit',
    items: [
        {
            xtype: 'gridpanel',
            cls: 'dashboard-todo-list',
            header: false,
            //hideHeaders: true,
            scroll: 'none',
            bind: {
                store: 'ReadyQueueStore'
            },
            columns: [
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'RaceID',
                    text: 'Run #',
                    width: 65
                },{
                    xtype: 'gridcolumn',
                    dataIndex: 'TeamName',
                    text: 'Team Name',
                    flex: 1
                }
            ]
        }
    ]
});
