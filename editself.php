<!doctype html>
<head>
<meta charset="UTF-8" />
</head>
<body>
<?php
require_once("php/page.class.php");
$page = new Page(2);
?>
<nav>
<ul class="navbar">
<?php echo $page->getMenu(); ?>
</ul>
</nav>
<h1>Edit Details</h1>
<form method="post" action="updateself.php">
<input type="hidden" name="userid" id="userid" value="<?php echo $page->getUser()->getUserid();?>" required readonly />
<label for="username">Username</label><input type="text" id="username" name="username" value="<?php echo $page->getUser()->getUsername();?>" required /><br />
<label for="firstname">First name</label><input type="text" id="firstname" name="firstname" value="<?php echo $page->getUser()->getFirstname();?>" required /><br />
<label for="surname">Surname</label><input type="text" id="surname" name="surname" value="<?php echo $page->getUser()->getSurname();?>" required /><br />
<label for="email">Email</label><input type="email" id="email" name="email" value="<?php echo $page->getUser()->getEmail();?>" required /><br />
<label for="dob">DOB</label><input type="date" id="dob" name="dob" value= "<?php echo $page->getUser()->getDOB();?>" required /><br />
<label for="userpass">Password</label><input type="password" id="userpass" name="userpass" /><br />
<button type="submit">Update Details</button>
</form>
</body>
</html>
