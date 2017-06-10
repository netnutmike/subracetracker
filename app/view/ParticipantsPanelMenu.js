/*
 * File: app/view/ParticipantsPanelMenu.js
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

Ext.define('Admin.view.ParticipantsPanelMenu', {
    extend: 'Ext.menu.Menu',
    alias: 'widget.participantspanelmenu',

    requires: [
        'Admin.view.ParticipantsPanelMenuViewModel',
        'Ext.menu.Separator'
    ],

    viewModel: {
        type: 'participantspanelmenu'
    },
    height: 123,
    width: 192,

    items: [
        {
            xtype: 'menuitem',
            handler: function(item, e) {
                Ext.create('Admin.view.ViewParticipant').show();
            },
            icon: '/images/edit.png',
            text: 'View / Edit Participant'
        },
        {
            xtype: 'menuseparator',
            text: 'Menu Item'
        },
        {
            xtype: 'menuitem',
            handler: function(item, e) {
                Ext.create('Admin.view.NewParticipant').show();
            },
            icon: '/images/add.png',
            text: 'New Participant'
        },
        {
            xtype: 'menuseparator',
            text: 'Menu Item'
        },
        {
            xtype: 'menuitem',
            handler: function(item, e) {
                Ext.Msg.show({
                    title: 'Delete Participant?',
                    message: 'Are you sure you want to delete this Particpant and the Participant History?  This cannot be undone!',
                    buttons: Ext.Msg.YESNO,
                    icon: Ext.Msg.WARNING,
                    fn: function(btn) {
                        if (btn === 'yes') {

                            var NewListwin = Ext.create('Admin.view.NewParticipant');
                            //NewListwin.show();
                            Ext.getCmp('NewParticipantSession').setValue(SID);

                            var form =Ext.getCmp('NewParticipantForm').getForm();

                            form.submit({
                                url:'/data/actions.php',
                                params: {dataset: 'participants', SID: SID, action: 'delete', uid: selectedvalue},
                                success: function(form, action) {
                                    Ext.getStore('ParticipantsStore').load();

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
                                        Ext.Msg.alert('Unable To Delete Participant', action.result.msg);

                                    }
                                }
                            });

                        } else if (btn === 'no') {

                        } else {

                        }
                    }
                });
            },
            icon: '/images/delete.png',
            text: 'Delete Participant'
        }
    ]

});