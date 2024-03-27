let playMusicButton = document.querySelector("#channels .top-bar-wrapper .full-length-line .play-music-wrapper");
let backButton = document.querySelector("#channels .top-bar-wrapper .full-length-line .back-button");
let channelWrappers = document.getElementsByClassName("channel-wrapper");

let audio = new Audio('songs/3.mp3');
playMusicButton.addEventListener("click",() => {
    audio.play();
});

for ( let count = 0 ; count < channelWrappers.length ; count++ ) {
    channelWrappers.item(count).addEventListener("click",e=>{
        myInterval = setInterval(decreaseVolume, 250);
        function decreaseVolume() {
            if ( audio.volume==0 ) {
                clearInterval(myInterval);
                audio.pause();
                audio.currentTime=0;
            }
            else {
                audio.volume = audio.volume-0.1;
            }
        }
        
    });
}

backButton.addEventListener("click",()=>{
    window.history.back();
});