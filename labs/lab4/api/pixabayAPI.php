<?php

//returns array with 100 URLs to images from Pixabay.com, based on a "keyword"
function getImageURLs($keyword, $orientation="horizontal", $number=100) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://pixabay.com/api/?key=6509294-00a280679ef09752f7c28ab6d&q=$keyword&image_type=photo&orientation=$orientation&safesearch=false&per_page=$number",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 15,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
      ),
    ));
    
    $jsonData = curl_exec($curl);
    $data = json_decode($jsonData, true); //true makes it an array!
    
    $imageURLs = array();
    for ($i = 0; $i < $number; $i++) {
    $imageURLs[] = $data['hits'][$i]['webformatURL'];
    }
    $err = curl_error($curl);
    curl_close($curl);
    
    return $imageURLs;
}

?>
