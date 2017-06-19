/*
 * File: app/view/ViewRun.js
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

Ext.define('Admin.view.ViewRun', {
    extend: 'Ext.window.Window',
    alias: 'widget.viewrun',

    requires: [
        'Admin.view.ViewRunViewModel',
        'Admin.view.ViewRunViewController',
        'Ext.toolbar.Toolbar',
        'Ext.button.Button',
        'Ext.form.Panel',
        'Ext.form.FieldSet',
        'Ext.form.field.ComboBox',
        'Ext.form.field.TextArea',
        'Ext.form.field.Hidden'
    ],

    controller: 'viewrun',
    viewModel: {
        type: 'viewrun'
    },
    height: 590,
    id: 'viewRunWindow',
    margin: 5,
    padding: 5,
    width: 652,
    title: 'View / Edit Run',

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
            id: 'viewRunForm',
            layout: 'column',
            bodyPadding: 10,
            items: [
                {
                    xtype: 'container',
                    columnWidth: 0.48,
                    items: [
                        {
                            xtype: 'fieldset',
                            title: 'Details',
                            items: [
                                {
                                    xtype: 'textfield',
                                    width: 251,
                                    fieldLabel: 'Race ID',
                                    labelWidth: 75,
                                    name: 'RaceID',
                                    readOnly: false
                                },
                                {
                                    xtype: 'textfield',
                                    width: 251,
                                    fieldLabel: 'Race Date',
                                    labelWidth: 75,
                                    name: 'RaceDate',
                                    readOnly: false
                                },
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'Team',
                                    labelWidth: 75,
                                    name: 'TeamID',
                                    readOnly: false
                                },
                                {
                                    xtype: 'combobox',
                                    fieldLabel: 'Class',
                                    labelWidth: 75,
                                    name: 'Class',
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
                },
                {
                    xtype: 'panel',
                    columnWidth: 0.04,
                    html: '&nbsp;'
                },
                {
                    xtype: 'fieldset',
                    columnWidth: 0.48,
                    title: 'Scoring',
                    items: [
                        {
                            xtype: 'textfield',
                            width: 251,
                            fieldLabel: 'Start Time',
                            labelWidth: 75,
                            name: 'StartTime',
                            readOnly: true
                        },
                        {
                            xtype: 'textfield',
                            width: 251,
                            fieldLabel: 'Time 1',
                            labelWidth: 75,
                            name: 'Time1',
                            readOnly: true
                        },
                        {
                            xtype: 'textfield',
                            width: 251,
                            fieldLabel: 'Time 2',
                            labelWidth: 75,
                            name: 'Time2',
                            readOnly: true
                        },
                        {
                            xtype: 'textfield',
                            width: 251,
                            fieldLabel: 'Time 3',
                            labelWidth: 75,
                            name: 'Time3',
                            readOnly: true
                        },
                        {
                            xtype: 'textfield',
                            width: 251,
                            fieldLabel: 'Time 4',
                            labelWidth: 75,
                            name: 'Time4',
                            readOnly: true
                        },
                        {
                            xtype: 'textfield',
                            width: 251,
                            fieldLabel: 'Finish Time',
                            labelWidth: 75,
                            name: 'FinishTime',
                            readOnly: true
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
                            id: 'ViewRunFormSession',
                            fieldLabel: 'Label',
                            name: 'SID'
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