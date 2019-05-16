<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scissors-Rock-Paper</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header-wrapper text-center">
  <h1>Scissors-Rock-Paper</h1>
</div>
<div class="mask-container">
    <div class="row mask-row">
        <div class="mask-col">
            <button id="play_me" type="button" class="play">PLAY ME</button>
        </div>
    </div>
</div>
<div class="results-wrapper">
    <div class="container results">
        <div class="row result-headings">
            <h2 class="win-result">Congratulations! You won the game!</h2>
            <h2 class="lost-result">Opps! You lost the game! Try again!</h2>
        </div>
        <div class="row">
            <div class="mask-col">
                <button id="play_again" type="button" class="play play-again">PLAY AGAIN</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-between">
        <div class="col-7 col-sm-7">
            <div class="row score-row text-center">
                <h4>You</h4>
                <div class="score-div">
                    <span class="user-score">0</span>
                    <span>/</span>
                    <span>3 (scores)</span>
                </div>
            </div>
            <div class="row variants-row">
                <div class="col-4 col-sm-4 text-center variant">
                    <h5 class="text-center">Scissors</h5>        
                    <img src="assets/icons/scissors.svg" alt="Scissors" class="img-thumbnail" width="80%">
                    <input type="hidden" value="scissors" class="variant-value">
                </div>
                <div class="col-4 col-sm-4 text-center variant">
                    <h5>Rock</h5>        
                    <img src="assets/icons/rock.svg" alt="Rock" class="img-thumbnail" width="80%">
                    <input type="hidden" value="rock" class="variant-value">
                </div>
                <div class="col-4 col-sm-4 text-center variant">
                    <h5>Paper</h5>        
                    <img src="assets/icons/paper.svg" alt="Paper" class="img-thumbnail" width="80%">
                    <input type="hidden" value="paper" class="variant-value">
                </div>
            </div>
        </div>
        <div class="col-4 col-sm-4">
            <div class="row score-row text-center">
                <h4>Opponent</h4>
                <div class="score-div">
                    <span class="opponent-score">0</span>
                    <span>/</span>
                    <span>3 (scores)</span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-7 col-sm-7 text-center variant-opponent">
                    <h5></h5>        
                    <img src="" alt="Paper" class="img-thumbnail" width="80%">
                    <input type="hidden" value="-1" class="opponent-value">
                </div>
            </div>
        </div>
    </div>
    <h3 class="result"></h3>
</div>
<script src="assets/js/main.js"></script>
</body>
</html>
