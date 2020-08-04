<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trains from Järvenpää to Helsinki</title>

  <link rel="stylesheet" type="text/css" href="reset.css" />
  <link rel="stylesheet" type="text/css" href="portfolio.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>
<body>
    <div>Next train to Helsinki leaves in </div>
    <?php 
    
    $url = 'http://rata.digitraffic.fi/api/v1/live-trains/station/JP?&departing_trains=5&include_nonstopping=false&train_categories=Commuter';
    //var_dump($url);
    /*$options = array(
      "http"=>array(
          "header"=>"User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad
      )
  );
  
  $context = stream_context_create($options);
  $url_result = file_get_contents($url, false, $context);
    var_dump($url_result);
    $data = json_decode($url_result);
    //echo $data;*/

    function getUrlContent($url) {
      fopen("cookies.txt", "w");
      $parts = parse_url($url);
      $host = $parts['host'];
      $ch = curl_init();
      $header = array('GET /1575051 HTTP/1.1',
          "Host: {$host}",
          'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
          'Accept-Language:en-US,en;q=0.8',
          'Cache-Control:max-age=0',
          'Connection:keep-alive',
          'Host:adfoc.us',
          'User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36',
      );
  
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
      curl_setopt($ch, CURLOPT_COOKIESESSION, true);
      curl_setopt($ch, CURLOPT_ENCODING , "gzip");
      curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookies.txt');
      curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookies.txt');
      curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
  }
  
  $url = 'http://rata.digitraffic.fi/api/v1/live-trains/station/JP?&departing_trains=5&include_nonstopping=false&train_categories=Commuter';
  $html = getUrlContent($url);

  echo $html;
    
    
    
    ?>
</body>