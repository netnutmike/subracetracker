/*
 * File: app/view/ParticipantsPanel.js
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

Ext.define('Admin.view.ParticipantsPanel', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.participantspanel',

    requires: [
        'Admin.view.ParticipantsPanelViewModel',
        'Admin.view.ParticipantsPanelController',
        'Ext.toolbar.Toolbar',
        'Ext.button.Button',
        'Ext.toolbar.Separator',
        'Ext.grid.Panel',
        'Ext.view.Table',
        'Ext.grid.column.Column'
    ],

    controller: 'participantspanel',
    viewModel: {
        type: 'participantspanel'
    },
    height: 419,
    width: 719,
    title: 'Participants',
    defaultListenerScope: true,

    dockedItems: [
        {
            xtype: 'toolbar',
            dock: 'top',
            items: [
                {
                    xtype: 'button',
                    handler: 'newParticipantButtonClick',
                    icon: '/images/add.png',
                    text: 'New Participant',
                    scope: 'controller'
                },
                {
                    xtype: 'tbseparator'
                },
                {
                    xtype: 'button',
                    handler: 'uploadParticpantsButtonClicked',
                    icon: '/images/database_upload.png',
                    text: 'Upload Participants',
                    scope: 'controller'
                },
                {
                    xtype: 'button',
                    handler: 'downloadParticipantCSVButtonClicked',
                    icon: '/images/download.png',
                    text: 'Download CSV',
                    scope: 'controller'
                }
            ]
        }
    ],
    items: [
        {
            xtype: 'gridpanel',
            store: 'ParticipantsStore',
            columns: [
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'DiverID',
                    text: 'Diver Id'
                },
                {
                    xtype: 'gridcolumn',
                    width: 138,
                    dataIndex: 'DiverName',
                    text: 'Diver Name'
                },
                {
                    xtype: 'gridcolumn',
                    width: 153,
                    dataIndex: 'TeamName',
                    text: 'Team Name'
                },
                {
                    xtype: 'gridcolumn',
                    flex: 1,
                    dataIndex: 'StatusText',
                    text: 'Status Text'
                }
            ],
            listeners: {
                rowdblclick: 'RowDblClick',
                itemcontextmenu: 'onGridpanelItemContextMenu'
            }
        }
    ],

    RowDblClick: function(tableview, record, tr, rowIndex, e, eOpts) {
        Ext.create('Admin.view.ViewParticipant').show();
    },

    onGridpanelItemContextMenu: function(dataview, record, item, index, e, eOpts) {
        e.stopEvent();
        selectedvalue = record.get('uid');
        selectedrec = record;
        popup = Ext.create('Admin.view.ParticipantsPanelMenu');
        popup.showAt(e.getXY());
    }

});