/*
 * File: app/view/TeamsPanel.js
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

Ext.define('Admin.view.TeamsPanel', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.teamspanel',

    requires: [
        'Admin.view.TeamsPanelViewModel',
        'Admin.view.TeamsPanelViewController',
        'Ext.toolbar.Toolbar',
        'Ext.button.Button',
        'Ext.toolbar.Separator',
        'Ext.grid.Panel',
        'Ext.view.Table',
        'Ext.grid.column.Column'
    ],

    controller: 'teamspanel',
    viewModel: {
        type: 'teamspanel'
    },
    height: 419,
    width: 719,
    title: 'Teams',
    defaultListenerScope: true,

    dockedItems: [
        {
            xtype: 'toolbar',
            dock: 'top',
            items: [
                {
                    xtype: 'button',
                    handler: 'newTeamButtonClick',
                    icon: '/images/add.png',
                    text: 'New Team',
                    scope: 'controller'
                },
                {
                    xtype: 'tbseparator'
                },
                {
                    xtype: 'button',
                    icon: '/images/database_upload.png',
                    text: 'Upload Teams'
                },
                {
                    xtype: 'button',
                    icon: '/images/download.png',
                    text: 'Download CSV'
                }
            ]
        }
    ],
    items: [
        {
            xtype: 'gridpanel',
            store: 'TeamsStore',
            columns: [
                {
                    xtype: 'gridcolumn',
                    width: 148,
                    dataIndex: 'TeamName',
                    text: 'Team Name'
                },
                {
                    xtype: 'gridcolumn',
                    width: 158,
                    dataIndex: 'SchoolName',
                    text: 'School Name'
                },
                {
                    xtype: 'gridcolumn',
                    width: 157,
                    dataIndex: 'SubName',
                    text: 'Sub Name'
                },
                {
                    xtype: 'gridcolumn',
                    width: 125,
                    dataIndex: 'StatusText',
                    text: 'Status'
                },
                {
                    xtype: 'gridcolumn',
                    width: 70,
                    dataIndex: 'Lane',
                    text: 'Lane'
                },
                {
                    xtype: 'gridcolumn',
                    width: 129,
                    dataIndex: 'ClassText',
                    text: 'Class Text'
                },
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'Notes',
                    text: 'Notes'
                }
            ],
            listeners: {
                rowdblclick: 'onGridpanelRowDblClick',
                rowcontextmenu: 'onGridpanelRowContextMenu'
            }
        }
    ],

    onGridpanelRowDblClick: function(tableview, record, tr, rowIndex, e, eOpts) {
        Ext.create('Admin.view.ViewTeam').show();
    },

    onGridpanelRowContextMenu: function(tableview, record, tr, rowIndex, e, eOpts) {
        e.stopEvent();
        selectedvalue = record.get('uid');
        selectedrec = record;
        popup = Ext.create('Admin.view.TeamsPanelMenu');
        popup.showAt(e.getXY());
    }

});