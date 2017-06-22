Ext.define('Admin.view.dashboard.RunSpeeds', {
    extend: 'Ext.panel.Panel',
    xtype: 'runspeeds',

    requires: [
        'Ext.chart.CartesianChart',
        'Ext.chart.axis.Category',
        'Ext.chart.axis.Numeric',
        'Ext.chart.series.Area',
        'Ext.chart.interactions.PanZoom'

    ],

    title: 'Run Speeds',
    ui: 'light',
    iconCls: 'x-fa fa-clock',
    headerPosition: 'bottom',

    cls: 'quick-graph-panel shadow',
    height: 130,
    layout: 'fit',

    items: [
        {
            xtype: 'cartesian',
            animation : !Ext.isIE9m && Ext.os.is.Desktop,
            constrain: true,
            constrainHeader: true,
            background: '#70bf73',
            colors: [
                '#a9d9ab'
            ],
            bind: {
                store: 'RunTimesStore'
            },
            axes: [
                {
                    type: 'category',
                    fields: [
                        'RaceID'
                    ],
                    hidden: true,
                    position: 'bottom'
                },
                {
                    type: 'numeric',
                    fields: [
                        'BestSpeed'
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
                    type: 'area',
                    style: {
                        stroke: '#FFFFFF',
                        'stroke-width': '2px'
                    },
                    useDarkerStrokeColor: false,
                    xField: 'RaceID',
                    yField: [
                        'BestSpeed'
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
