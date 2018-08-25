# PHP-Training
PHP training storage.

MOOC: Coursera - Building Database Applications in PHP<br/>
Instructor: Charles Severance - University of Michigan<br/>
Course Completion date: 25th August 2018<br/><br/>
Content index:

<ol>
<li>index.php</li>
  - Opening page<br/>
  - Guides users to the Login page<br/>
  - Kicks off user session
<li>login.php</li>
  - Continues session<br/>
  - Allows users to login<br/>
  - Password set using md5 Hash<br/>
  - Form fields with data validation (strlen & strpos)<br/>
  - Set up to prevent code injection into site<br/>
  - Error logging<br/>
  - Requires succcessful login to display database details<br/>
  - Flash messages set up
<li>add.php</li>
  - Requires successful login to work<br/>
  - Form fields with data validation (strlen & !is_numeric)<br/>
  - Set up to prevent code injection into site<br/>
  - Prepared statements using PDO<br/>
  - SQl query to insert into database<br/>
  - Flash messages set up
<li>edit.php</li>
   - Requires successful login to work<br/>
  - Form fields with data validation (!is_numeric)<br/>
  - Set up to prevent code injection into site<br/>
  - Prepared statements using PDO<br/>
  - SQl query to update database<br/>
  - Flash messages set up<br/>
  - Guardians set up to ensure specific data requirements are present before changing data
<li>delete.php</li>
  - Requires successful login to work<br/>
  - Prepared statements using PDO<br/>
  - SQl query to delete information in database<br/>
  - Set up to prevent code injection displaying on site<br/>
  - Flash messages set up<br/>
  - Guardians set up to ensure specific data requirements are present before changing data
<li>pdo.php</li>
  - Connects to database
<li>logout.php</li>
  - Session destroy
</ol>
