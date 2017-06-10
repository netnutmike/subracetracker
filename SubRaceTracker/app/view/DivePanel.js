/*
 * File: app/view/DivePanel.js
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

Ext.define('Admin.view.DivePanel', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.divepanel',

    requires: [
        'Admin.view.DivePanelViewModel',
        'Admin.view.DivePanelViewController',
        'Ext.toolbar.Toolbar',
        'Ext.button.Button',
        'Ext.toolbar.Separator',
        'Ext.grid.Panel',
        'Ext.view.Table',
        'Ext.grid.column.Column'
    ],

    controller: 'divepanel',
    viewModel: {
        type: 'divepanel'
    },
    height: 419,
    width: 719,
    layout: 'fit',
    title: 'Dive Table',
    defaultListenerScope: true,

    dockedItems: [
        {
            xtype: 'toolbar',
            dock: 'top',
            items: [
                {
                    xtype: 'button',
                    handler: 'DiverInButtonClick',
                    icon: '/images/download.png',
                    text: 'Diver In',
                    scope: 'controller'
                },
                {
                    xtype: 'button',
                    handler: 'DiverOutButtonClick',
                    icon: '/images/up.png',
                    text: 'Diver Out',
                    scope: 'controller'
                },
                {
                    xtype: 'tbseparator'
                },
                {
                    xtype: 'button',
                    handler: 'newRunButtonClick',
                    icon: '/images/add.png',
                    text: 'New Run',
                    scope: 'controller'
                }
            ]
        }
    ],
    items: [
        {
            xtype: 'gridpanel',
            scrollable: 'both',
            title: 'In The Water',
            store: 'ParticipantsInWaterStore',
            columns: [
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'DiverID',
                    text: 'Diver #'
                },
                {
                    xtype: 'gridcolumn',
                    width: 143,
                    dataIndex: 'DiverName',
                    text: 'Diver Name'
                },
                {
                    xtype: 'gridcolumn',
                    width: 165,
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
                itemcontextmenu: 'onGridpanelItemContextMenu',
                rowdblclick: 'onGridpanelRowDblClick'
            }
        }
    ],

    onGridpanelItemContextMenu: function(dataview, record, item, index, e, eOpts) {
        e.stopEvent();
        selectedvalue = record.get('uid');
        selectedrec = record;
        popup = Ext.create('Admin.view.DivePanelMenu');
        popup.showAt(e.getXY());
    },

    onGridpanelRowDblClick: function(tableview, record, tr, rowIndex, e, eOpts) {
        Ext.create('Admin.view.ViewParticipant').show();
    }

});