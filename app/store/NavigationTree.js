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
                        text: 'Dive Master',
                        iconCls: 'x-fa fa-star',
                        //viewType: 'malwaredashboard',
                        viewType: 'divemaster',
                        leaf: true
                    },{
                        text: 'Leader Board',
                        iconCls: 'x-fa fa-trophy',
                        //viewType: 'malwaredashboard',
                        viewType: 'leaderboard',
                        leaf: true
                    },
                    {
                        text: 'Activity',
                        iconCls: 'x-fa fa-comments',
                        viewType: 'participantsactivity',
                        leaf: true
                    }
                ]
            },
            {
                text: 'Scoring',
                iconCls: 'x-fa fa-film',
                rowCls: 'nav-tree-badge',		//nav-tree-badge-hot
                viewType: 'scoringpanel',
                reference: 'ScoringNavigation',
                leaf: true
            },
            {
                text: 'Dive Table',
                iconCls: 'x-fa fa-list',
                viewType: 'divepanel',
                leaf: true
            },
            {
                text: 'Admin',
                iconCls: 'x-fa fa-wrench',
                expanded: false,
                selectable: false,
                //routeId: 'pages-parent',
                //id: 'pages-parent',

                children: [
                    
                    {
                        text: 'Run Management',
                        iconCls: 'x-fa fa-file-o',
                        viewType: 'runspanel',
                        leaf: true
                    },
                    {
                        text: 'Team Management',
                        iconCls: 'x-fa fa-tag',
                        viewType: 'teamspanel',
                        leaf: true
                    },
                    {
                        text: 'Participant Management',
                        iconCls: 'x-fa fa-barcode',
                        viewType: 'participantspanel',
                        leaf: true
                    }
                ]
            },
            {
                text: 'Reports',
                iconCls: 'x-fa fa-print',
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
                iconCls: 'x-fa fa-gear',
                expanded: false,
                selectable: false,
                //routeId: 'pages-parent',
                //id: 'pages-parent',

                children: [
                    
                    {
                        text: 'Lists',
                        iconCls: 'x-fa fa-list-ul',
                        viewType: 'adminlists',
                        leaf: true
                    },
                    {
                        text: 'Options',
                        iconCls: 'x-fa fa-gear',
                        viewType: 'optionspanel',
                        leaf: true
                    },
                    {
                        text: 'login',
                        iconCls: 'x-fa fa-file-o',
                        viewType: 'login',
                        hidden: true,
                        leaf: true
                    }
                ]
            }
        ]
    }
});
