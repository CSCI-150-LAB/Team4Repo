<?php
    // converts the feed to an XML format to be read by the rssExport.js
    $rssURL = "https://feeds.feedburner.com/fresnostatenews/rJvN";
    $content = file_get_contents($rssURL);

    header("Content-Type: application/rss+xml");
    echo $content;
    exit;
?>