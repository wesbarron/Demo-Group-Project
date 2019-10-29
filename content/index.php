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

$url = "http://www.omdbapi.com/?s=";
$search_key = $_POST["name"];
strtolower($search_key);
$search_key = str_replace(" ", "+", $search_key);
$api_key = "&apikey=d42aca4a";
$search_url = $url . $search_key . $api_key;


$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $search_url);
curl_setopt_array($handle,
array(
    CURLOPT_URL => $search_url,
    CURLOPT_RETURNTRANSFER => true
)
);
$output = curl_exec($handle);
$response = json_decode($output, true);
curl_close($handle);


$output = "<div>";
$output .= "<ul>";

foreach ($response['Search'] as $movie) {
$output .= "<h3>".$movie['Title']."</h3>";
$output .= "<li>".$movie['Year']."</li>";
$output .= "<li class='imdb-ID'>".$movie['imdbID']."</li>";
$output .= "<img src='" . $movie['Poster'] . "' width='250px' height='300px' alt='Comming Soon!'>";
}
$output .= "</ul>";
$output .= "</div>";

echo $output;

?>
</div>


</body>
</html>