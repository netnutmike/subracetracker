Ext.define('Admin.view.dashboard.RunsSummary', {
    extend: 'Ext.panel.Panel',
    xtype: 'runssummary',

    requires: [
        'Ext.chart.CartesianChart',
        'Ext.chart.axis.Category',
        'Ext.chart.axis.Numeric',
        'Ext.chart.series.Line',
        'Ext.chart.interactions.PanZoom',
        'Ext.ProgressBar'
    ],

    cls: 'dashboard-main-chart shadow',
    height: 280,

    bodyPadding: 15,

    title: 'Runs Summary',
    layout: {
        type: 'vbox',
        align: 'stretch'
    },

    tools: [
        {
            type: 'refresh',
            toggleValue: false,
            listeners: {
                click: 'onRefreshToggle'
            }
        }//,
        //{
        //    type: 'wrench'
        //}
    ],

    items: [
        {
            xtype: 'container',
            flex: 1,
            layout: 'fit',
            items: [
                {
                    xtype: 'runstatuschart',
                    bind: 'RunsSummaryStore'
                }
            ]
        }
    ]
});
