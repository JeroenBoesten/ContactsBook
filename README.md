# ContactsBook
The following developer case was presented by Yunify. Create a persistent phone book application. It will be tested in both Windows and on OSX. 
Much like a “Contacts” application on your phone, this application should let you perform the following tasks: 
- Create, search, edit a contact. 
- Edit the following contact properties: name, last name, description 
- Add, edit, or remove the following contact properties: phone number, email, Twitter handle. 
- View an alphabetical listing of contacts - Sort the contact listing by date added

##Demo
Want to see this application in action? Without the hassle of installing it yourself? Visit: [contactsbook.jeroenboesten.nl](https://contactsbook.jeroenboesten.nl)

##Techniques
The application uses Laravel Framework (A php based framework) for the back end, for example; server side validation, database connection, database migrations, routes etc.

For the frontend it uses vue.js to create a single page experience and interactive feeling. 
Styling is done based on Bootstrap 4, and to compile and version everything webpack used under the hood. 
To have easy webpack configuration Laravel provides defaults in it's Laravel Mix.

##Installation
To install this application for yourself, follow instructions below.
1. Clone repository in folder
2. Run `composer install` to install composer dependencies (Requires composer).
3. Change or create the .env file (based on the .env.example) in the root of your project and don't forget to add database settings.
4. Run `php artisan migrate` to create database schema. 
5. Run the project with a Wamp / Mamp virtual host or any other webserver application for that matter. 