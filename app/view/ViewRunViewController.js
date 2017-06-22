/*
 * File: app/view/ViewRunViewController.js
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

Ext.define('Admin.view.ViewRunViewController', {
    extend: 'Ext.app.ViewController',
    alias: 'controller.viewrun',

    loadRun: function(runID) {
        var form = Ext.getCmp('viewRunForm').getForm();

        form.load({
            url: '/data/getjson.php',
            params: {
                dataset: 'run',
                uid: runID
            },
            failure: function(form, action) {
                Ext.Msg.alert("Load failed", action.result.errorMessage);
            }
        });
    },

    onSaveButtonClick: function(button, e) {
        var form = Ext.getCmp('viewRunForm').getForm();
        Ext.getCmp('ViewRunFormSession').setValue(SID);

        if(form.isValid()){
            form.submit({
                url: '/data/actions.php',
                params: {
                    action: 'update',
                    dataset: 'runs'
                },

                success: function(fp, o) {
                    Ext.getStore('RacesStore').load();
                    Ext.getCmp('viewRunWindow').close();
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

        } else {
            Ext.Msg.alert('Errors Detected', 'Errors were detected on the form that need to be fixed before saving');
        }
    },

    onWindowLoadRecord: function(RunID, eventOptions) {
        //load record
        var form = Ext.getCmp('viewRunForm').getForm();

        form.load({
            url: '/data/getjson.php',
            params: {
                dataset: 'run',
                uid: RunID
            },
            failure: function(form, action) {
                Ext.Msg.alert("Load failed", action.result.errorMessage);
            },
            success: function(form, action) {
                if (action.result.data.Status == 4) {
                    Ext.getCmp('RunTimingFieldsID').setHidden(false);

                    if (action.result.data.TotalSpeed == action.result.data.BestSpeed) {
                        Ext.getCmp('RunTotalSpeedID').setHtml("<p align=\"center\"><FONT color=\"#00FF00\">" + action.result.data.TotalSpeed + "</FONT></p>");
                    } else {
                        Ext.getCmp('RunTotalSpeedID').setHtml("<p align=\"center\">" + action.result.data.TotalSpeed + "</p>");
                    }

                    if (action.result.data.Speed1 == action.result.data.BestSpeed) {
                        Ext.getCmp('RunSpeed1ID').setHtml("<p align=\"center\"><FONT color=\"#00FF00\">" + action.result.data.Speed1 + "</FONT></p>");
                    } else {
                        Ext.getCmp('RunSpeed1ID').setHtml("<p align=\"center\">" + action.result.data.Speed1 + "</p>");
                    }

                    if (action.result.data.Speed2 == action.result.data.BestSpeed) {
                        Ext.getCmp('RunSpeed2ID').setHtml("<p align=\"center\"><FONT color=\"#00FF00\">" + action.result.data.Speed2 + "</FONT></p>");
                    } else {
                        Ext.getCmp('RunSpeed2ID').setHtml("<p align=\"center\">" + action.result.data.Speed2 + "</p>");
                    }

                    if (action.result.data.Speed3 == action.result.data.BestSpeed) {
                        Ext.getCmp('RunSpeed3ID').setHtml("<p align=\"center\"><FONT color=\"#00FF00\">" + action.result.data.Speed3 + "</FONT></p>");
                    } else {
                        Ext.getCmp('RunSpeed3ID').setHtml("<p align=\"center\">" + action.result.data.Speed3 + "</p>");
                    }
                }
            }
        });
    }

});
