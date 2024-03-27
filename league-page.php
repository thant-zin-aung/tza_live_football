<?php
    include('configurations.php');
    include('execute-functions.php');

    $leagueId;
    $leagueName;
    $leagueBackground;
    $leagueLogo;
    $fixtureData;

    $leagueId = $_POST['leagueId'];
    $leagueName = $_POST['leagueName'];
    $leagueBackground = $_POST['leagueBackground'];
    $leagueLogo = $_POST['leagueLogo'];

    $fromDate = get_from_date();
    $toDate = get_to_date();

    // Temporary code 
    // $leagueId = 39;
    // $leagueName = "Premier League";
    // $leagueBackground = "images/premier_league_background.jpg";
    // $leagueLogo = "images/premier_league_logo.jpg";
    // Temporary code 

    $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://v3.football.api-sports.io/fixtures?league=$leagueId&season=$currentSeason&from=$fromDate&to=$toDate&timezone=Asia/Yangon",
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
            $fixtureDataArray = json_decode($response,true);
            $fixtureData = $fixtureDataArray;
    }

    // function getFixtureData($API_KEY,$leagueId,$currentSeason){}

    // $fixtureData = getFixtureData($API_KEY,$leagueId,$currentSeason);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>League</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e2c9faac31.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/league-page-style.css">
    <link rel="stylesheet" href="styles/copyright-section-style.css">
</head>
<body>
    <header style="background-image: url('<?php echo $leagueBackground?>');">
        <div class="overlay"></div>
        <div class="league-info-wrapper">
            <div class="league-logo" style="background-image: url('<?php echo $leagueLogo?>');"></div>
            <div class="title"><span>THANT ZIN AUNG Live Football</span> - <?php echo $leagueName;?></div>
            <div class="sub-title">Thant Zin Aung Live page: Official website www.tzafootballlive.infinityfreeapp.com to watch live football with the best Myanmar commentary high-speed links.</div>
        </div>
    </header>

    <section id="matches">
        <div class="top-bar-wrapper">
            <div class="v-line v-line-1"></div>
            <div class="title-wrapper">The List Of Total Matches</div>
            <div class="v-line v-line-2"></div>
            <div class="league-name"><?php echo $leagueName;?></div>
            <div class="straight-line"></div>
            <div class="straight-line"></div>
            <div class="full-length-line">
                <div class="play-music-wrapper">Play</div>
                <div class="rotate-line"></div>
                <div class="rotate-line"></div>
                <div class="api-level api-level-1">
                    <div class="label">API Level 1</div>
                    <div class="percen"><?php echo get_account_status($API_KEY);?>%</div>
                </div>
                <div class="rotate-line"></div>
                <div class="rotate-line"></div>
                <div class="api-level api-level-2">
                    <div class="label">API Level 2</div>
                    <div class="percen">0%</div>
                </div>
                <div class="rotate-line"></div>
                <div class="rotate-line"></div>
                <div class="api-level api-level-3 back-button">
                    <div class="label">Back</div>
                    <div class="percen"><i class="fa-solid fa-arrow-left-long"></i></div>
                </div>
                <div class="rotate-line"></div>
                <div class="rotate-line"></div>
                <div class="intro-text">
                <marquee direction="left" scrollamount="8">In order to get the latest status and play music, this tab has been added as a newer version to be able to navigate easily and switch betten tabs. Thant Zin Aung Live Football web based application was developed for personal use and not for commercial use.</marquee>
                    <!-- <marquee direction="right">In order to get the latest status and to play music, this tab has been added as a newer version to be able to navigate easily and switch betten tabs.</marquee> -->
                </div>
            </div>
        </div>

        <div class="match-list-wrapper">
            <?php 
                $totalMatches = get_total_matches($fixtureData);
                for ( $count = 0 ; $count < $totalMatches ; $count++ ) {
                    $fixtureId = get_fixture_id($fixtureData,$count);
                    $venueId = get_venue_id($fixtureData,$count);

            ?>

            <div class="match-wrapper" style="background-image: url('<?php echo get_stadium_logo($venueId)?>');">
                <div class="overlay"></div>
                <div class="league-title"><?php echo $leagueName;?></div>
                <div class="info-wrapper">
                    <div class="upper-layer">
                        <div class="live-status" style="visibility: <?php echo is_match_in_progress($fixtureData,$fixtureId)==true ? "visible" : "hidden" ;?>;">
                            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
                            <div class="text-wrapper">Live</div>
                        </div>
                    </div>
                    <div class="mid-layer">
                        <div class="team-wrapper home">
                            <div class="logo-wrapper" style="background-image: url('<?php echo get_team_logo($fixtureData,$fixtureId,true)?>');"></div>
                            <div class="team-name-wrapper"><?php echo get_team_name($fixtureData,$fixtureId,true);?></div>
                        </div>
                        <div class="date-time-wrapper">
                            <div class="time-wrapper"><?php echo get_match_start_date_or_time($fixtureData,$fixtureId,true);?></div>
                            <div class="date-wrapper"><?php echo get_match_start_date_or_time($fixtureData,$fixtureId,false);?></div>
                        </div>
                        <div class="team-wrapper away">
                            <div class="logo-wrapper" style="background-image: url('<?php echo get_team_logo($fixtureData,$fixtureId,false);?>');"></div>
                            <div class="team-name-wrapper"><?php echo get_team_name($fixtureData,$fixtureId,false);?></div>
                        </div>

                    </div>
                    <div class="bottom-layer">
                        <form action="fixture-page.php" method="POST">
                            <input type="text" name="fixtureId" value="<?php echo $fixtureId;?>" style="display: none;">
                            <input type="text" name="leagueName" value="<?php echo $leagueName;?>" style="display: none;">
                            <input type="text" name="leagueBackground" value="<?php echo $leagueBackground?>" style="display: none;">
                            <button class="watch-button-wrapper" type="submit" name="watchButton">Watch Live Stream</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </section>


    <section id="copyright">
        <div class="upper-layer">
            <div class="left-wrapper"><span>Thant Zin Aung</span> Live Football</div>
            <div class="right-wrapper">
                <div class="social-wrapper fb"><i class="fa-brands fa-facebook-f"></i></div>
                <div class="social-wrapper tt"><i class="fa-brands fa-twitter"></i></div>
                <div class="social-wrapper ttok"><i class="fa-brands fa-tiktok"></i></div>
                <div class="social-wrapper wa"><i class="fa-brands fa-whatsapp fa-lg"></i></div>
            </div>
        </div>
        <div class="mid-layer">
            <div class="tab-wrapper link-wrapper">
                <div class="link title">Links</div>
                <div class="link">Home</div>
                <div class="link">Leagues</div>
                <div class="link">Matches</div>
                <div class="link">Channels</div>
            </div>

            <div class="tab-wrapper service-wrapper">
                <div class="link title">Service</div>
                <div class="link">Website</div>
                <div class="link">Desktop App</div>
                <div class="link">Mobile Apps</div>
                <div class="link">Live TV Channel</div>
            </div>
            
            <div class="tab-wrapper language-wrapper">
                <div class="link title">Languages</div>
                <div class="link">HTML 5</div>
                <div class="link">CSS 3</div>
                <div class="link">Javascript</div>
                <div class="link">Pure PHP</div>
            </div>

            <div class="tab-wrapper contact-wrapper">
                <div class="link title">Contact</div>
                <div class="link">+959765544334</div>
                <div class="link">+959765544331</div>
                <div class="link">www.facebook.com/tzalivefootball</div>
                <div class="link">thantzinaung.web.dev@gmail.com</div>
            </div>
        </div>

        <div class="bottom-layer">
            <div class="copyright-text">Copyright &copy; 2023 tzalivefootball</div>
            <div class="developer-wrapper">
                <div class="developed-by">Developed by</div>
                <div class="developer-name">Thant Zin Aung - Freelance Java Developer</div>
            </div>
        </div>
    </section>

    <script src="scripts/league-page-script.js"></script>
</body>
</html>