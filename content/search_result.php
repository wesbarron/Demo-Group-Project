<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php

$url = "http://www.omdbapi.com/?s=";
$search_key = $_GET["name"];
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


$output = "<ul>";
foreach ($response['Search'] as $movie) {
$output .= '<a class="movie-click" data-toggle="modal" data-target="#myModal">';
$output .= "<h3>".$movie['Title']."</h3>";
$output .= "<li>".$movie['Year']."</li>";
$output .= "<li class='imdb-ID'>".$movie['imdbID']."</li>";
$output .= "<img src='" . $movie['Poster'] . "' width='250px' height='300px' alt='Comming Soon!'>";
$output .= "</a><br><br><br>";
}
$output .= "</ul>";

echo $output;
?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/f1c966bcb4.js"></script>

      <script>
      $('.movie-click').click(function (e){
          $.ajax({
              type: 'get',
              url: "movie-modal.php",
              data: {data : true},
              dataType:"HTML",
              success: function(data)
              {
                  $('.modal-content').html(data) // The server's response is now placed inside your target div
              },
              error: function()
              {
                  alert("Failed to get data.");
            }
          }); // Ajax close
          return false; // So the button click does not refresh the page
      }) // Function end
    </script>

  </body>
  </html>
