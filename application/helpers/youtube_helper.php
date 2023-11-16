<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

function get_youtube_video_id($url) {
    $video_id = '';
    $url_parts = parse_url($url);
    if (isset($url_parts['query'])) {
        parse_str($url_parts['query'], $query_params);
        if (isset($query_params['v'])) {
            $video_id = $query_params['v'];
        }
    }
    return $video_id;
}

?>