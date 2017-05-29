Ext.define('Admin.view.admin.NewListItem', {
    extend: 'Ext.window.Window',

    requires: [
        'Ext.toolbar.Toolbar',
        'Ext.button.Button',
        'Ext.form.Panel',
        'Ext.form.field.ComboBox'
    ],

    height: 318,
    width: 400,
    title: 'List Item',
    id: 'newlistitemwindow',

    
    items: [
        {
            xtype: 'form',
            bodyPadding: 10,
            header: false,
            id: 'newlistitemformid',
            items: [
                {
                    xtype: 'hidden',
                    name: 'uid',
					id: 'newlistitemuidid'
                },
                {
                    xtype: 'hidden',
                    name: 'ListID',
					id: 'newlistitemlistidid'
                },
                {
                    xtype: 'hidden',
                    name: 'action',
					value: 'new',
					id: 'newlistitemactionid'
                },
                {
                    xtype: 'textfield',
                    anchor: '100%',
                    fieldLabel: 'Item Text',
                    name: 'ItemText'
                },
                {
                    xtype: 'textfield',
                    anchor: '100%',
                    fieldLabel: 'Value',
                    name: 'Value'
                },
                {
                    xtype: 'textfield',
                    anchor: '100%',
                    fieldLabel: 'Extra String',
                    name: 'ExtraStr'
                },
                {
                    xtype: 'textfield',
                    anchor: '100%',
                    fieldLabel: 'Extra Int',
                    name: 'ExtraInt',
                    inputType: 'number'
                },
                {
                    xtype: 'combobox',
                    anchor: '100%',
                    fieldLabel: 'Status',
                    name: 'Status',
                    displayField: 'Name',
                    forceSelection: true,
	    			//queryMode: 'local',
                    store: Ext.create('Admin.store.ListStatusStore'),
                    valueField: 'Value',
                    value: '1'
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
		                        		params: {dataset: 'tabledata', EID: EID},
		                        		success: function(form, action) {
		                        			Ext.getStore('ListValuesStore').load();	
									       	Ext.getCmp('newlistitemwindow').close();
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
									               Ext.Msg.alert('Unable To Save New List Item', action.result.msg);
									            
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