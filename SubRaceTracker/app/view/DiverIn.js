/*
 * File: app/view/DiverIn.js
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

Ext.define('Admin.view.DiverIn', {
    extend: 'Ext.window.Window',
    alias: 'widget.diverin',

    requires: [
        'Admin.view.DiverInViewModel',
        'Admin.view.DiverInViewController',
        'Ext.toolbar.Toolbar',
        'Ext.button.Button',
        'Ext.form.Panel',
        'Ext.form.field.Text',
        'Ext.form.field.Hidden'
    ],

    controller: 'diverin',
    viewModel: {
        type: 'diverin'
    },
    height: 153,
    margin: 5,
    padding: 5,
    width: 284,
    title: 'Diver In',

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
            id: 'DiverInForm',
            bodyPadding: 10,
            items: [
                {
                    xtype: 'textfield',
                    width: 251,
                    fieldLabel: 'Diver #',
                    labelWidth: 75,
                    name: 'DiverID'
                },
                {
                    xtype: 'hiddenfield',
                    anchor: '100%',
                    id: 'DiverInSession',
                    fieldLabel: 'Label',
                    name: 'SID'
                },
                {
                    xtype: 'hiddenfield',
                    anchor: '100%',
                    fieldLabel: 'Label',
                    name: 'action',
                    value: 'DiverIn'
                }
            ]
        }
    ]

});