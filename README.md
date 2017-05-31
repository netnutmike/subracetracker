# International Sub Races Tracking System

This is a very simple web interface for keeping track of teams, divers and races for the International Submarine Races.  It has a handful of tables and user interface elements to help keep track of what divers are currently in the water, what teams are in the water, etc.

It also has the ability to keep track of the team performances and create a leaderboard.


## User Authentication

The user is authenticated using a very simple comparison of the password to the one set in the config file.  This is not a secure method of authentication.  This application is going to run on a closed network with just a couple of computers on the network.  The simple password stops just anyone from getting access to the web interface.

The password can be changed at any time in the config file.


## Application Structure

All of the interfaces are a client server model as compared to a traditional web application where each request sent to the server returns an entire page that is re-rendered with the new data.

In a traditional web interface, when you submit new data or want to retrieve new or different data, a request is sent to the server, the web application on the server gathers the data and then sends you a new web page. Once your browser receives the new web page it re-renders the page. All of this takes time and also means that you will be retrieving much of the same information over and over (colors, box, etc.).

We use more of a client server based design. You load up the application interface one time. As you select different views, many times there is no data being transfered at all. And if you are changing a query and need to retrive new data, it is a very simple request that returns just the data needed.

In a traditional web page, you click a new area and you see the wait indicator spin for a bit while you wait for the new web page. With the client server design, you see no pausing or waiting, you get the data really fast, most times you think the data was already there.

Many times, the sorting and searching is done on your local machine and never has to go back to the server. It feels much like a standard desktop app.


## Application User Interface

### Framework

The Interntion Sub Races Tracker uses the Sencha ExtJS Version 6+ application framework.

The ExtJS framework is the only framework that it uses. This framework provides everything needed for rich user interface and data integration. There is no need for any additional frameworks for data communications, display tools, etc.

### Prototyping

Many of the screens, windows, menus, etc were prototyped in Sencha's Architect product.


## Backend Data

For the most part, the backend data system is written in PHP.

As mentioned above, there is one entry point into the backend system. When the application needs to retrieve data it sends a request to this single location, it provides the dataset name of the data it wants to retrieve and any additional information that is needed to request the correct data. That could be a date range, record ID, etc.

Each dataset has it's own set of variables that can be provided. For many data sets certain data is required.

Once the request reaches the backend, before it is processed, there is a basic security check that is performed to verify the the user has authenticated.

For more details on the different datasets, the required and optional parameters, refer to the wiki that is still in progress at this time.


## Versions

# 0.0.1
This is the first version and the active version in development.