$(document).ready(function()
{
    var userScore = 0;
    var opponentScore = 0;
    var nextround = true;

    $("#play_me").click(function()
    {
        // fading the mask-container to start the game
        $(".mask-container").fadeOut();
    });
    $("#play_again").click(function()
    {
        // resetting the score for next game
        userScore = 0;
        opponentScore = 0;
        nextround = true;
        $('.opponent-score').html(userScore);
        $('.user-score').html(opponentScore);
        
        // fading the mask-container to start the game
        $(".results-wrapper").fadeOut();
    });
    $(".variant").click(function(event)
    {
        // check for setting nextround, so that user cannot keep clicking on variant
        if(nextround !== true)
        {
            return false;
        }
        nextround = false;

        // adding the highlight class to point out the selected variant by user
        $(this).addClass('highlight');
        $(".variant").attr("style","cursor: default");
        setOpponentVariant(); // calling the method which will set the opponent variant randomly 

        event.preventDefault();
        $.ajax(
        {
            url: './controller/gameControl.php',
            type: 'post',
            dataType: "json",
            data: { 
                userVal: $(this).find('input.variant-value').val(),
                opponentVal: $('input.opponent-value').val() 
            },
            success: function(response) 
            {
                // emptying result value, setting up new value and fading in
                $('.result').empty();
                $('.result').html(response['message']);
                $(".result").fadeIn(1000);

                // incresing score counter for user and setting the value
                if(response['result'] === "win")
                {
                    userScore++;
                    $('.user-score').html(userScore);
                }
                // increasing score counter for opponent and setting the value
                if(response['result'] === "lose")
                {
                    opponentScore++
                    $('.opponent-score').html(opponentScore);
                }
                // fading out the result and removing the highlight class from user variant, ready for next round game
                $(".result").fadeOut(1600, function() 
                {
                    $('div.variant').removeClass("highlight");
                    $(".variant-opponent").fadeOut();
                    $(".variant").attr("style","cursor: pointer");
                    nextround = true;
                    // checking if user has scored 5 points
                    if(userScore === 3)
                    {
                        nextround = false;
                        $("h2.win-result").show();
                        $("h2.lost-result").hide();
                        $(".results-wrapper").fadeIn();
                    }
                    // checking if the opponent has scored 5 points
                    if(opponentScore === 3)
                    {
                        nextround = false;
                        $("h2.win-result").hide();
                        $("h2.lost-result").show();
                        $(".results-wrapper").fadeIn();
                    }
                });
            }
        });
    });
});

/**
 * Method for setting opponent variant randomly
 */
function setOpponentVariant()
{
    var randomVal = Math.floor((Math.random() * 3) + 1);
    switch(randomVal)
    {
        case 1:
            setOpponentVariantValues("Scissors", "scissors", "scissors");
            break;

        case 2:
            setOpponentVariantValues("Rock", "rock", "rock");
            break;

        case 3:
            setOpponentVariantValues("Paper", "paper", "paper");
            break;

        default:
            break;
    }
}
/**
 * Method for setting properties of opponent variant
 * @param {string} variantName 
 * @param {string} variantSrc 
 * @param {string} VariantVal 
 */
function setOpponentVariantValues(variantName, variantSrc, VariantVal)
{
    $('.variant-opponent h5').html(variantName);
    $('.variant-opponent img').attr("src","assets/icons/"+variantSrc+".svg");
    $('.variant-opponent input').val(VariantVal);
    $(".variant-opponent").fadeIn();
}