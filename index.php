<?php
    include('configurations.php');
    include('execute-functions.php');
    
    // function getFixtureData($API_KEY,$leagueId,$currentSeason) {
    //     $curl = curl_init();
    //     curl_setopt_array($curl, [
    //         CURLOPT_URL => "https://v3.football.api-sports.io/fixtures?league=$leagueId&season=$currentSeason&from=2023-04-22&to=2023-04-23&timezone=Asia/Yangon",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => [
    //             "Content-Type: application/json",
    //             "X-RapidAPI-Host: api-football-beta.p.rapidapi.com",
    //             "X-RapidAPI-Key: $API_KEY"
    //         ],
    //     ]);
        
    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);
        
    //     curl_close($curl);
        
    //     if ($err) {
    //         echo "cURL Error #:" . $err;
    //     } else {
    //         $fixtureDataArray = json_decode($response,true);
    //         return $fixtureDataArray;
    //     }
    // }


    // function getFixtureData($API_KEY,$leagueId,$currentSeason){}

    // $premierLeagueFixtureData = getFixtureData($API_KEY,39,$currentSeason);
    // $bundesligaFixtureData = getFixtureData($API_KEY,78,$currentSeason);
    // $serieAFixtureData = getFixtureData($API_KEY,135,$currentSeason);
    // $laLigaFixtureData = getFixtureData($API_KEY,140,$currentSeason);
    // $lige1FixtureData = getFixtureData($API_KEY,61,$currentSeason);
    // $uefaChampionLeagueFixtureData = getFixtureData($API_KEY,2,$currentSeason);
    // $uefaEuropaLeagueFixtureData = getFixtureData($API_KEY,3,$currentSeason);
    // $englandChampionshipFixtureData = getFixtureData($API_KEY,40,$currentSeason);
    // $englandFaFixtureData = getFixtureData($API_KEY,45,$currentSeason);
    // $euroChampionshipFixtureData = getFixtureData($API_KEY,4,$currentSeason);
    // $worldCupFixtureData = getFixtureData($API_KEY,1,$currentSeason);

    $premierLeagueId = 39;
    $bundesligaId = 78;
    $serieaId = 135;
    $laligaId = 140;
    $ligue1Id = 61;
    $uefaChampionId = 2;
    $uefaEuropaId = 3;
    $englandChampionShipId = 40;
    $englandFaId = 45;
    $euroChampionShipId = 4;
    $worldCupId = 1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TZA Football Live</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e2c9faac31.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/login-button-style.css">
    <link rel="stylesheet" href="styles/app-style.css">
    <link rel="stylesheet" href="styles/copyright-section-style.css">
</head>
<body>
    <header style="background-image: url('images/stadium.jpg');">
        <div class="overlay"></div>
        <div class="app-info-wrapper">
            <div class="left">
                <p class="title"><span>THANT ZIN AUNG Live Football</span> - THE FASTEST ONLINE FOOBALL VIEWING CHANNELS</p>
                <p class="sub-title">Thant Zin Aung Live page: Official website www.tzafootballlive.infinityfreeapp.com to watch live football with the best Myanmar commentary high-speed links.</p>
            </div>
            <div class="right">
                <div class="image"></div>
            </div>
        </div>
    </header>
    <section id="league">
        <div class="top-bar-wrapper">
            <div class="v-line v-line-1"></div>
            <div class="title-wrapper">The List Of Total League</div>
            <div class="v-line v-line-2"></div>
            <div class="login-info-wrapper">
                <a class="btn login-button" href="#">Login to account</a>
                <div class="account-name">Thant Zin Aung</div>
            </div>
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
                <div class="api-level api-level-3">
                    <div class="label">API Level 3</div>
                    <div class="percen">0%</div>
                </div>
                <div class="rotate-line"></div>
                <div class="rotate-line"></div>
                <div class="intro-text">
                <marquee direction="left" scrollamount="8">In order to get the latest status and play music, this tab has been added as a newer version to be able to navigate easily and switch betten tabs. Thant Zin Aung Live Football web based application was developed for personal use and not for commercial use.</marquee>
                    <!-- <marquee direction="right">In order to get the latest status and to play music, this tab has been added as a newer version to be able to navigate easily and switch betten tabs.</marquee> -->
                </div>
            </div>
            
        </div>

        <div class="league-list-wrapper">
            <div class="league-wrapper premier-league" style="background-image: url('images/england_flag.png');">
                <div class="overlay"></div>
                <div class="info-wrapper">
                    <div class="upper-layer">
                        <div class="logo-wrapper" style="background-image: url('images/premier_league_logo.jpg');"></div>
                        <div class="league-info-wrapper">
                            <div class="name-wrapper">Premier League</div>
                            <div class="country-wrapper">
                                <div class="text">England</div>
                                <div class="flag" style="background-image: url('images/england_flag.png');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mid-wrapper">
                        <div class="date">Date: <span>Unknown</span></div>
                        <div class="total-matches">Total matches: <span>Unknown matches</span></div>
                    </div>
                    <div class="bottom-wrapper">
                        <div class="live-wrapper">
                            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
                            <div class="text-wrapper">Live</div>
                        </div>
                        <div class="not-started-wrapper">League Status</div>
                        <form action="league-page.php" method="POST">
                            <input type="text" name="leagueId" value="<?php echo $premierLeagueId;?>" style="display: none;">
                            <input type="text" name="leagueName" value="Premier League" style="display: none;">
                            <input type="text" name="leagueBackground" value="images/premier_league_background.jpg" style="display: none;">
                            <input type="text" name="leagueLogo" value="images/premier_league_logo.jpg" style="display: none;">
                            <button class="explore-button-wrapper" type="submit" name="exploreButton" style="background-color: transparent;">EXPLORE</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="league-wrapper bundesliga" style="background-image: url('images/germany_flag.jpg');">
                <div class="overlay"></div>
                <div class="info-wrapper">
                    <div class="upper-layer">
                        <div class="logo-wrapper" style="background-image: url('images/bundesliga_logo.png');"></div>
                        <div class="league-info-wrapper">
                            <div class="name-wrapper">Bundesliga</div>
                            <div class="country-wrapper">
                                <div class="text">Germany</div>
                                <div class="flag" style="background-image: url('images/germany_flag.jpg');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mid-wrapper">
                        <div class="date">Date: <span>Unknown</span></div>
                        <div class="total-matches">Total matches: <span>Unknown matches</span></div>
                    </div>
                    <div class="bottom-wrapper">
                        <div class="live-wrapper"">
                            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
                            <div class="text-wrapper">Live</div>
                        </div>
                        <div class="not-started-wrapper">League Status</div>
                        <form action="league-page.php" method="POST">
                            <input type="text" name="leagueId" value="<?php echo $bundesligaId;?>" style="display: none;">
                            <input type="text" name="leagueName" value="Bundesliga" style="display: none;">
                            <input type="text" name="leagueBackground" value="images/bundesliga_background.jpg" style="display: none;">
                            <input type="text" name="leagueLogo" value="images/bundesliga_logo.png" style="display: none;">
                            <button class="explore-button-wrapper" type="submit" name="exploreButton" style="background-color: transparent; ">EXPLORE</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="league-wrapper" style="background-image: url('images/italy_flag.png');">
                <div class="overlay"></div>
                <div class="info-wrapper">
                    <div class="upper-layer">
                        <div class="logo-wrapper" style="background-image: url('images/serie_a_logo.png');"></div>
                        <div class="league-info-wrapper">
                            <div class="name-wrapper">Serie A</div>
                            <div class="country-wrapper">
                                <div class="text">Italy</div>
                                <div class="flag" style="background-image: url('images/italy_flag.png');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mid-wrapper">
                        <div class="date">Date: <span>Unknown</span></div>
                        <div class="total-matches">Total matches: <span>Unknown matches</span></div>
                    </div>
                    <div class="bottom-wrapper">
                        <div class="live-wrapper">
                            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
                            <div class="text-wrapper">Live</div>
                        </div>
                        <div class="not-started-wrapper">League Status</div>
                        <form action="league-page.php" method="POST">
                            <input type="text" name="leagueId" value="<?php echo $serieaId;?>" style="display: none;">
                            <input type="text" name="leagueName" value="Serie A" style="display: none;">
                            <input type="text" name="leagueBackground" value="images/serie_a_background.jpg" style="display: none;">
                            <input type="text" name="leagueLogo" value="images/serie_a_logo.png" style="display: none;">
                            <button class="explore-button-wrapper" type="submit" name="exploreButton" style="background-color: transparent;">EXPLORE</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="league-wrapper premier-league" style="background-image: url('images/spain_flag.png');">
                <div class="overlay"></div>
                <div class="info-wrapper">
                    <div class="upper-layer">
                        <div class="logo-wrapper" style="background-image: url('images/la_liga_logo.png');"></div>
                        <div class="league-info-wrapper">
                            <div class="name-wrapper">La Liga</div>
                            <div class="country-wrapper">
                                <div class="text">Spain</div>
                                <div class="flag" style="background-image: url('images/spain_flag.png');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mid-wrapper">
                        <div class="date">Date: <span>Unknown</span></div>
                        <div class="total-matches">Total matches: <span>Unknown matches</span></div>
                    </div>
                    <div class="bottom-wrapper">
                        <div class="live-wrapper">
                            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
                            <div class="text-wrapper">Live</div>
                        </div>
                        <div class="not-started-wrapper">League Status</div>
                        <form action="league-page.php" method="POST">
                            <input type="text" name="leagueId" value="<?php echo $laligaId;?>" style="display: none;">
                            <input type="text" name="leagueName" value="La Liga" style="display: none;">
                            <input type="text" name="leagueBackground" value="images/la_liga_background.jpg" style="display: none;">
                            <input type="text" name="leagueLogo" value="images/la_liga_logo.png" style="display: none;">
                            <button class="explore-button-wrapper" type="submit" name="exploreButton" style="background-color: transparent;">EXPLORE</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="league-wrapper premier-league" style="background-image: url('images/france_flag.png');">
                <div class="overlay"></div>
                <div class="info-wrapper">
                    <div class="upper-layer">
                        <div class="logo-wrapper" style="background-image: url('images/ligue_1_logo.jpg');"></div>
                        <div class="league-info-wrapper">
                            <div class="name-wrapper">Ligue 1</div>
                            <div class="country-wrapper">
                                <div class="text">France</div>
                                <div class="flag" style="background-image: url('images/france_flag.png');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mid-wrapper">
                        <div class="date">Date: <span>Unknown</span></div>
                        <div class="total-matches">Total matches: <span>Unknown matches</span></div>
                    </div>
                    <div class="bottom-wrapper">
                        <div class="live-wrapper">
                            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
                            <div class="text-wrapper">Live</div>
                        </div>
                        <div class="not-started-wrapper">League Status</div>
                        <form action="league-page.php" method="POST">
                            <input type="text" name="leagueId" value="<?php echo $ligue1Id;?>" style="display: none;">
                            <input type="text" name="leagueName" value="Ligue 1" style="display: none;">
                            <input type="text" name="leagueBackground" value="images/ligue_1_background.jpg" style="display: none;">
                            <input type="text" name="leagueLogo" value="images/ligue_1_logo.jpg" style="display: none;">
                            <button class="explore-button-wrapper" type="submit" name="exploreButton" style="background-color: transparent;">EXPLORE</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="league-wrapper premier-league" style="background-image: url('images/europe_flag.png');">
                <div class="overlay"></div>
                <div class="info-wrapper">
                    <div class="upper-layer">
                        <div class="logo-wrapper" style="background-image: url('images/uefa_champion_leage_logo.jpg');"></div>
                        <div class="league-info-wrapper">
                            <div class="name-wrapper">UEFA Champion League</div>
                            <div class="country-wrapper">
                                <div class="text">Europe</div>
                                <div class="flag" style="background-image: url('images/europe_flag.png');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mid-wrapper">
                        <div class="date">Date: <span>Unknown</span></div>
                        <div class="total-matches">Total matches: <span>Unknown matches</span></div>
                    </div>
                    <div class="bottom-wrapper">
                        <div class="live-wrapper">
                            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
                            <div class="text-wrapper">Live</div>
                        </div>
                        <div class="not-started-wrapper">League Status</div>
                        <form action="league-page.php" method="POST">
                            <input type="text" name="leagueId" value="<?php echo $uefaChampionId;?>" style="display: none;">
                            <input type="text" name="leagueName" value="UEFA Champion League" style="display: none;">
                            <input type="text" name="leagueBackground" value="images/uefa_champion_league_background.jpg" style="display: none;">
                            <input type="text" name="leagueLogo" value="images/uefa_champion_league_logo.jpg" style="display: none;">
                            <button class="explore-button-wrapper" type="submit" name="exploreButton" style="background-color: transparent;">EXPLORE</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="league-wrapper premier-league" style="background-image: url('images/europe_flag.png');">
                <div class="overlay"></div>
                <div class="info-wrapper">
                    <div class="upper-layer">
                        <div class="logo-wrapper" style="background-image: url('images/uefa_europa_leage_logo.jpg');"></div>
                        <div class="league-info-wrapper">
                            <div class="name-wrapper">UEFA Europa League</div>
                            <div class="country-wrapper">
                                <div class="text">Europe</div>
                                <div class="flag" style="background-image: url('images/europe_flag.png');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mid-wrapper">
                        <div class="date">Date: <span>Unknown</span></div>
                        <div class="total-matches">Total matches: <span>Unknown matches</span></div>
                    </div>
                    <div class="bottom-wrapper">
                        <div class="live-wrapper">
                            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
                            <div class="text-wrapper">Live</div>
                        </div>
                        <div class="not-started-wrapper">League Status</div>
                        <form action="league-page.php" method="POST">
                            <input type="text" name="leagueId" value="<?php echo $uefaEuropaId;?>" style="display: none;">
                            <input type="text" name="leagueName" value="UEFA Europa League" style="display: none;">
                            <input type="text" name="leagueBackground" value="images/uefa_europa_league_background.avif" style="display: none;">
                            <input type="text" name="leagueLogo" value="images/uefa_europa_league_logo.jpg" style="display: none;">
                            <button class="explore-button-wrapper" type="submit" name="exploreButton" style="background-color: transparent;">EXPLORE</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="league-wrapper premier-league" style="background-image: url('images/england_flag.png');">
                <div class="overlay"></div>
                <div class="info-wrapper">
                    <div class="upper-layer">
                        <div class="logo-wrapper" style="background-image: url('images/england_championship_logo.png');"></div>
                        <div class="league-info-wrapper">
                            <div class="name-wrapper">England Championship</div>
                            <div class="country-wrapper">
                                <div class="text">England</div>
                                <div class="flag" style="background-image: url('images/england_flag.png');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mid-wrapper">
                        <div class="date">Date: <span>Unknown</span></div>
                        <div class="total-matches">Total matches: <span>Unknown matches</span></div>
                    </div>
                    <div class="bottom-wrapper">
                        <div class="live-wrapper">
                            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
                            <div class="text-wrapper">Live</div>
                        </div>
                        <div class="not-started-wrapper">League Status</div>
                        <form action="league-page.php" method="POST">
                            <input type="text" name="leagueId" value="<?php echo $englandChampionShipId;?>" style="display: none;">
                            <input type="text" name="leagueName" value="England Championship" style="display: none;">
                            <input type="text" name="leagueBackground" value="images/england_championship_background.jpg" style="display: none;">
                            <input type="text" name="leagueLogo" value="images/england_championship_logo.png" style="display: none;">
                            <button class="explore-button-wrapper" type="submit" name="exploreButton" style="background-color: transparent;">EXPLORE</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="league-wrapper premier-league" style="background-image: url('images/england_flag.png');">
                <div class="overlay"></div>
                <div class="info-wrapper">
                    <div class="upper-layer">
                        <div class="logo-wrapper" style="background-image: url('images/england_fa_cup_logo.png');"></div>
                        <div class="league-info-wrapper">
                            <div class="name-wrapper">England FA Cup</div>
                            <div class="country-wrapper">
                                <div class="text">England</div>
                                <div class="flag" style="background-image: url('images/england_flag.png');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mid-wrapper">
                        <div class="date">Date: <span>Unknown</span></div>
                        <div class="total-matches">Total matches: <span>Unknown matches</span></div>
                    </div>
                    <div class="bottom-wrapper">
                        <div class="live-wrapper">
                            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
                            <div class="text-wrapper">Live</div>
                        </div>
                        <div class="not-started-wrapper">League status</div>
                        <form action="league-page.php" method="POST">
                            <input type="text" name="leagueId" value="<?php echo $englandFaId;?>" style="display: none;">
                            <input type="text" name="leagueName" value="England FA Cup" style="display: none;">
                            <input type="text" name="leagueBackground" value="images/england_fa_cup_background.jpg" style="display: none;">
                            <input type="text" name="leagueLogo" value="images/engalnd_fa_cup_logo.png" style="display: none;">
                            <button class="explore-button-wrapper" type="submit" name="exploreButton" style="background-color: transparent;">EXPLORE</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="league-wrapper premier-league" style="background-image: url('images/world_flag.png');">
                <div class="overlay"></div>
                <div class="info-wrapper">
                    <div class="upper-layer">
                        <div class="logo-wrapper" style="background-image: url('images/euro_championship_logo.jpg');"></div>
                        <div class="league-info-wrapper">
                            <div class="name-wrapper">Euro Championship</div>
                            <div class="country-wrapper">
                                <div class="text">World</div>
                                <div class="flag" style="background-image: url('images/world_flag.png');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mid-wrapper">
                        <div class="date">Date: <span>Unknown</span></div>
                        <div class="total-matches">Total matches: <span>Unknown matches</span></div>
                    </div>
                    <div class="bottom-wrapper">
                        <div class="live-wrapper">
                            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
                            <div class="text-wrapper">Live</div>
                        </div>
                        <div class="not-started-wrapper">League Status</div>
                        <form action="league-page.php" method="POST">
                            <input type="text" name="leagueId" value="<?php echo $euroChampionShipId;?>" style="display: none;">
                            <input type="text" name="leagueName" value="Euro Championship" style="display: none;">
                            <input type="text" name="leagueBackground" value="images/euro_championship_background.webp" style="display: none;">
                            <input type="text" name="leagueLogo" value="images/euro_championship_logo.jpg" style="display: none;">
                            <button class="explore-button-wrapper" type="submit" name="exploreButton" style="background-color: transparent;">EXPLORE</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="league-wrapper premier-league" style="background-image: url('images/world_flag.png');">
                <div class="overlay"></div>
                <div class="info-wrapper">
                    <div class="upper-layer">
                        <div class="logo-wrapper" style="background-image: url('images/fifa_world_cup_logo.jpg');"></div>
                        <div class="league-info-wrapper">
                            <div class="name-wrapper">World Cup</div>
                            <div class="country-wrapper">
                                <div class="text">World</div>
                                <div class="flag" style="background-image: url('images/world_flag.png');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mid-wrapper">
                        <div class="date">Date: <span>Unknown</span></div>
                        <div class="total-matches">Total matches: <span>Unknown matches</span></div>
                    </div>
                    <div class="bottom-wrapper">
                        <div class="live-wrapper">
                            <i class="fa-solid fa-circle fa-beat-fade dot-wrapper"></i>
                            <div class="text-wrapper">Live</div>
                        </div>
                        <div class="not-started-wrapper">League status</div>
                        <form action="league-page.php" method="POST">
                            <input type="text" name="leagueId" value="<?php echo $worldCupId;?>" style="display: none;">
                            <input type="text" name="leagueName" value="World Cup" style="display: none;">
                            <input type="text" name="leagueBackground" value="images/fifa_world_cup_background.jpg" style="display: none;">
                            <input type="text" name="leagueLogo" value="images/fifa_world_cup_logo.jpg" style="display: none;">
                            <button class="explore-button-wrapper" type="submit" name="exploreButton" style="background-color: transparent;">EXPLORE</button>
                        </form>
                    </div>
                </div>
            </div>


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

    <script src="scripts/app-script.js"></script>
</body>
</html>