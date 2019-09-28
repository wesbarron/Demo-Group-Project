<?php
include 'search_result.php';

$url = "http://www.omdbapi.com/?i=";
$search_key = $movie['imdbID'];
//strtolower($search_key);
//$search_key = str_replace(" ", "+", $search_key);
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
$output .= '<!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">'.$movie["Title"].'</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          Year: ' . $movie["Year"] . '<br>
          imdbID: ' . $movie["imdbID"] . '<br>
          Type: ' . $movie["Type"] . '<br>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>';
?>

