/*
 * File: app/model/Teams.js
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

Ext.define('Admin.model.Teams', {
    extend: 'Ext.data.Model',

    requires: [
        'Ext.data.field.Integer'
    ],

    fields: [
        {
            name: 'uid'
        },
        {
            name: 'TeamName'
        },
        {
            name: 'SchoolName'
        },
        {
            name: 'SubName'
        },
        {
            type: 'int',
            name: 'Status'
        },
        {
            name: 'StatusText'
        },
        {
            name: 'Lane'
        },
        {
            type: 'int',
            name: 'Class'
        },
        {
            name: 'ClassText'
        },
        {
            name: 'Notes'
        }
    ]
});