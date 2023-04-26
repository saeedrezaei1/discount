> A brief description of project:

STEPS:
* first of all  signUp & login routes are created
* I have used bootstrap in views
* and made AuthCustomController for mentioned routs
* in customRegistration method firstly created a new user after validation and hold that user logined with "AUTH" Facade  
* in customLogin method like I said before we have validation and login operations.
* ***
* For The second section I've created Forget-password and reset-password routes with corresponding controller "ForgetPassController"
*  table "password_reset_tokens" is used to create a token number for reseting password for users
* in forget-password page after entering an existing email we will create a token for that user and Mail it with reset-page url to user's Email.
* so we made a MAIL blade in mail file in views to send it for users with that made token.
* in this step for sending mails, MAILTRAP.io helped us and given configs from MAILTRAP copied to .env file 
* now user can see a reset-page link in his Email inbox.
* when he clicks in link he redirects to reset-page and in this section controller check his token and changing password operation can be occurred  

* ****
> TODO LIST

* create a resource controller => TodoController
* and resource route for "/TODO"
* New middleware => CustomAuth and add it to Kernel.php
* at the end Write CRUD operation for todoList in TodoController
****
>## Auth Api with JWT
* for the first step I installed `php-open-source-saver/jwt-auth` package 
* published `config/jwt.php`
* generate jwt secret key in .env file with this command `php artisan jwt:secret`
* so `config/auth.php` needs some changes to recognize jwt as a auth driver
* add `JWTSubject` implement and 2 corresponding methods to User model 
* after that I made `AuthController` and 4 routes in Api.php for sign up , login ,logout and refresh tokens.
* And `Api/ForgetController` and 2 routes for forget Email and reset operation (By using reset-tokens table).  
* eventually we utilized POSTMAN app to test all required endpoints .  
