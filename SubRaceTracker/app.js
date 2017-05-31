/*
 * File: app.js
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

// @require @packageOverrides
Ext.Loader.setConfig({

});


Ext.application({
    models: [
        'ParticipantHistory',
        'ListData',
        'Lists',
        'Participants',
        'Races',
        'Teams'
    ],
    stores: [
        'ListDataStore',
        'ListsStore',
        'ParticipantHistoryStore',
        'ParticipantsStore',
        'RacesStore',
        'TeamsStore',
        'ClassStore',
        'DiverStatusStore',
        'RunStatusStore',
        'TeamStatusStore',
        'TeamClassStore'
    ],
    views: [
        'DivePanel',
        'RunsPanel',
        'NewRun',
        'NewParticipant',
        'ViewParticipant',
        'ScoringPanel',
        'TeamsPanel',
        'ParticipantsPanel',
        'Options',
        'Scoring',
        'NewTeam',
        'DiverIn',
        'DiverOut'
    ],
    name: 'Admin',

    launch: function() {
        Ext.create('Admin.view.DivePanel', {renderTo: Ext.getBody()});
    }

});
