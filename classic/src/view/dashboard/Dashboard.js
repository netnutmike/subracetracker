Ext.define('Admin.view.dashboard.Dashboard', {
    extend: 'Ext.container.Container',
    xtype: 'admindashboard',

    requires: [
        'Ext.ux.layout.ResponsiveColumn'
    ],

    controller: 'dashboard',
    viewModel: {
        type: 'dashboard'
    },

    layout: 'responsivecolumn',
    
    listeners: {
        hide: 'onHideView'
    },

    items: [
        {
            xtype: 'runssummary',

            // 60% width when viewport is big enough,
            // 100% when viewport is small
            userCls: 'big-60 small-100'
        },
        {
            xtype: 'runspeeds',
            userCls: 'big-20 small-50'
        },
        {
            xtype: 'earnings',
            userCls: 'big-20 small-50'
        },
        {
            xtype: 'runsbyday',
            userCls: 'big-20 small-50'
        },
        {
            xtype: 'classes',
            userCls: 'big-20 small-50'
        },
        {
            xtype: 'dashleader',
            userCls: 'big-60 small-100'
        },
        {
            xtype: 'readyqueue',
            cls: 'weather-panel shadow',
            userCls: 'big-40 small-100'
        }//,
        //{
        //    xtype: 'services',
         //   userCls: 'big-40 small-100'
        //}
    ]
});
