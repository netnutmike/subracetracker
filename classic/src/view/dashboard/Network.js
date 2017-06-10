Ext.define('Admin.view.dashboard.Network', {
    extend: 'Ext.panel.Panel',
    xtype: 'network',

    requires: [
        'Ext.chart.CartesianChart',
        'Ext.chart.axis.Category',
        'Ext.chart.axis.Numeric',
        'Ext.chart.series.Line',
        'Ext.chart.interactions.PanZoom',
        'Ext.ProgressBar'
    ],

    cls: 'dashboard-main-chart shadow',
    height: 380,

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
        },
        {
            type: 'wrench'
        }
    ],

    items: [
        {
            xtype: 'container',
            flex: 1,
            layout: 'fit',
            items: [
                {
                    xtype: 'chartnetwork',
                    bind: '{networkData}'
                }
            ]
        },
        {
            xtype: 'container',
            cls: 'graph-analysis-left',
            height: 138,
            layout: {
                type: 'hbox',
                align: 'stretch'
            },
            items: [
                {
                    xtype: 'container',
                    flex: 1,
                    cls: 'dashboard-graph-analysis-left',
                    layout: {
                        type: 'vbox',
                        align: 'stretch'
                    },
                    items: [
                        {
                            xtype: 'container',
                            flex: 1,
                            padding: '10 0 10 0',
                            layout: {
                                type: 'hbox',
                                align: 'stretch'
                            },
                            items: [
                                {
                                    xtype: 'component',
                                    flex: 1,
                                    cls: 'top-info-container',
                                    html: '<div class="inner"><span class="x-fa fa-pie-chart"></span><span class="dashboard-analytics-percentage"></span>Classes: </div>',
                                    padding: '15 10 10 0'
                                },
                                {
                                    xtype: 'component',
                                    flex: 1,
                                    cls: 'top-info-container',
                                    html: '<div class="inner"><span class="x-fa fa-user"></span><span class="dashboard-analytics-percentage"> 35 </span> Total Runs</div>',
                                    padding: '15 10 10 0'
                                }
                            ]
                        },
                        {
                            xtype: 'progressbar',
                            flex: 1,
                            cls: 'left-top-text progressbar-no-text',
                            height: 3,
                            hideMode: 'offsets',
                            margin: '0 15 0 0',
                            maxHeight: 5,
                            minHeight: 3,
                            value: 0.4
                        },
                        {
                            xtype: 'component',
                            flex: 1,
                            cls: 'left-top-text',
                            html: 'Tip: For faster updates use the refresh button.',
                            padding: '15 5 5 0',
                            layout: {
                                type: 'hbox',
                                align: 'stretch'
                            }
                        }
                    ]
                },
                {
                    xtype: 'container',
                    flex: 1,
                    cls: 'graph-analysis-right',
                    margin:'15 0 0 0',
                    padding:'0 0 0 15',
                    layout: {
                        type: 'vbox',
                        align: 'stretch'
                    },
                    itemPadding:'0 0 10 0',
                    items: [
                        {
                            xtype: 'container',
                            flex: 1,
                            layout: {
                                type: 'hbox',
                                align: 'stretch'
                            },
                            padding:'0 0 10 0',
                            items: [
                                {
                                    xtype: 'component',
                                    flex: 1,
                                    cls: 'graph-analysis-right-inner-container',
                                    html: 'Successful Runs'
                                },
                                {
                                    xtype: 'chartvisitors',
                                    flex: 1,
                                    cls: 'graph-analysis-right-inner-container right-value',
                                    bind: {
                                        store: '{visitors}'
                                    }
                                }
                            ]
                        },
                        {
                            xtype: 'container',
                            flex: 1,
                            layout: {
                                type: 'hbox',
                                align: 'stretch'
                            },
                            padding:'0 0 10 0',
                            items: [
                                {
                                    xtype: 'component',
                                    flex: 1,
                                    cls: 'graph-analysis-right-inner-container',
                                    html: 'Failed Runs'
                                },
                                {
                                    xtype: 'chartbounces',
                                    flex: 1,
                                    cls: 'graph-analysis-right-inner-container right-value',
                                    bind: {
                                        store: '{bounces}'
                                    }
                                }
                            ]
                        },
                        {
                            xtype: 'container',
                            flex: 1,
                            layout: {
                                type: 'hbox',
                                align: 'stretch'
                            },
                            padding:'0 0 10 0',
                            items: [
                                {
                                    xtype: 'component',
                                    flex: 1,
                                    cls: 'graph-analysis-right-inner-container',
                                    html: 'Runs Today'
                                },
                                {
                                    xtype: 'component',
                                    flex: 1,
                                    cls: 'graph-analysis-right-inner-container right-value',
                                    html: '10'
                                }
                            ]
                        },
                        {
                            xtype: 'container',
                            flex: 1,
                            layout: {
                                type: 'hbox',
                                align: 'stretch'
                            },
                            padding:'0 0 10 0',
                            items: [
                                {
                                    xtype: 'component',
                                    flex: 1,
                                    cls: 'graph-analysis-right-inner-container',
                                    html: 'Successful Teams'
                                },
                                {
                                    xtype: 'component',
                                    flex: 1,
                                    cls: 'graph-analysis-right-inner-container right-value',
                                    html: '4'
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ]
});
