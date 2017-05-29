Ext.define('Admin.store.NavigationTree', {
    extend: 'Ext.data.TreeStore',

    storeId: 'NavigationTree',

    fields: [{
        name: 'text'
    }],

    root: {
        expanded: true,
        children: [
            {
                text: 'Dashboards',
                iconCls: 'x-fa fa-desktop',
                rowCls: 'nav-tree-badge',
                viewType: 'admindashboard',
                routeId: 'dashboard', // routeId defaults to viewType
                expanded: false,
                selectable: true,
                //routeId: 'pages-parent',
                //id: 'pages-parent',

                children: [
                    {
                        text: 'Members',
                        iconCls: 'x-fa fa-file-o',
                        //viewType: 'malwaredashboard',
                        viewType: 'pageblank',
                        leaf: true
                    }
                ]
            },
            {
                text: 'Scoring',
                iconCls: 'x-fa fa-send',
                rowCls: 'nav-tree-badge nav-tree-badge-new',		//nav-tree-badge-hot
                viewType: 'email',
                leaf: true
            },
            {
                text: 'Activity',
                iconCls: 'x-fa fa-user',
                viewType: 'profile',
                leaf: true
            },
            {
                text: 'DiveMaster',
                iconCls: 'x-fa fa-leanpub',
                expanded: false,
                selectable: false,
                //routeId: 'pages-parent',
                //id: 'pages-parent',

                children: [
                    {
                        text: 'Current Status',
                        iconCls: 'x-fa fa-file-o',
                        viewType: 'pageblank',
                        leaf: true
                    },
                    
                    {
                        text: 'Send Email',
                        iconCls: 'x-fa fa-file-o',
                        viewType: 'pageblank',
                        leaf: true
                    }
                ]
            },
            {
                text: 'Admin',
                iconCls: 'x-fa fa-leanpub',
                expanded: false,
                selectable: false,
                //routeId: 'pages-parent',
                //id: 'pages-parent',

                children: [
                    
                    {
                        text: 'Race Management',
                        iconCls: 'x-fa fa-file-o',
                        viewType: 'pageblank',
                        leaf: true
                    },
                    {
                        text: 'Team Management',
                        iconCls: 'x-fa fa-file-o',
                        viewType: 'pageblank',
                        leaf: true
                    },
                    {
                        text: 'Participant Management',
                        iconCls: 'x-fa fa-file-o',
                        viewType: 'pageblank',
                        leaf: true
                    }
                ]
            },
            {
                text: 'Reports',
                iconCls: 'x-fa fa-leanpub',
                expanded: false,
                selectable: false,
                //routeId: 'pages-parent',
                //id: 'pages-parent',

                children: [
					{
					    text: 'Races',
					    iconCls: 'x-fa fa-file-o',
					    viewType: 'pageblank',
					    leaf: true
					},
					{
					    text: 'Teams',
					    iconCls: 'x-fa fa-file-o',
					    viewType: 'pageblank',
					    leaf: true
					},
					{
                        text: 'Participants',
                        iconCls: 'x-fa fa-file-o',
                        viewType: 'pageblank',
                        leaf: true
                    },
                    {
                        text: 'Scoring',
                        iconCls: 'x-fa fa-file-o',
                        viewType: 'pageblank',
                        leaf: true
                    },
                    {
                        text: 'Activity',
                        iconCls: 'x-fa fa-file-o',
                        viewType: 'pageblank',
                        leaf: true
                    }
                ]
            },
            {
                text: 'Master Admin',
                iconCls: 'x-fa fa-leanpub',
                expanded: false,
                selectable: false,
                //routeId: 'pages-parent',
                //id: 'pages-parent',

                children: [
                    
                    {
                        text: 'Lists',
                        iconCls: 'x-fa fa-file-o',
                        viewType: 'adminlists',
                        leaf: true
                    }
                ]
            }
        ]
    }
});
