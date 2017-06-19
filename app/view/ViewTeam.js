/*
 * File: app/view/ViewTeam.js
 *
 * This file was generated by Sencha Architect version 4.1.2.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Ext JS 6.2.x Classic library, under independent license.
 * License of Sencha Architect does not include license for Ext JS 6.2.x Classic. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

Ext.define('Admin.view.ViewTeam', {
    extend: 'Ext.window.Window',
    alias: 'widget.viewteam',

    requires: [
        'Admin.view.ViewTeamViewModel',
        'Admin.view.ViewTeamViewController',
        'Ext.toolbar.Toolbar',
        'Ext.form.FieldSet',
        'Ext.form.Panel',
        'Ext.form.field.Hidden',
        'Ext.form.field.ComboBox',
        'Ext.form.field.TextArea',
        'Ext.tab.Panel',
        'Ext.tab.Tab',
        'Ext.grid.Panel',
        'Ext.view.Table',
        'Ext.grid.column.Number'
    ],

    controller: 'viewteam',
    viewModel: {
        type: 'viewteam'
    },
    height: 721,
    id: 'ViewTeamWindow',
    margin: 5,
    padding: 5,
    width: 718,
    title: 'View / Edit  Team',

    dockedItems: [
        {
            xtype: 'toolbar',
            dock: 'top',
            items: [
                {
                    xtype: 'button',
                    handler: 'onSaveButtonClick',
                    icon: '/images/save.png',
                    text: 'Save'
                },
                {
                    xtype: 'button',
                    handler: function(button, e) {
                        this.up('window').close();
                    },
                    icon: '/images/delete.png',
                    text: 'Cancel'
                }
            ]
        }
    ],
    items: [
        {
            xtype: 'fieldset',
            title: 'Details',
            items: [
                {
                    xtype: 'form',
                    id: 'viewTeamForm',
                    layout: 'column',
                    bodyPadding: 10,
                    items: [
                        {
                            xtype: 'hiddenfield',
                            id: 'viewTeamSession',
                            name: 'SID'
                        },
                        {
                            xtype: 'hiddenfield',
                            fieldLabel: 'Label',
                            name: 'uid'
                        },
                        {
                            xtype: 'container',
                            columnWidth: 0.56,
                            items: [
                                {
                                    xtype: 'textfield',
                                    width: 313,
                                    fieldLabel: 'Team Name',
                                    name: 'TeamName'
                                },
                                {
                                    xtype: 'textfield',
                                    width: 313,
                                    fieldLabel: 'School Name',
                                    name: 'SchoolName'
                                },
                                {
                                    xtype: 'textfield',
                                    width: 313,
                                    fieldLabel: 'Sub Name',
                                    name: 'SubName'
                                }
                            ]
                        },
                        {
                            xtype: 'container',
                            columnWidth: 0.04,
                            html: '&nbsp;'
                        },
                        {
                            xtype: 'container',
                            columnWidth: 0.4,
                            items: [
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'Lane',
                                    labelWidth: 75,
                                    name: 'Lane',
                                    displayField: 'ListItem',
                                    store: 'LaneStore',
                                    valueField: 'IntValue'
                                },
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'Class',
                                    labelWidth: 75,
                                    name: 'Class',
                                    displayField: 'ListItem',
                                    store: 'TeamClassStore',
                                    valueField: 'IntValue'
                                },
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'Status:',
                                    labelWidth: 75,
                                    name: 'Status',
                                    displayField: 'ListItem',
                                    store: 'TeamStatusStore',
                                    valueField: 'IntValue'
                                }
                            ]
                        },
                        {
                            xtype: 'container',
                            columnWidth: 1,
                            items: [
                                {
                                    xtype: 'fieldset',
                                    title: 'Notes',
                                    items: [
                                        {
                                            xtype: 'textareafield',
                                            width: 624,
                                            fieldLabel: 'Label',
                                            hideLabel: true,
                                            name: 'Notes'
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ]
        },
        {
            xtype: 'tabpanel',
            height: 240,
            scrollable: false,
            activeTab: 0,
            items: [
                {
                    xtype: 'panel',
                    layout: 'fit',
                    title: 'Team Members',
                    items: [
                        {
                            xtype: 'gridpanel',
                            scrollable: 'both',
                            store: 'TeamParticipantsStore',
                            columns: [
                                {
                                    xtype: 'gridcolumn',
                                    dataIndex: 'DiverName',
                                    text: 'Diver Name'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    dataIndex: 'StatusText',
                                    text: 'Status Text'
                                }
                            ]
                        }
                    ]
                },
                {
                    xtype: 'panel',
                    layout: 'fit',
                    title: 'Team Runs',
                    items: [
                        {
                            xtype: 'gridpanel',
                            scrollable: 'both',
                            store: 'TeamRacesStore',
                            columns: [
                                {
                                    xtype: 'numbercolumn',
                                    width: 65,
                                    dataIndex: 'RaceID',
                                    text: 'Race Id',
                                    format: '00'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    dataIndex: 'StartTime',
                                    text: 'Start Time'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    dataIndex: 'FinishTime',
                                    text: 'Finish Time'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    width: 67,
                                    dataIndex: 'Time1',
                                    text: 'Time1'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    width: 73,
                                    dataIndex: 'Time2',
                                    text: 'Time2'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    dataIndex: 'StatusText',
                                    text: 'Status Text'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    dataIndex: 'ClassText',
                                    text: 'Class Text'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    dataIndex: 'RaceDate',
                                    text: 'Race Date'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    dataIndex: 'Notes',
                                    text: 'Notes'
                                }
                            ]
                        }
                    ]
                },
                {
                    xtype: 'panel',
                    layout: 'fit',
                    title: 'Team Activity',
                    items: [
                        {
                            xtype: 'gridpanel',
                            scrollable: 'both',
                            store: 'TeamParticipantHistoryStore',
                            columns: [
                                {
                                    xtype: 'gridcolumn',
                                    width: 81,
                                    dataIndex: 'DiverID',
                                    text: 'Diver Id'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    width: 124,
                                    dataIndex: 'ParticipantName',
                                    text: 'Diver Name'
                                },
                                {
                                    xtype: 'numbercolumn',
                                    width: 67,
                                    dataIndex: 'RaceID',
                                    text: 'Run #'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    flex: 1,
                                    dataIndex: 'ActionText',
                                    text: 'Action'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    dataIndex: 'TrackedTime',
                                    text: 'Tracked Time'
                                },
                                {
                                    xtype: 'gridcolumn',
                                    dataIndex: 'Timestamp',
                                    text: 'Timestamp'
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ],
    listeners: {
        loadRecord: 'onWindowLoadRecord'
    },

    onSaveButtonClick: function(button, e, eOpts) {

    }

});