/*
 * File: app/view/Scoring.js
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

Ext.define('Admin.view.Scoring', {
    extend: 'Ext.window.Window',
    alias: 'widget.scoring',

    requires: [
        'Admin.view.ScoringViewModel',
        'Admin.view.ScoringViewController',
        'Ext.toolbar.Toolbar',
        'Ext.button.Button',
        'Ext.form.Panel',
        'Ext.form.FieldSet',
        'Ext.form.field.ComboBox',
        'Ext.form.field.Hidden',
        'Ext.form.Label',
        'Ext.form.field.TextArea'
    ],

    controller: 'scoring',
    viewModel: {
        type: 'scoring'
    },
    height: 558,
    id: 'scoringWindowID',
    margin: 5,
    padding: 5,
    width: 649,
    title: 'Run Scoring',

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
            xtype: 'form',
            id: 'scoringForm',
            layout: 'column',
            bodyPadding: 10,
            items: [
                {
                    xtype: 'container',
                    columnWidth: 0.48,
                    items: [
                        {
                            xtype: 'fieldset',
                            title: 'Scoring',
                            items: [
                                {
                                    xtype: 'textfield',
                                    width: 251,
                                    fieldLabel: 'Start Time',
                                    labelWidth: 75,
                                    name: 'Time1',
                                    readOnly: false
                                },
                                {
                                    xtype: 'textfield',
                                    width: 251,
                                    fieldLabel: 'Time 2',
                                    labelWidth: 75,
                                    name: 'Time2',
                                    readOnly: false
                                },
                                {
                                    xtype: 'textfield',
                                    width: 251,
                                    fieldLabel: 'Time 3',
                                    labelWidth: 75,
                                    name: 'Time3',
                                    readOnly: false
                                },
                                {
                                    xtype: 'textfield',
                                    width: 251,
                                    fieldLabel: 'Finish Time',
                                    labelWidth: 75,
                                    name: 'Time4',
                                    readOnly: false
                                },
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'Status',
                                    labelWidth: 75,
                                    name: 'Status',
                                    readOnly: false,
                                    displayField: 'ListItem',
                                    store: 'RunStatusStore',
                                    valueField: 'IntValue'
                                },
                                {
                                    xtype: 'hiddenfield',
                                    anchor: '100%',
                                    fieldLabel: 'Label',
                                    name: 'uid'
                                },
                                {
                                    xtype: 'hiddenfield',
                                    anchor: '100%',
                                    id: 'scoringFormSession',
                                    fieldLabel: 'Label',
                                    name: 'SID'
                                },
                                {
                                    xtype: 'hiddenfield',
                                    anchor: '100%',
                                    id: 'TeamID',
                                    fieldLabel: 'Label',
                                    name: 'TeamID'
                                }
                            ]
                        },
                        {
                            xtype: 'fieldset',
                            hidden: true,
                            id: 'TimingFieldsID',
                            title: 'Timing',
                            items: [
                                {
                                    xtype: 'container',
                                    layout: 'column',
                                    items: [
                                        {
                                            xtype: 'label',
                                            columnWidth: 0.4,
                                            html: '<p align="left"><-------------------</p>'
                                        },
                                        {
                                            xtype: 'label',
                                            columnWidth: 0.2,
                                            html: '<p align="center">2.76</p>',
                                            id: 'TotalSpeedID'
                                        },
                                        {
                                            xtype: 'label',
                                            columnWidth: 0.4,
                                            html: '<p align="right">-------------------></p>',
                                            text: ''
                                        }
                                    ]
                                },
                                {
                                    xtype: 'container',
                                    items: [
                                        {
                                            xtype: 'label',
                                            text: '|----------------------|------------|----------------------|'
                                        }
                                    ]
                                },
                                {
                                    xtype: 'container',
                                    layout: 'column',
                                    items: [
                                        {
                                            xtype: 'label',
                                            columnWidth: 0.4,
                                            html: '<p align="center">2.76</p>',
                                            id: 'Speed1ID'
                                        },
                                        {
                                            xtype: 'label',
                                            columnWidth: 0.2,
                                            html: '<p align="center">2.76</p>',
                                            id: 'Speed2ID'
                                        },
                                        {
                                            xtype: 'label',
                                            columnWidth: 0.4,
                                            html: '<p align="center">2.76</p>',
                                            id: 'Speed3ID',
                                            text: ''
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                },
                {
                    xtype: 'panel',
                    columnWidth: 0.04,
                    html: '&nbsp;'
                },
                {
                    xtype: 'container',
                    columnWidth: 0.48,
                    items: [
                        {
                            xtype: 'fieldset',
                            title: 'Details',
                            items: [
                                {
                                    xtype: 'form',
                                    bodyPadding: 10,
                                    items: [
                                        {
                                            xtype: 'textfield',
                                            width: 251,
                                            fieldLabel: 'Race ID',
                                            labelWidth: 75,
                                            name: 'RaceID',
                                            readOnly: true
                                        },
                                        {
                                            xtype: 'textfield',
                                            width: 251,
                                            fieldLabel: 'Race Date',
                                            labelWidth: 75,
                                            name: 'RaceDate',
                                            readOnly: true
                                        },
                                        {
                                            xtype: 'combobox',
                                            fieldLabel: 'Team',
                                            labelWidth: 75,
                                            name: 'TeamName',
                                            readOnly: true,
                                            store: 'TeamsStore'
                                        },
                                        {
                                            xtype: 'combobox',
                                            fieldLabel: 'Class',
                                            labelWidth: 75,
                                            name: 'ClassText',
                                            readOnly: true,
                                            store: 'ClassStore'
                                        }
                                    ]
                                }
                            ]
                        },
                        {
                            xtype: 'fieldset',
                            title: 'Notes',
                            items: [
                                {
                                    xtype: 'textareafield',
                                    anchor: '100%',
                                    height: 101,
                                    width: 242,
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
    ],
    listeners: {
        loadRecord: 'onWindowLoadRecord'
    }

});