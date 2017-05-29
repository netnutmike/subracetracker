
Ext.define("Admin.view.testPanel",{
    extend: "Ext.panel.Panel",

    requires: [
        "Admin.view.testPanelController",
        "Admin.view.testPanelModel"
    ],

    controller: "testpanel",
    viewModel: {
        type: "testpanel"
    },

    html: "Hello, World!!"
});
