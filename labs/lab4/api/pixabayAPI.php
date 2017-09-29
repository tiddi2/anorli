<?php
function getImageURLs($keyword, $orientation="horizontal") {
  $number = 20;
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://pixabay.com/api/?key=6509294-00a280679ef09752f7c28ab6d&q=$keyword&image_type=photo&orientation=$orientation&safesearch=true&per_page=$number",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
      ),
    ));
    
    $jsonData = curl_exec($curl);
    $data = json_decode($jsonData, true);
    
    $imageURLs = array();
    for ($i = 0; $i < $number; $i++) {
      if(!empty($data['hits'][$i]['webformatURL'])) {
        $imageURLs[] = $data['hits'][$i]['webformatURL'];
      }
    }
    $err = curl_error($curl);
    curl_close($curl);
    return $imageURLs;
}
?>
