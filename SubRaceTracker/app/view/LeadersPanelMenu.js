/*
 * File: app/view/LeadersPanelMenu.js
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

Ext.define('Admin.view.LeadersPanelMenu', {
    extend: 'Ext.menu.Menu',
    alias: 'widget.leaderspanelmenu',

    requires: [
        'Admin.view.TeamsPanelMenuViewModel2',
        'Ext.menu.Item'
    ],

    viewModel: {
        type: 'leaderspanelmenu'
    },
    height: 38,
    width: 192,

    items: [
        {
            xtype: 'menuitem',
            handler: function(item, e) {
                e.stopEvent();
                var TeamWindow = Ext.create('Admin.view.ViewTeam');
                TeamWindow.show();
                TeamWindow.fireEvent('loadRecord',{TeamID: selectedvalue});

            },
            icon: '/images/edit.png',
            text: 'View / Edit Team'
        }
    ]

});