
<?php

error_reporting(-1);
ini_set('display_errors', 1);

$clientID       = '6cf757449bec0f3e958ec32f01934eb19e84b43d';
$clientSecret   = 'CgXADjw6UPvpBWeHUgy3fBS1n8LKS2vSBTcglzU8i5j5Dn97LqQzMtJQ3HdXeOjx4ZlobmNw9Qm8qXDngvUa/suBmHTUnfJBkc1yWtKb7XovP7UwTcGohQYzKE9hGSPT';
$redirectURI    = 'https://petgorilla.com';
//$redirectURI    = 'http://petgorilla.com';
$access_token   = '582f63ac14a12aed0da54755d3bb9dc7';
$cacheDir       = dirname(__FILE__) .'/cache/';
$albumID        = isset($_GET['album']) ? trim($_GET['album']) : 3827544;
$state          = md5(__FILE__);

if (empty($access_token)) {
    $code = isset($_GET['code']) ? $_GET['code'] : null;
    if (empty($code)) {

        $url = 'https://api.vimeo.com/oauth/authorize/?'. http_build_query(array(
            'client_id'     => $clientID,
            'redirect_uri'  => $redirectURI,
            'response_type' => 'code',
            'scope'         => implode(' ', array('public', 'private')),
            'state'         => $state,
        ));
        echo '<a href="'. $url .'">'. $url .'</a>';
        exit;

    } else {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.vimeo.com/oauth/access_token');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'grant_type'        => 'authorization_code',
            'redirect_uri'      => $redirectURI,
            'code'              => $code,
        ));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: basic '. base64_encode($clientID .':'. $clientSecret),
        ));

        $result = curl_exec($ch);
        $json   = json_decode($result, true);
        echo '<p>access_token: <strong>'. $json['access_token'] .'</strong></p>';
        exit;

    }
}

if (!is_writeable($cacheDir)) {
    die("Cache dir '$cacheDir' not writeable");
}

$cacheFile = rtrim($cacheDir, '/') .'/vimeo.'. md5($access_token .'.'. $albumID) .'.json';

if (!is_file($cacheFile) || filemtime($cacheFile) < (time() - (3600 * 6))) {
//if(!is_file($cacheFile)){

    $url = 'https://api.vimeo.com/me/albums/'. $albumID .'/videos/?'. http_build_query(array(
        'page'              => 1,
        'per_page'          => 50,
        'sort'              => 'manual',
        'access_token'      => $access_token
    ));

    /*
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: bearer '. $access_token,
    ));

    $result = curl_exec($ch);
    $info   = curl_getinfo($ch);

    if ($info['http_code'] != 200) {
        die('[]');
    }
    */

    $result = file_get_contents($url);

    $json   = json_decode($result, true);
    $videos = array();

    if (isset($json['data'])) {
        foreach ($json['data'] as $item) {

            preg_match('/\/([0-9]+)$/', $item['uri'], $matches);
            if (count($matches) < 2) {
                continue;
            }
            $videoID = $matches[1];

            $posters = array();
            $sizes = $item['pictures']['sizes'];
            usort($sizes, function($a, $b){
                return $a['width'] > $b['width'];
            });

            foreach ($sizes as $size) {
                if (!isset($posters['large']) && $size['width'] > 700) {
                    $posters['large'] = $size;
                    continue;
                }

                if (!isset($posters['medium']) && $size['width'] > 350) {
                    $posters['medium'] = $size;
                    continue;
                }

                if (!isset($posters['thumb'])) {
                    $posters['thumb'] = $size;
                    continue;
                }
            }

            $videos[] = array(
                'id'            => $videoID,
                'title'         => $item['name'],
                'description'   => $item['description'],
                'duration'      => (int) $item['duration'],
                'width'         => (int) $item['width'],
                'height'        => (int) $item['height'],
                'user'          => array(
                    'name'          => $item['user']['name'],
                ),
                'posters'       => $posters,
            );
        }
    }

    file_put_contents($cacheFile, json_encode($videos));
} else {
    $videos = json_decode(file_get_contents($cacheFile), true);
}


header('Content-Type: application/json');
echo json_encode($videos);
