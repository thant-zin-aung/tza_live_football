let playMusicButton = document.querySelector("#league .top-bar-wrapper .full-length-line .play-music-wrapper");
let audio = new Audio("songs/1.mp3");

playMusicButton.addEventListener("click",() => {
    audio.play();
});