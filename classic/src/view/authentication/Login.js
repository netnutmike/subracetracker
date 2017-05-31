Ext.define('Admin.view.authentication.Login', {
    extend: 'Admin.view.authentication.LockingWindow',
    xtype: 'login',

    requires: [
        'Admin.view.authentication.Dialog',
        'Ext.container.Container',
        'Ext.form.field.Text',
        'Ext.form.field.Checkbox',
        'Ext.button.Button'
    ],

    title: 'International Submarine Races Administrative Log In',
    defaultFocus: 'authdialog', // Focus the Auth Form to force field focus as well

    items: [
        {
            xtype: 'authdialog',
            defaultButton : 'loginButton',
            autoComplete: true,
            bodyPadding: '20 20',
            cls: 'auth-dialog-login',
            header: false,
            width: 415,
            layout: {
                type: 'vbox',
                align: 'stretch'
            },

            defaults : {
                margin : '5 0'
            },

            items: [
                {
                    xtype: 'label',
                    text: 'Sign In'
                },
                {
                    xtype: 'textfield',
                    cls: 'auth-textbox',
                    height: 55,
                    hideLabel: true,
                    emptyText: 'Password',
                    inputType: 'password',
                    name: 'password',
                    //bind: '{password}',
                    allowBlank : false,
                    triggers: {
                        glyphed: {
                            cls: 'trigger-glyph-noop auth-password-trigger'
                        }
                    }
                },
                {
                    xtype: 'hidden',
                    name: 'authenticity_token',
                    value: 'KG4us46g8uj5tfuhDuuS/bLPC1yQ/uwBw5FEHr8w93oKs='
                },
                {
                    xtype: 'button',
                    reference: 'loginButton',
                    scale: 'large',
                    ui: 'soft-blue',
                    iconAlign: 'right',
                    iconCls: 'x-fa fa-angle-right',
                    text: 'Login',
                    formBind: true,
                    listeners: {
                        click: function() {
                        	var form = this.up('form').getForm();
                        	Ext.Msg.alert('fieldval', form.findField('EID').getValue());
                        	form.submit({
                        		url:'/login.php',
                        		waitMsg: 'Logging In, One Moment',
                        		success: function(form, action) {
							       //Ext.Msg.alert('Success', action.result.msg);
							       window.location = "/";
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
							               Ext.Msg.alert('Login Failure', action.result.msg);
							            
							       	}
                        			//Ext.Msg.alert('Login Failed', action.result.msg);
                        		}
                        	})
                        	//'onLoginButton'
                        }
                    }
                }
            ]
        }
    ],

    initComponent: function() {
        this.addCls('user-login-register-container');
        this.callParent(arguments);
    }
});
