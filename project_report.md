# Limited Books Project For CP476

Author: Quinn Brimley, Steven Tran, Pauline Gwozdz

Date: 2021-04-09

# Limited Books Website

## Pages

### Index

![Screen shot demo Index page](images/Index.png){width=600px}

<p>Upon starting the web application, the user is greeted with the main Page</p>
<p>The user has the option to move sign up / log in once the applicaion is launched</p>
<p>Upon scrolling, the user can see the about us section that describes our company</p>

![Screen shot demo Index page](images/about.png){width=600px}

<p>The user has the option to move sign up / log in once the applicaion is launched</p>

### Sign up

![Screen shot demo Sign up page](images/SignUp.png){width=600px}

<p>Here users can Sign up to use our website, this will register the user into our db </p>

### Login

![Screen shot demo Login Page](images/Login.png){width=600px}

 <p>Here users can Login using there user name and password (which the password is encrypted) and signs them in </p>

### Search

![Screen shot demo Search page](images/Search.png){width=600px}

<p>Users can search for any book here and view details about them by clicking the "Details" button </p>

### Profile

![Screen shot demo Profile](images/Profile.png){width=600px}

<p>User profile shows all comments made by the user and all recommended books that others have recommended to them</p>

### Details

![Screen shot demo Details](images/Details.png){width=600px}

<p>Here users can see details about the book, like a description and the publisher.</p>
<p>The user can also find where to buy the book by clicking the buy button </p>
<p>Lastly the user can comment about the book, this shows all comments by other users and there own comments with timestamps of when the comment was posted</p>


## Client side

### JS 

We have a gradient that allows us to have a nice dynamic background that looks modern and slick. 
Use also used xhttps request to dynamically load certain things on the page, and send querys to our php files.
We used the google books API to allow us to find and load books.

## Server Side

### Login And Sign Up Scripts

On the server side we deal with the users sign up and login, were we take the user name and password from the user (passwords are encrpyed)
and either check to see if the user is actually saying who they are or sign them up by storing there details. User also cant use the same username as someone else

### Details script

Here the server will get the bookID and load all the details about it. It gives the book Title, the cover photo, the author, the publisher, and a 
decription of the book. We also have a button that if the book is aviable to be purchesed online, it will take them straight there.

We have the recommend section. Here users can recommend books to other users, there is a drop down that has all users in the db and will allow the user
to pick who they want to recommend a book too. After clicking 'send recommendation' it will store the bookID with the user who recommended it to you.
These can later be viewed in the profile.

We have the 'book talk' section that allows people to talk about the books. Here the user can leave a comment which will be time stamped and displayed real time
With other users as well.

### User profile

Here the user can view there entire comment history as well as view all books that have been recommended to them. 
If the user wants to check out the book thats been recommended they can click the details button which will take them to the details page.
This all gets pulled from the db.

## Database

Database has three tables, users, forum, recommend. 

### User Table
The user table stores users names and users passwords that are enycrpted and saved on the db. 
It also contain roles ID for if they are a site admin or a normal user

### Forum Table

This table has the username as a forgin key in it. Here we store all the users comments in the 'Book talk' section.
When a user makes a comment it stores who made the comment, with the bookID and book title and a time stamp.
We can use this time stamp to see when comments are made.


### Recommend Table

The recommended table keeps track of recommend books. Users can recommend books to one another so this table keeps track
of the recommend books



**References**

1. [Nav bar](https://www.w3schools.com/w3css/w3css_sidebar.asp)
2. [Logo created with](https://www.freelogodesign.org/manager/showcase/27e7d0b60aa4456fa2fff7365b106610)
3. [Search button](https://www.w3schools.com/howto/howto_css_search_button.asp)
4. [Animation for search bar](https://www.w3schools.com/js/js_htmldom_animate.asp)
5. [Contact Form](https://www.w3schools.com/howto/howto_css_contact_form.asp)
