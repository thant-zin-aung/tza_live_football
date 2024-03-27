let playMusicButton = document.querySelector("#matches .top-bar-wrapper .full-length-line .play-music-wrapper");
let backButton = document.querySelector("#matches .top-bar-wrapper .full-length-line .back-button");

let audio = new Audio("songs/2.mp3");
playMusicButton.addEventListener("click",() => {
    audio.play();
});

backButton.addEventListener("click",()=>{
    window.history.back();
});