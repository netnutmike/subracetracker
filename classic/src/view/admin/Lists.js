Ext.define('Admin.view.admin.Lists', {
    extend: 'Ext.tab.Panel',
    xtype: 'adminlists', 

    requires: [
        'Ext.tab.Tab',
        'Ext.grid.Panel',
        'Ext.grid.column.Number',
        'Ext.grid.column.Date',
        'Ext.grid.View',
        'Ext.toolbar.Toolbar',
        'Ext.form.field.ComboBox',
        'Ext.toolbar.Separator'
    ],

    height: 564,
    width: 819,
    header: false,
    activeTab: 0,

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'panel',
                    layout: 'fit',
                    title: 'List Values',
                    items: [
                        {
                            xtype: 'panel',
                            layout: 'fit',
                            header: false,
                            //title: 'My Panel',
                            items: [
                                {
                                    xtype: 'gridpanel',
                                    shrinkWrap: 0,
                                    header: false,
                                    //title: 'My Grid Panel',
                                    store: Ext.create('Admin.store.ListValuesStore'),
                                    enableColumnHide: false,
                                    columns: [
                                        {
                                            xtype: 'gridcolumn',
                                            dataIndex: 'ItemText',
                                            width: 130,
                                            text: 'Item Text'
                                        },
                                        {
                                            xtype: 'gridcolumn',
                                            dataIndex: 'Value',
                                            text: 'Int Value'
                                        },
                                        {
                                            xtype: 'gridcolumn',
                                            dataIndex: 'ExtraStr',
                                            text: 'Extra Str'
                                        },
                                        {
                                            xtype: 'gridcolumn',
                                            dataIndex: 'ExtraInt',
                                            text: 'Extra Str'
                                        },
                                        {
                                            xtype: 'gridcolumn',
                                            dataIndex: 'StatusText',
                                            text: 'Status'
                                        }
                                    ],
                                    listeners: {
								    	itemcontextmenu: function (view, rec, node, index, e) {
								    		e.stopEvent();
								    		selectedvalue = rec.get('uid');
								    		selectedvalue2 = rec.get('Name');
								    		selectedrec = rec;
								    		TableValuesListsMenu.showAt(e.getXY()); 
								    		
								    	},
								    	dblclick: function (view, rec, item, index, e) {
								    		e.stopEvent();
								    		var NewListwin = Ext.create('Admin.view.admin.NewList');
											NewListwin.show();
											Ext.getCmp('newlistnameid').setValue(rec.get('Name'));
											Ext.getCmp('newlistuidid').setValue(rec.get('uid'));
											Ext.getCmp('newlistactionid').setValue('update');
								    		
								    	}
								    },
                                    dockedItems: [
                                        {
                                            xtype: 'toolbar',
                                            dock: 'top',
                                            items: [
                                                {
                                                    xtype: 'button',
                                                    text: 'Add New Item',
                                                    icon: '/images/add.png',
                                                    id: 'newlistitembutton',
                                                    disabled: true,
                                                    listeners: {
					                        			click: function() {
					                        				var NewListItemwin = Ext.create('Admin.view.admin.NewListItem');
					                        				Ext.getCmp('newlistitemlistidid').setValue(Ext.getCmp('listvaluesselect').getValue());
					                        				NewListItemwin.show();
					                        			}
					                        		}
                                                },
                                                {
                                                    xtype: 'combobox',
                                                    fieldLabel: 'Select List',
                                                    store: Ext.create('Admin.store.ListsStore'),
                                                    id: 'listvaluesselect',
								                    labelWidth: 50,
								                    width: 400,
								                    displayField: 'Name',
								                    forceSelection: true,
								                    valueField: 'uid',
								                    //value: '7',
								                    listeners: {
								                    	select: function(combobox, rcds, opts) {
								                    			
								                    		Ext.getStore('ListValuesStore').getProxy().extraParams = { dataset: 'tabledata', tableid: combobox.getValue()};
								                    		Ext.getStore('ListValuesStore').load();		
								                    		
								                    		Ext.getCmp('newlistitembutton').enable();						
								                    		
								                    	}
								                    }
                                                }
                                            ]
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                },
                {
                    xtype: 'panel',
                    title: 'Lists',
                    layout: 'fit',
                    items: [
                        {
                            xtype: 'panel',
                            header: false,
                            layout: 'fit',
                            //title: 'My Panel',
                            items: [
                                {
                                    xtype: 'gridpanel',
                                    shrinkWrap: 0,
                                    header: false,
                                    //scrollable: true,
                                    //title: 'My Grid Panel',
                                    store: Ext.create('Admin.store.ListsStore'),
                                    enableColumnHide: false,
                                    columns: [
                                        {
                                            xtype: 'gridcolumn',
                                            dataIndex: 'uid',
                                            text: 'List ID'
                                        },
                                        {
                                            xtype: 'gridcolumn',
                                            dataIndex: 'Name',
                                            text: 'List Name',
                                            flex: 1
                                        }
                                    ],
                                    listeners: {
								    	itemcontextmenu: function (view, rec, node, index, e) {
								    		e.stopEvent();
								    		selectedvalue = rec.get('uid');
								    		selectedvalue2 = rec.get('Name');
								    		TableListsMenu.showAt(e.getXY()); 
								    		
								    	},
								    	dblclick: function (view, rec, item, index, e) {
								    		e.stopEvent();
								    		var NewListwin = Ext.create('Admin.view.admin.NewList');
											NewListwin.show();
											Ext.getCmp('newlistnameid').setValue(selectedvalue2);
											Ext.getCmp('newlistuidid').setValue(selectedvalue);
											Ext.getCmp('newlistactionid').setValue('update');
								    		
								    	}
								    },
                                    dockedItems: [
                                        {
                                            xtype: 'toolbar',
                                            dock: 'top',
                                            items: [
                                                {
                                                    xtype: 'button',
                                                    text: 'Add New List',
                                                    icon: '/images/add.png',
					                        		listeners: {
					                        			click: function() {
					                        				var NewListwin = Ext.create('Admin.view.admin.NewList');
					                        				NewListwin.show();
					                        			}
					                        		}
                                                },
                                                {
                                                    xtype: 'tbseparator'
                                                },
                                                {
                                                    xtype: 'textfield',
                                                    fieldLabel: 'Search',
                                                    labelWidth: 50,
                                                    id: 'filterliststext',
                                                    listeners: {
					                        			change: function() {
					                        				srchval = Ext.getCmp('filterliststext').getValue();
					                        				Ext.getStore('ListsStore').filter('Name', srchval);
					                        			}
					                        		}
                                                },
                                                {
                                                    xtype: 'button',
                                                    text: 'Clear',
                                                    icon: '/images/block.png',
                                                    listeners: {
					                        			click: function() {
					                        				Ext.getCmp('filterliststext').setValue('');
					                        				//Ext.getStore('ListsStore').filter('Name', '');
					                        			}
					                        		}
                                                }
                                            ]
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ]
        });

        me.callParent(arguments);
    }

});

TableListsMenu = Ext.create('Ext.menu.Menu',{
		id : 'TableListsMenu',
		items : [
			
			new Ext.menu.Item({
				cls			: 'x-btn-text-icon bmenu', // icon and text class
				pressed		: false,
				enableToggle: false,
				text		: 'Edit',
				tooltip		: 'Edit List',
				icon		: '/images/edit.png',
				scope		: this,
				handler		: function () {
					var NewListwin = Ext.create('Admin.view.admin.NewList');
					NewListwin.show();
					Ext.getCmp('newlistnameid').setValue(selectedvalue2);
					Ext.getCmp('newlistuidid').setValue(selectedvalue);
					Ext.getCmp('newlistactionid').setValue('update');
				}
			}),'-',
			new Ext.menu.Item({
				cls			: 'x-btn-text-icon bmenu', // icon and text class
				pressed		: false,
				enableToggle: false,
				text		: 'Delete',
				tooltip		: 'Delete List',
				icon		: '/images/delete.png',
				scope		: this,
				handler		: function () {
					Ext.Msg.show({
						title: 'Delete List?',
						message: 'Are you sure you want to delete this list and all of it\'s items?  This cannot be undone',
						buttons: Ext.Msg.YESNO,
						icon: Ext.Msg.WARNING,
						fn: function(btn) {
							if (btn === 'yes') {
								
								var NewListwin = Ext.create('Admin.view.admin.NewList');
								//NewListwin.show();
								Ext.getCmp('newlistnameid').setValue(selectedvalue2);
								Ext.getCmp('newlistuidid').setValue(selectedvalue);
								Ext.getCmp('newlistactionid').setValue('delete');
								var form =Ext.getCmp('newlistformid').getForm();
								
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
								               Ext.Msg.alert('Unable To Delete List', action.result.msg);
								            
								       	}
			                		}
			                	})
								
							} else if (btn === 'no') {
								
							} else {
								
							}
						}
					})
					
				}
			}),'-',
			new Ext.menu.Item({
				cls			: 'x-btn-text-icon bmenu', // icon and text class
				pressed		: false,
				enableToggle: false,
				text		: 'Help',
				tooltip		: 'Lists Help',
				icon		: '/images/help.png',
				scope		: this,
				handler		: function () {
					
				}
			})
			
			

		]
	});	
	

TableValuesListsMenu = Ext.create('Ext.menu.Menu',{
		id : 'TableValuesListsMenu',
		items : [
			
			new Ext.menu.Item({
				cls			: 'x-btn-text-icon bmenu', // icon and text class
				pressed		: false,
				enableToggle: false,
				text		: 'Edit',
				tooltip		: 'Edit List Item',
				icon		: '/images/edit.png',
				scope		: this,
				handler		: function () {
					var NewListwin = Ext.create('Admin.view.admin.NewListItem');
					var form =Ext.getCmp('newlistitemformid').getForm();
					form.loadRecord(selectedrec),
					NewListwin.show();
					//Ext.getCmp('newlistnameid').setValue(selectedvalue2);
					Ext.getCmp('newlistitemuidid').setValue(selectedvalue);
					Ext.getCmp('newlistitemactionid').setValue('update');
				}
			}),'-',
			new Ext.menu.Item({
				cls			: 'x-btn-text-icon bmenu', // icon and text class
				pressed		: false,
				enableToggle: false,
				text		: 'Delete',
				tooltip		: 'Delete List Item',
				icon		: '/images/delete.png',
				scope		: this,
				handler		: function () {
					Ext.Msg.show({
						title: 'Delete List Item?',
						message: 'Are you sure you want to delete this list item?  This cannot be undone',
						buttons: Ext.Msg.YESNO,
						icon: Ext.Msg.WARNING,
						fn: function(btn) {
							if (btn === 'yes') {
								
								var NewListwin = Ext.create('Admin.view.admin.NewListItem');
								
								Ext.getCmp('newlistitemuidid').setValue(selectedvalue);
								Ext.getCmp('newlistitemactionid').setValue('delete');
								
								var form =Ext.getCmp('newlistitemformid').getForm();
								
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
								               Ext.Msg.alert('Unable To Delete List', action.result.msg);
								            
								       	}
			                		}
			                	})
								
							} else if (btn === 'no') {
								
							} else {
								
							}
						}
					})
					
				}
			}),'-',
			new Ext.menu.Item({
				cls			: 'x-btn-text-icon bmenu', // icon and text class
				pressed		: false,
				enableToggle: false,
				text		: 'Help',
				tooltip		: 'Lists Items Help',
				icon		: '/images/help.png',
				scope		: this,
				handler		: function () {
					
				}
			})
			
			

		]
	});	