<?php

session_start();

require_once 'helpers/security.php';

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Form</title>

  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="contact">
  <?php if (!empty($errors)): ?>
    <div class="panel">
      <ul>
        <li>
          <?php echo implode('</li><li>', $errors) ?>
        </li>
      </ul>
    </div>
  <?php endif ?>
    <form action="contact.php" method="post">
      <label for="">
        Your name *
        <input type="text" name="name" autocomplette="off" <?php echo (null !== e($fields['name'])) ? ' value="' . $fields['name'] . '"' : '' ?>>
      </label>
      <label for="">
        Your email adress
        <input type="email" name="email" autocomplette="off" <?php echo (null !== e($fields['email'])) ? ' value="' . $fields['email'] . '"' : '' ?>>
      </label>
      <label for="">
        Your message *
        <textarea name="message" rows="8"><?php echo (null !== e($fields['message'])) ? $fields['message'] : '' ?></textarea>
      </label>
      <input type="submit" value="Send">

      <p class="muted">* means a required field</p>    
    </form>
  </div>
</body>
</html>

<?php
/*
 * TODO
 */
unset($_SESSION['errors']);
?>