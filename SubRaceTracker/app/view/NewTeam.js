/*
 * File: app/view/NewTeam.js
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

Ext.define('Admin.view.NewTeam', {
    extend: 'Ext.window.Window',
    alias: 'widget.newteam',

    requires: [
        'Admin.view.NewTeamViewModel',
        'Admin.view.NewTeamViewController',
        'Ext.toolbar.Toolbar',
        'Ext.button.Button',
        'Ext.form.Panel',
        'Ext.form.field.ComboBox',
        'Ext.form.field.TextArea',
        'Ext.form.field.Hidden'
    ],

    controller: 'newteam',
    viewModel: {
        type: 'newteam'
    },
    height: 526,
    margin: 5,
    padding: 5,
    width: 429,
    title: 'New Team',

    dockedItems: [
        {
            xtype: 'toolbar',
            dock: 'top',
            items: [
                {
                    xtype: 'button',
                    handler: 'OnSaveButtonClick',
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
            id: 'NewTeamForm',
            bodyPadding: 10,
            items: [
                {
                    xtype: 'textfield',
                    width: 388,
                    fieldLabel: 'Team Name',
                    name: 'TeamName'
                },
                {
                    xtype: 'textfield',
                    width: 388,
                    fieldLabel: 'School Name',
                    name: 'SchoolName'
                },
                {
                    xtype: 'textfield',
                    width: 388,
                    fieldLabel: 'Sub Name',
                    name: 'SubName'
                },
                {
                    xtype: 'combobox',
                    fieldLabel: 'Lane',
                    name: 'Lane',
                    displayField: 'TeamName',
                    store: 'TeamsStore',
                    valueField: 'uid'
                },
                {
                    xtype: 'combobox',
                    fieldLabel: 'Class:',
                    name: 'Class',
                    displayField: 'ListItem',
                    store: 'TeamClassStore',
                    valueField: 'IntValue'
                },
                {
                    xtype: 'combobox',
                    fieldLabel: 'Status:',
                    name: 'Status',
                    displayField: 'ListItem',
                    store: 'TeamStatusStore',
                    valueField: 'uid'
                },
                {
                    xtype: 'textareafield',
                    height: 156,
                    width: 391,
                    fieldLabel: 'Notes:',
                    name: 'Notes'
                },
                {
                    xtype: 'hiddenfield',
                    anchor: '100%',
                    id: 'NewTeamSession',
                    fieldLabel: 'Label',
                    name: 'SID'
                }
            ]
        }
    ]

});