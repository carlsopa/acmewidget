This is the Acme Widget JHA tracker.

Acme widgets was quickly expanding and needed a better way to track their JHA forms. So they created this.

Built using PHP as a backend, with VueJS as the frontend and mysql as the database. This was built and compiled using docker to make it easier to share. You will need docker installed to run this.

Setup instructions:
BUILD
1) clone repo into a new directory
2) Make sure that you have docker already running
3) cd into the new acmewidget directory
4) run `docker-compose up --build`
*this should take a few minutes, as it builds and deploys everything within a docker container

CHECK DATA
1) with docker running open a new termainal and go to the acmewidget directory.
2) type `mysql -h localhost -p 3307 -u root -p`
3) when it asks for a password type "password"
4) run the command `show databases`, you should see a database called "acme_widget"
4A) If you do not see that database you will need to take the sql file that is within the sql directory and copy/paste it to create the databases and tables
4B) If you do see it run `use acme_widget;`
4C) type `show tables;` If you do not see any tables refer back to 4A.
5) You are now ready to continue

Use
The buttons at the top of the page will guide you.
HOME - this just takes you back to the home screen with just text.
VIEW - once you create a form it will appear here. You can then click on any form to view it.
CREATE - This is where you will create your new forms. You must enter the metadata first before you can continue on to entering steps, hazards/controls.
