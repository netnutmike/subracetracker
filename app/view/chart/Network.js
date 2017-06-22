Ext.define('Admin.view.chart.Network', {
    extend: 'Ext.chart.CartesianChart',
    xtype: 'chartnetwork',

    requires: [
        'Ext.chart.axis.Category',
        'Ext.chart.axis.Numeric',
        'Ext.chart.series.Line',
        'Ext.chart.interactions.PanZoom'
    ],

    animation : !Ext.isIE9m && Ext.os.is.Desktop,

    insetPadding: 0,

    axes: [
        {
            type: 'category',
            fields: [
                'Time'
            ],
            hidden: true,
            position: 'bottom'
        },
        {
            type: 'numeric',
            fields: [
                'GoodRuns',
                'BadRuns'
            ],
            grid: {
                odd: {
                    fill: '#e8e8e8'
                }
            },
            hidden: true,
            position: 'left'
        }
    ],

    series: [
        {
            type: 'line',
            colors: [
                'rgba(103, 144, 199, 0.6)'
            ],
            useDarkerStrokeColor: false,
            xField: 'Time',
            yField: [
                'GoodRuns'
            ],
            fill: true,
            smooth: true
        },
        {
            type: 'line',
            colors: [
                'rgba(238, 146, 156, 0.6)'
            ],
            useDarkerStrokeColor: false,
            xField: 'Time',
            yField: [
                'BadRuns'
            ],
            fill: true,
            smooth: true
        }
    ],

    interactions: [
        {
            type: 'panzoom'
        }
    ]
});
