# dbSC
PHP object for direct MySQL access

A PHP class that simplifies connecting to a MySQL database by wrapping communication into a single package. By calling query () method, the object fills out with the results, which you can use to easily extract into your app. Supports both encrypted and unsecure password management.

The easiest way to use dbSC is to clone the service_profile.php file into your projects, customize it to your server information and then place the following lines on top of your PHP file:

include_once "dw/service_profile.php";
include_once "dw/dbsc.php";
$db = new dbSC ($dwservice_profile);

...now you have a $db object that you can use to access information.

here's a simple, fictional example:

$id = $_REQUEST ["id"];
$query = "SELECT * FROM persons WHERE person_id=$id";
$db->query ($query);

if($db->num_rows>0) {
  $name = $db->result (0, "person_name");
  $email = $db->result (0, "person_email");
} else {
  print "no user found!";
}


Have fun!
