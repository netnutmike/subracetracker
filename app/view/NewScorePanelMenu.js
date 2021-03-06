/*
 * File: app/view/NewScorePanelMenu.js
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

Ext.define('Admin.view.NewScorePanelMenu', {
    extend: 'Ext.menu.Menu',
    alias: 'widget.newscorepanelmenu',

    requires: [
        'Admin.view.NewScorePanelMenuViewModel',
        'Ext.menu.Item'
    ],

    viewModel: {
        type: 'newscorepanelmenu'
    },
    height: 38,
    width: 192,

    items: [
        {
            xtype: 'menuitem',
            handler: function(item, e) {
                e.stopEvent();
                //Ext.Msg.alert('Selected Value Debug', selectedvalue);
                var ScoringWindow = Ext.create('Admin.view.Scoring');
                ScoringWindow.show();
                ScoringWindow.fireEvent('loadRecord',{RunID: selectedvalue});
            },
            icon: '/images/calculator.png',
            text: 'Perform Scoring'
        }
    ]

});