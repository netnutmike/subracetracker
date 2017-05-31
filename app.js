/*
 * This file is responsible for launching the application. Application logic should be
 * placed in the Admin.Application class.
 */
Ext.application({
    name: 'Admin',

    extend: 'Admin.Application',

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
        'DivePanel'
    ],

    // Simply require all classes in the application. This is sufficient to ensure
    // that all Admin classes will be included in the application build. If classes
    // have specific requirements on each other, you may need to still require them
    // explicitly.
    //
    requires: [
        'Admin.*'
    ]
});
