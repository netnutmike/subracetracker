Ext.define('Admin.view.admin.NewList', {
    extend: 'Ext.window.Window',

    requires: [
        'Ext.toolbar.Toolbar',
        'Ext.button.Button',
        'Ext.form.Panel',
        'Ext.form.field.Text'
    ],

    height: 156,
    width: 400,
    title: 'Add New List',
    id: 'newlistwindow',

    
    items: [
        {
            xtype: 'form',
            bodyPadding: 10,
            header: false,
            id: 'newlistformid',
            //title: 'My Form',
            items: [
                {
                    xtype: 'textfield',
                    name: 'Name',
                    anchor: '100%',
                    fieldLabel: 'New List Name',
                    id: 'newlistnameid'
                },
                {
                    xtype: 'hidden',
                    name: 'uid',
                    id: 'newlistuidid'
                },
                {
                    xtype: 'hidden',
                    name: 'action',
                    id: 'newlistactionid',
                    value: 'new'
                }
            ],
            dockedItems: [
		        {
		            xtype: 'toolbar',
		            dock: 'top',
		            items: [
		                {
		                    xtype: 'button',
		                    text: 'Save',
		                    icon: '/images/save.png',
		            		listeners: {
		            			click: function() {
		            						            				
		            				var form = this.up('form').getForm();
		                        	form.submit({
		                        		url:'/data/actions.php',
		                        		params: {dataset: 'tables', EID: EID},
		                        		success: function(form, action) {
		                        			Ext.getStore('ListsStore').load();	
									       	Ext.getCmp('newlistwindow').close();
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
									               Ext.Msg.alert('Unable To Save NEw List', action.result.msg);
									            
									       	}
		                        		}
		                        	})
		            			}
		            		}
		                },
		                {
		                    xtype: 'button',
		                    text: 'Cancel',
		                    icon: '/images/delete.png',
		            		listeners: {
		            			click: function() {
		            				this.up('window').close();
		            			}
		            		}
		                }
		            ]
		        }
		    ]
        }
    ]

});