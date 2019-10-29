<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <form id="contact" action="" method="post">
    <h3>Movie Search</h3>

    <fieldset>
      <input name="name" placeholder="Movie Title" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>

</div>

<div>
<?php

 getComic();

?>
</div>


</body>
</html>