<?php
    include('execute-functions.php');

    $fixtureId = $_POST['fixtureId'];
    $date = $_POST['date'];
    $date = str_replace(" ","-",$date);
    $resType = $_POST['resType'];
    $requestLinkUrl = "https://tza-live-football.000webhostapp.com/request-link.php?fixtureId=$fixtureId&date=$date&resType=$resType";
    $response = json_decode(file_get_contents($requestLinkUrl), true);
    $streamLink = $response['streamLink'];
    echo $streamLink;
    start_stream($streamLink);
    echo "<script>window.close()</script>";
?>