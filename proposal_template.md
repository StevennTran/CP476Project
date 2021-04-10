---
title: "CP476 Project: Limited Books<br>"
author: Quinn Brimley (170781000), Pauline Gwozdz (160393760), Steven Tran(170574740)
date: 2021-04-10
---

## Introduction

We wanted to make an online book management system where users can view and purchase their favourite books from the comfort of their own home. The idea was inspired by the pandemic; where people are stuck inside with nothing to do. What better way to spend your quarantine, then sitting back and enjoying a nice book! 😊

## Problem solving and algorithms

1. <strong>Application data collection</strong><br>
   We are going to use the <strong>Google Books API</strong> → <span style="color: #5991ff">http://googleapis.com/books/v1/volumes?q= </span> query results of book information. The queried results return a <span style="color: #e854cf">JSON</span> formatted book, that contains the title of the book, the author, the genre, and the cover photo of the image as well.

2. <strong>Storing the books</strong><br>
   We are going to be storing the books on the <span style="color: #0075ab">mySQL</span> database if the user chooses to save the queried book into their favourites list. The database will keep track of both the user login information, along with the information/settings attatched to the accounts.

3. <strong>Displaying the book information on the page</strong><br>
   Once the query to the API is successful, the returned <span style="color: #e854cf">JSON</span> contains a URL to the cover of the book --> We would only need to make another HTTP request using <span style="color: #ff9a52">AJAX</span> to fetch the image from the web URL and display it to the book result screen. As for the remainder of the information, the returned <span style="color: #e854cf">JSON</span> contains all of the neccessary information, and we need only to parse the <span style="color: #e854cf">JSON</span> string and display the correctly formated information onto the client page.

## System Design

1. <strong>System Design Diagram: </strong><br>![System Design Diagram](images/webtier.png){width=80%}

   - Once the web application is launched, the system initialize the DOM elements and make <span style="color: #d93838">JQuery</span> calls to the APIs to fetch the infomation
   - The <strong> 1st tier </strong>of the system design consists of what the user can see:
   - The user can interact with the <span style="color: #4da5f7">HTML</span> webpage through their browser (while under the hood, the system is communicating through <span style="color: #ff5f59">JavaScript</span> and <span style="color: #ff9a52">AJAX</span> to talk to the server)
   - The <strong>2nd tier </strong>of the system design is where the heavy calculations and workload is done
   - The system will contain a backend made up of <span style="color: #be69fa">php</span> scripts that launch the correct webpages and send and receive API calls using <span style="color: #d93838">JQuery</span> and <span style="color: #ff5f59">JavaScript</span>
   - The <strong>3rd tier</strong> of the system design contains the local storage \* After receiving the information from the web, the information is then stored onto the local storage of the application where the user can retreive these files when neccessary (stored onto <span style="color: #0075ab">mySQL</span> database)
     <br><br>

2. <strong>Architecture Diagram: </strong><br>![Architecture Diagram](images/components.png){width=80%}

   - Upon launching the application, the user is greeted with a <strong> login/sign up page </strong> where they can enter their credentials and login to their account
   - If login/sign up is successful, then the user is taken to the <strong>search page </strong> where they can continue to use the site
   - The <strong>search page</strong> contains a button to query their book, and an interactive UI where the user can select one of these book to view in detail
   - The search page is where the API calls will be made, where when the user searches for books that they are interested in, the system makes a call to the API and gets the information from the <em>Google Books API </em> \* Upon clicking on a book, then the system will <strong>load the necessary information onto the webpage </strong> and allow the user to start a <strong>discussion</strong> for selected book, add to their <strong>favourites list</strong>, or click on a button where they can </strong>purchase</strong> the book (will navigate to the Google Books web application to buy thier book if it's available)
     <br><br>

3. <strong>Features to implement:</strong>
   _ <strong>Search for books </strong>- Will be using a web API to make HTTP requests to the Google Books API and get book information
   _ <strong>Redirect Users to where they can buy the books</strong>
   _ Will implement a button located on the details page that makes another http call to the Google Books API, so you can buy your favourite book! :)
   _ <strong>Create discussions for books</strong>
   _ Talk about the plot and thoughts about the book!
   _ Recommend books with a touch of button (selecting users who are registerd to recommend the book to)
   <br><br>
4. <strong>Tools to be used in the project: </strong>
   - <strong>CGI programming:</strong>
     - <span style="color: #be69fa">php</span> - Create a <span style="color: #0075ab">mySQL</span> database with tables to store the user information
     - <span style="color: #ff9a52">AJAX</span> - Will be used to implement many of the features
   - <strong>Server side: </strong>
     - local <span style="color: #0075ab">mySQL</span> database to store:
       - The favourited books
       - User login information
       - Discussions
       - Most Previously viewed book
   - <strong>Client side:</strong>
     - <span style="color: #ff5f59">JavaScript</span>, <span style="color: #d93838">JQuery</span>, <span style="color: #4da5f7">HTML</span>, <span style="color: #57bd40">CSS</span>
     - API call (Google Books) Will be used to make HTTP requests to get book information and display it to the user

## Milestones & schedule

All the tasks will be worked on throughout the remainder of the course by everyone. The leader of each milestone meeting will cooridinate what is to be done before the start of the next milestone meeting and check up on everyone's progress thus far.

| Task ID | Description                                     |      Due date       |  Lead   |
| :-----: | :---------------------------------------------- | :-----------------: | :-----: |
|    1    | Project research & team up                      | Wednesday of week 9 |  Steve  |
|    2    | Project proposal                                |  Sunday of week 10  | Pauline |
|    3    | Get the layout of HTML and PHP scripts working  |  Friday of Week 10  |  Quinn  |
|    4    | Set up datbases and connect everything together |  Friday of Week 11  |  Quinn  |
|    5    | Project documentation creation                  | Thursday of week 13 | Pauline |
|    6    | Project submission                              | Saturday of week 13 |  Steve  |

## References

1. [OpenLibrary Book API](https://openlibrary.org/dev/docs/api/books)
2. [Indigo](https://www.chapters.indigo.ca/en-ca/)
3. [Google Book API](https://developers.google.com/books/docs/v1/using)
4. [Closed Book Image](https://www.clipartmax.com/middle/m2i8b1A0m2m2N4A0_image-of-closed-book-clipart-white-book-icon-png/)
5. [Open Book Image](https://www.pikpng.com/pngvi/iRobRbw_call-number-draw-a-simple-book-clipart/)

## Appendices

1. Password Encryption (Built-in <span style="color: #be69fa">php</span> hashing) - To securely store the password in the database
2. Will implement HTTPS for safer transactions
