# PHP-Training
PHP training storage.

MOOC: Coursera - Building Database Applications in PHP<br/>
Instructor: Charles Severance - University of Michigan<br/>
Course Completion date: 25th August 2018<br/><br/>
Content index:

<ol>
<li>index.php</li>
  - Opening page
  - Guides users to the Login page
  - Kicks off user session
<li>login.php</li>
  - Continues session
  - Allows users to login
  - Password set using md5 Hash
  - Form fields with data validation (strlen & strpos)
  - Set up to prevent code injection into site
  - Error logging
  - Requires succcessful login to display database details
  - Flash messages set up
<li>add.php</li>
  - Requires successful login to work
  - Form fields with data validation (strlen & !is_numeric)
  - Set up to prevent code injection into site
  - Prepared statements using PDO
  - SQl query to insert into database
  - Flash messages set up
<li>edit.php</li>
   - Requires successful login to work
  - Form fields with data validation (!is_numeric)
  - Set up to prevent code injection into site
  - Prepared statements using PDO
  - SQl query to update database
  - Flash messages set up
  - Guardians set up to ensure specific data requirements are present before changing data
<li>delete.php</li>
  - Requires successful login to work
  - Prepared statements using PDO
  - SQl query to delete information in database
  - Set up to prevent code injection displaying on site
  - Flash messages set up
  - Guardians set up to ensure specific data requirements are present before changing data
<li>pdo.php</li>
  - Connects to database
<li>logout.php</li>
  - Session destroy
</ol>
