Ext.define('Admin.view.dashboard.RunsByDay', {
    extend: 'Ext.panel.Panel',
    xtype: 'runsbyday',

    requires: [
        'Ext.chart.CartesianChart',
        'Ext.chart.axis.Category',
        'Ext.chart.axis.Numeric',
        'Ext.chart.series.Bar'
    ],

    title: 'Runs By Day',
    ui: 'light',
    iconCls: 'x-fa fa-briefcase',
    headerPosition: 'bottom',

    cls: 'quick-graph-panel shadow',
    height: 130,
    layout: 'fit',

    items: [
        {
            xtype: 'cartesian',
            animation : !Ext.isIE9m && Ext.os.is.Desktop,
            height: 75,
            background: '#8561c5',
            colors: [
                '#ffffff'
            ],
            bind: 'RunsByDayStore',
            axes: [
                {
                    type: 'category',
                    fields: [
                        'RaceDate'
                    ],
                    hidden: true,
                    position: 'bottom'
                },
                {
                    type: 'numeric',
                    fields: [
                        'cnt'
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
                    type: 'bar',
                    xField: 'RaceDate',
                    yField: [
                        'cnt'
                    ]
                }
            ],
            interactions: [
                {
                    type: 'panzoom'
                }
            ]
        }
    ]
});
