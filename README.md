# A sample MVC site via PHP

### Dependencies 
+ php ( >= 7.4 )
+ composer
+ mysql
### How to run
+ At first you need to edit the `.env` file with your database information. (see the deafault file)
+ Then you should import tables to the database. You can do it with importing `data.sql` file to your database (It will contain some test data).
+ Then you must run `composer dump-autoload` in the root directory.
+ Then run a php server in `public` directory. ` php -S 127.0.0.1:9090 -t public`
+ Now you can access the site with the `localhost:9090` url.
+ If you use the `data.sql` file, there will be 4 users. 
  + `emdil = abc@def.com & pass = 123`
  + `emdil = abc1@def.com & pass = 123`
  + `emdil = abc2@def.com & pass = 123`
  + `emdil = abc3@def.com & pass = 123`
