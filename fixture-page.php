<?php
    include('configurations.php');
    include('execute-functions.php');

    $fixtureData;

    $fixtureId;
    $leagueName;
    $leagueBackground;

    $fixtureId = $_POST['fixtureId'];
    $leagueName = $_POST['leagueName'];
    $leagueBackground = $_POST['leagueBackground'];

    // Temporary code 
    // $fixtureId = 868257;
    // $leagueName = "Premier League";
    // $leagueBackground = "images/premier_league_background.jpg";
    // Temporary code 


    $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://v3.football.api-sports.io/fixtures?id=$fixtureId&timezone=Asia/Yangon",
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
            $fixtureData =  $fixtureDataArray;
        }

    // function getFixtureData($API_KEY,$fixtureId) {}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixture</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e2c9faac31.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/fixture-page-style.css">
    <link rel="stylesheet" href="styles/copyright-section-style.css">
</head>
<body>
    <header style="background-image: url('<?php echo $leagueBackground?>');">
        <div class="overlay"></div>
        <div class="live-status" style="visibility: <?php echo is_match_in_progress($fixtureData,$fixtureId)==true ? "visible" : "hidden" ;?>;">
            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
            <div class="text-wrapper">Live Now</div>
        </div>
        <div class="fixture-info-wrapper">
            <div class="titles-wrapper">
                <div class="title"><?php echo $leagueName?> Match Day</div>
                <div class="sub-title">Status: match has <?php echo is_match_in_progress($fixtureData,$fixtureId)==false ? "not" : "";?> been started</div>
            </div>
            <div class="match-info-wrapper">
                <div class="team-wrapper home">
                    <div class="logo-wrapper" style="background-image: url('<?php echo get_team_logo($fixtureData,$fixtureId,true)?>');"></div>
                    <div class="team-name-wrapper"><?php echo get_team_name($fixtureData,$fixtureId,true);?></div>
                </div>
                <div class="date-time-wrapper">
                    <div class="time-wrapper"><?php echo get_match_start_date_or_time($fixtureData,$fixtureId,true);?></div>
                    <div class="date-wrapper"><?php echo get_match_start_date_or_time($fixtureData,$fixtureId,false);?></div>
                </div>
                <div class="team-wrapper away">
                    <div class="logo-wrapper" style="background-image: url('<?php echo get_team_logo($fixtureData,$fixtureId,false)?>');"></div>
                    <div class="team-name-wrapper"><?php echo get_team_name($fixtureData,$fixtureId,false);?></div>
                </div>
            </div>
            <div class="detail-wrapper">Stream all the matches that are available in this web based application. You can watch all the matches with high class channels which are no buffering and provided by Blacksky. For SD resolution 3-5 MB, for HD resolution 5-7 MB is recommended and for better feeling experience with FHD resolution we recommended your internet speed to watch within 7-10mb. All the functionality provided in this website are created and developed by <span>Thant Zin Aung.</span></div>
        </div>
    </header>

    <section id="channels">
        <div class="top-bar-wrapper channel-title english">
            <div class="v-line v-line-1"></div>
            <div class="title-wrapper">Live Stream With English Voice</div>
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
        
        <div class="channel-list-wrapper">
            <form action="stream_video.php" method="POST" target="_blank">
                <input type="text" name="fixtureId" value="<?php echo $fixtureId;?>" style="display:none;">
                <input type="text" name="date" value="<?php echo get_match_start_date_or_time($fixtureData,$fixtureId,false);?>" style="display:none;">
                <input type="text" name="resType" value="efhd" style="display:none;">
                <button class="channel-wrapper eng-fhd-channel" type="submit">
                    <div class="channel-resolution-wrapper">
                        <div class="channel-resolution-name">High Resolution</div>
                        <div class="channel-resolution-short-name">FHD ( 1920 x 1080 )</div>
                    </div>
                    <div class="channel-detail-wrapper">
                        This channel provided high resolution/frame-rate and provide the user to get clear and satisfied feeling experience. Recommended speed: 7-10 MB
                    </div>
                </button>
            </form>

            <form action="stream_video.php" method="POST" target="_blank">
                <input type="text" name="fixtureId" value="<?php echo $fixtureId;?>" style="display:none;">
                <input type="text" name="date" value="<?php echo get_match_start_date_or_time($fixtureData,$fixtureId,false);?>" style="display:none;">
                <input type="text" name="resType" value="ehd" style="display:none;">
                <button class="channel-wrapper eng-hd-channel" type="submit">
                    <div class="channel-resolution-wrapper">
                        <div class="channel-resolution-name">Middle Resolution</div>
                        <div class="channel-resolution-short-name">HD ( 1280 x 720 )</div>
                    </div>
                    <div class="channel-detail-wrapper">
                        This channel provided high resolution/frame-rate and provide the user to get clear and satisfied feeling experience. Recommended speed: 5-7 MB
                    </div>
                </button>
            </form>

            <form action="stream_video.php" method="POST" target="_blank">
                <input type="text" name="fixtureId" value="<?php echo $fixtureId;?>" style="display:none;">
                <input type="text" name="date" value="<?php echo get_match_start_date_or_time($fixtureData,$fixtureId,false);?>" style="display:none;">
                <input type="text" name="resType" value="esd" style="display:none;">
                <button class="channel-wrapper eng-fhd-channel" type="submit">
                    <div class="channel-resolution-wrapper">
                        <div class="channel-resolution-name">Low Resolution</div>
                        <div class="channel-resolution-short-name">SD ( 720 x 480 )</div>
                    </div>
                    <div class="channel-detail-wrapper">
                        This channel provided high resolution/frame-rate and provide the user to get clear and satisfied feeling experience. Recommended speed: 3-5 MB
                    </div>
                </button>
            </form>
        </div>

        <div class="top-bar-wrapper channel-title non-english">
            <div class="v-line v-line-1"></div>
            <div class="title-wrapper">Live Stream With Non-English Voice</div>
        </div>

        <div class="channel-list-wrapper">
            <form action="stream_video.php" method="POST" target="_blank">
                <input type="text" name="fixtureId" value="<?php echo $fixtureId;?>" style="display:none;">
                <input type="text" name="date" value="<?php echo get_match_start_date_or_time($fixtureData,$fixtureId,false);?>" style="display:none;">
                <input type="text" name="resType" value="nefhd" style="display:none;">
                <button class="channel-wrapper non-eng-fhd-channel" type="submit">
                    <div class="channel-resolution-wrapper">
                        <div class="channel-resolution-name">High Resolution</div>
                        <div class="channel-resolution-short-name">FHD ( 1920 x 1080 )</div>
                    </div>
                    <div class="channel-detail-wrapper">
                        This channel provided high resolution/frame-rate and provide the user to get clear and satisfied feeling experience. Recommended speed: 7-10 MB
                    </div>
                </button>
            </form>

            <form action="stream_video.php" method="POST" target="_blank">
                <input type="text" name="fixtureId" value="<?php echo $fixtureId;?>" style="display:none;">
                <input type="text" name="date" value="<?php echo get_match_start_date_or_time($fixtureData,$fixtureId,false);?>" style="display:none;">
                <input type="text" name="resType" value="nehd" style="display:none;">
                <button class="channel-wrapper non-eng-hd-channel" type="submit">
                    <div class="channel-resolution-wrapper">
                        <div class="channel-resolution-name">Middle Resolution</div>
                        <div class="channel-resolution-short-name">HD ( 1280 x 720 )</div>
                    </div>
                    <div class="channel-detail-wrapper">
                        This channel provided high resolution/frame-rate and provide the user to get clear and satisfied feeling experience. Recommended speed: 5-7 MB
                    </div>
                </button>
            </form>

            <form action="stream_video.php" method="POST" target="_blank">
                <input type="text" name="fixtureId" value="<?php echo $fixtureId;?>" style="display:none;">
                <input type="text" name="date" value="<?php echo get_match_start_date_or_time($fixtureData,$fixtureId,false);?>" style="display:none;">
                <input type="text" name="resType" value="nesd" style="display:none;">
                <button class="channel-wrapper non-eng-sd-channel" type="submit">
                    <div class="channel-resolution-wrapper">
                        <div class="channel-resolution-name">Low Resolution</div>
                        <div class="channel-resolution-short-name">SD ( 720 x 480 )</div>
                    </div>
                    <div class="channel-detail-wrapper">
                        This channel provided high resolution/frame-rate and provide the user to get clear and satisfied feeling experience. Recommended speed: 3-5 MB
                    </div>
                </button>
            </form>
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

    <script src="scripts/fixture-page-script.js"></script>
</body>
</html>