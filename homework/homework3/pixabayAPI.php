<?php
function getImageURLsFromPixabay($keyword, $orientation, $number,$safeSearch,$type,$order) {
    $curl = curl_init();
    $apiKey = "6509294-00a280679ef09752f7c28ab6d";
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://pixabay.com/api/?key=$apiKey&q=$keyword&image_type=$type&orientation=$orientation&safesearch=$safeSearch&per_page=$number&order=$order",
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
      if($data['hits'][$i]['webformatURL'] !== null) {
        $imageURLs[] = $data['hits'][$i]['webformatURL'];
      }
    }
    $err = curl_error($curl);
    curl_close($curl);
    
    return $imageURLs;
}

?>
