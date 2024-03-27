<?php
    include('configurations.php');
    date_default_timezone_set("Asia/Yangon");

    function get_from_date() {
        return date("Y-m-d");
    }
    
    function get_to_date() {
        $date=date_create("Now");
        date_add($date,date_interval_create_from_date_string("1 day"));
        return date_format($date,"Y-m-d");
    }

    function get_account_status($API_KEY) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://v3.football.api-sports.io/status",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "X-RapidAPI-Host: api-football-beta.p.rapidapi.com",
                "X-RapidAPI-Key: $API_KEY"
            ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $status = json_decode($response,true);
            return $status['response']['requests']['current'];
        }
    }

    function get_date_range($fixtureData) {
        $date=date_create($fixtureData['parameters']['from']);
        $fromDate = date_format($date,"Y M d");
        $date=date_create($fixtureData['parameters']['to']);
        $toDate = date_format($date,"Y M d");
        return $fromDate." - ".$toDate;
    }

    function get_total_matches($fixtureData) {
        return count($fixtureData['response']);
    }

    function is_match_live($shortStatus) {
        return $shortStatus=="1H" || $shortStatus=="1H" || $shortStatus=="HT" || $shortStatus=="2H" || $shortStatus=="ET" || 
                $shortStatus=="BT" || $shortStatus=="P" || $shortStatus=="SUSP" || $shortStatus=="INT";
    }
    function is_match_finished($shortStatus) {
        return $shortStatus=="FT" || $shortStatus=="AET" || $shortStatus=="PEN";
    }

    function get_total_live_matches($fixtureData) {
        $totalLiveMatches = 0;
        for ( $count = 0 ; $count < count($fixtureData['response']) ; $count++ ) {
            if ( is_match_live($fixtureData['response'][$count]['fixture']['status']['short']) ) {
                ++$totalLiveMatches;
            }
        }
        return $totalLiveMatches;
    }

    function get_total_not_started_matches($fixtureData) {
        $notStartedMatches = 0;
        for ( $count = 0 ; $count < count($fixtureData['response']) ; $count++ ) {
            if ( $fixtureData['response'][$count]['fixture']['status']['short'] == "NS" ) {
                ++$notStartedMatches;
            }
        }
        return $notStartedMatches;
    }

    function get_league_id($fixtureData) {
        return $fixtureData['parameters']['league'];
    }

    function get_fixture_id($fixtureData,$responseIndex) {
        return $fixtureData['response'][$responseIndex]['fixture']['id'];
    }

    function get_venue_id($fixtureData,$responseIndex) {
        return $fixtureData['response'][$responseIndex]['fixture']['venue']['id'];
    }

    function is_match_in_progress($fixtureData,$fixtureId) {
        for ( $count = 0 ; $count < count($fixtureData['response']) ; $count++ ) {
            if ( $fixtureData['response'][$count]['fixture']['id'] == $fixtureId && is_match_live($fixtureData['response'][$count]['fixture']['status']['short'])) {
                return true;
                break;
            }
        }
        return false;
    }

    function get_stadium_logo($venueId) {
        return "images/venue_logos/$venueId.png";
    }
    function get_team_logo($fixtureData,$fixtureId,$isHome) {
        for ( $count = 0 ; $count < count($fixtureData['response']) ; $count++ ) {
            if ( $fixtureData['response'][$count]['fixture']['id'] == $fixtureId ) {
                $teamId;
                if ( $isHome ) $teamId = $fixtureData['response'][$count]['teams']['home']['id'];
                else $teamId = $fixtureData['response'][$count]['teams']['away']['id'];
                return "images/team_logos/$teamId.png";
            }
        }
        return "";
    }

    function get_team_name($fixtureData,$fixtureId,$isHome) {
        for ( $count = 0 ; $count < count($fixtureData['response']) ; $count++ ) {
            if ( $fixtureData['response'][$count]['fixture']['id'] == $fixtureId ) {
                if ( $isHome ) return $fixtureData['response'][$count]['teams']['home']['name'];
                else return $fixtureData['response'][$count]['teams']['away']['name'];
            }
        }
        return "";
    }

    function get_match_start_date_or_time($fixtureData,$fixtureId,$isTime) {
        for ( $count = 0 ; $count < count($fixtureData['response']) ; $count++ ) {
            if ( $fixtureData['response'][$count]['fixture']['id'] == $fixtureId ) {
                $timestamp = $fixtureData['response'][$count]['fixture']['timestamp'];
                if ( $isTime ) {
                    $matchStatusShortCode = $fixtureData['response'][$count]['fixture']['status']['short'];
                    if ( is_match_live($matchStatusShortCode) || is_match_finished($matchStatusShortCode) ) {
                        $homeGoal = $fixtureData['response'][$count]['goals']['home'];
                        $awayGoal = $fixtureData['response'][$count]['goals']['away'];
                        return $homeGoal.' - '.$awayGoal;
                    } else {
                        return  date("h:i a",$timestamp);
                    }
                }
                else return date('Y F d', $timestamp);
            }
        }
        return "NaN";
    }

    function start_stream($videoLink) {
        $batFile = fopen("play-script.bat", "w");
        $script = "@echo off\nsetlocal EnableDelayedExpansion\nvlc.exe $videoLink\ntaskkill /im cmd.exe /f\nendlocal";
        fwrite($batFile,$script);
        fclose($batFile);
        exec("start cmd.exe /k play-script.bat");
    }
?>