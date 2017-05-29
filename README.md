# hamclub.online
This is a ham radio club management system.  When our club needed to find a way to help manage the growing club we went looking for existing solutions.  We looked at
existing applications that could be downloaded.  They were all really poor and we were really wanting something web based so it did not require a dedicated computer 
and could be accessed from anywhere.

Our search found very few web based tools and the ones we did find looked like they were written in the mid 1990's and were very clumby to use.  After reviewing what we needed it seemed it would pretty simple for use to create.

This system is designed to support as many ham clubs as want to use it.  We are going to put it online at hamclub.online and it will be free for any ham radio club to use it.

It is written using modern technologies in a micro services architecture that can scale horizontally in a dynamic elastic cloud or be placed on a single server.  This design is a web browser application which means that everytime you click it does not have to go back to the web server unless you want to update data.  It uses advanced caching techniques and may take a couple of seconds to load the first then, after that it loads subsecond everytime.

It is designed to work like any other desktop application so there is no learning curve to learn how to use it.  

## User Authentication
The user is authenticated against a local database.  We do not store the password in the database.  What we store is a hash of the password but before it is hashed we add both a salt and a pepper.  No 2 users use the same Salt or Pepper either, this part of the algorythm is not published here on github.  Without that part, it will still work but will not add a salt or pepper before generating the hash.  You can set static salt or pepper if you want by setting the variables or you could write your own generation algorythm and place it in the include.


## Application Structure
All of the interfaces are a client server model as compared to a traditional web application where each request sent to the server returns an entire page that is re-rendered with the new data.

In a traditional web interface, when you submit new data or want to retrieve new or different data, a request is sent to the server, the web application on the server gathers the data and then sends you a new web page.  Once your browser receives the new web page it re-renders the page.  All of this takes time and also means that you will be retrieving much of the same information over and over (colors, box, etc.).

We use more of a client server based design.  You load up the application interface one time.  As you select different views, many times there is no data being transfered at all.  And if you are changing a query and need to retrive new data, it is a very simple request that returns just the data needed.

In a traditional web page, you click a new area and you see the wait indicator spin for a bit while you wait for the new web page.  With the client server design, you see no pausing or waiting, you get the data really fast, most times you think the data was already there.

Many times, the sorting and searching is done on your local machine and never has to go back to the server.  It feels much like a standard desktop app.

## Application User Interface
### Framework
hamclub.online uses the Sencha ExtJS Version 6+ application framework.

The ExtJS framework is the only framework that it uses.  This framework provides everything needed for rich user interface and data integration.  There is no need for any additional frameworks for data communications, display tools, etc.

### Prototyping
Many of the screens, windows, menus, etc were prototyped in Sencha's Architect product.


## Backend Data
For the most part, the backend data system is written in PHP.

As mentioned above, there is one entry point into the backend system.  When the application needs to retrieve data it sends a request to this single location, it provides the dataset name of the data it wants to retrieve and any additional information that is needed to request the correct data.  That could be a date range, EID, record ID, etc.  

Each dataset has it's own set of variables that can be provided.  For many data sets certain data is required.

Once the request reaches the backend, before it is processed, there are multiple security checks that are performed to verify the the user is really the user and has not been intercepted.

Each data request that implements a change to some form of data is logged with the IP address, user details and the details of the change.  This can be viewed in the activity logs in the admin section of the user interface (if you have access to that section).

For more details on the different datasets, the required and optional parameters, refer to the wiki that is still in progress at this time. 

## Versions
### 0.0
This will be the initial release, it is still in progress.  Once the first version is officially released we will call it version 1.0.