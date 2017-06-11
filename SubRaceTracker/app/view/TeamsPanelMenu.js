/*
 * File: app/view/TeamsPanelMenu.js
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

Ext.define('Admin.view.TeamsPanelMenu', {
    extend: 'Ext.menu.Menu',
    alias: 'widget.teamspanelmenu',

    requires: [
        'Admin.view.TeamsPanelMenuViewModel',
        'Ext.menu.Separator'
    ],

    viewModel: {
        type: 'teamspanelmenu'
    },
    height: 123,
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
        },
        {
            xtype: 'menuseparator',
            text: 'Menu Item'
        },
        {
            xtype: 'menuitem',
            handler: function(item, e) {
                Ext.create('Admin.view.NewTeam').show();
            },
            icon: '/images/add.png',
            text: 'New Team'
        },
        {
            xtype: 'menuseparator',
            text: 'Menu Item'
        },
        {
            xtype: 'menuitem',
            handler: function(item, e) {
                Ext.Msg.show({
                    title: 'Delete Team?',
                    message: 'Are you sure you want to delete this Team, all of it\'s members, the Member History and any Runs history?  This cannot be undone',
                    buttons: Ext.Msg.YESNO,
                    icon: Ext.Msg.WARNING,
                    fn: function(btn) {
                        if (btn === 'yes') {

                            var NewListwin = Ext.create('Admin.view.NewTeam');
                            //NewListwin.show();
                            Ext.getCmp('NewTeamSession').setValue(SID);

                            var form =Ext.getCmp('NewTeamForm').getForm();

                            form.submit({
                                url:'/data/actions.php',
                                params: {dataset: 'teams', SID: SID, action: 'delete', uid: selectedvalue},
                                success: function(form, action) {
                                    Ext.getStore('TeamsStore').load();

                                },
                                failure: function(form, action) {
                                    switch (action.failureType) {
                                        case Ext.form.action.Action.CLIENT_INVALID:
                                        Ext.Msg.alert('Failure', 'Form fields may not be submitted with invalid values');
                                        break;
                                        case Ext.form.action.Action.CONNECT_FAILURE:
                                        Ext.Msg.alert('Failure', 'Could Not Communicate With Server.');
                                        break;
                                        case Ext.form.action.Action.SERVER_INVALID:
                                        Ext.Msg.alert('Unable To Delete Team', action.result.msg);

                                    }
                                }
                            })

                        } else if (btn === 'no') {

                        } else {

                        }
                    }
                })
            },
            icon: '/images/delete.png',
            text: 'Delete Team'
        }
    ]

});