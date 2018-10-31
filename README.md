# blog-with-native-PHP MVC pattern

1. The application entry point is in the file index.php where the instance of the class app (file lib/base.php)is instantiated and variable 
$_SERVER['REQUEST_URI'] is passed for further parsing and starting methods in the controller ctrlIndex (file app/ctrlIndex.php) which is 
instansiated from class ctrl (file lib/base.php).

2. Class for working with the database MySQL is in the file lib/db.php (DB settings host:"localhost",username:"root",
password:"",dbname:"blog"). In the database blog was created two tables post and comments.

3. All sql requests to the database occur in the controller ctrlIndex (file app/ctrlIndex.php) with istantiation object method db->query.

4. Then data is rendering to the template files root tpl(files main.php layout, posts.php and post.php).

Thank you for attention!!!
