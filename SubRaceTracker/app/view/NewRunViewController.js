/*
 * File: app/view/NewRunViewController.js
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

Ext.define('Admin.view.NewRunViewController', {
    extend: 'Ext.app.ViewController',
    alias: 'controller.newrun',

    OnSaveButtonClick: function(button, e) {
        var form = Ext.getCmp('NewRunForm').getForm();
        Ext.getCmp('NewRunSession').setValue(SID);

        if(form.isValid()){
            form.submit({
                url: '/data/actions.php',
                params: {
                    action: 'new',
                    dataset: 'runs'
                },
                //waitMsg: 'Saving new DLP Exception...',
                success: function(fp, o) {
                    Ext.getStore('RacesStore').load();
                },
                failure: function(fp, o) {
                    switch (action.failureType) {
                        case Ext.form.action.Action.CLIENT_INVALID:
                        Ext.Msg.alert('Failure', 'Form fields may not be submitted with invalid values');
                        break;
                        case Ext.form.action.Action.CONNECT_FAILURE:
                        Ext.Msg.alert('Failure', 'Ajax communication failed');
                        break;
                        case Ext.form.action.Action.SERVER_INVALID:
                        Ext.Msg.alert('Failure', action.result.msg);
                    }
                }
            });
            this.up('window').close();
        } else {
            Ext.Msg.alert('Errors Detected', 'Errors were detected on the form that need to be fixed before saving');
        }
    }

});
