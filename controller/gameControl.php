<?php 
if($_POST['userVal'] !== "" && $_POST['opponentVal'] !== "")
{
    $obj = new GameController($_POST['userVal'], $_POST['opponentVal']);
    $obj->winOrLose();
}

/**
 * Module for handling game
 */
class GameController
{
    private $uservalue;
    private $opponentvalue;

    /**
     * Constructor method
     * @param string $userval
     * @param string $opponentVal
     */
    public function __construct($userval, $opponentVal)
    {
        $this->uservalue = $userval;
        $this->opponentvalue = $opponentVal;
    }

    /**
     * Method for finding if the user has lost or won the game
     */
    public function winOrLose()
    {
        if($this->uservalue === $this->opponentvalue)
        {
            // its tie
            $this->createReturnJsonObject("tie");
        }
        else
        {
            switch($this->uservalue)
            {
                case "scissors":
                    if ($this->opponentvalue === "rock") 
                    {
                        // rock wins
                        $this->createReturnJsonObject("lose");
                    } 
                    else 
                    {
                        // scissors wins
                        $this->createReturnJsonObject("win");
                    }
                    break;
    
                case "rock":
                    if ($this->opponentvalue === "scissors") 
                    {
                        // rock wins
                        $this->createReturnJsonObject("win");
                    } 
                    else 
                    {
                        // paper wins
                        $this->createReturnJsonObject("lose");
                    }
                    break;
    
                case "paper":
                    if ($this->opponentvalue === "rock") 
                    {
                        // paper wins
                        $this->createReturnJsonObject("win");
                    } 
                    else 
                    {
                        // scissors wins
                        $this->createReturnJsonObject("lose");
                    }
                    break;
    
                default:
                    break;
            }
        }
    }

    /**
     * Method for created the return json object
     * @param string $status
     */
    private function createReturnJsonObject($status)
    {
        $return = $_POST;
        switch($status)
        {
            case "win":
                $return['message'] = "YOU GOT 1 POINT!";
                $return['result'] = "win";
                break;
            
            case "lose":
                $return['message'] = "YOU LOST 1 POINT!";
                $return['result'] = "lose";
                break;

            case "tie":
                $return['message'] = "IT'S A TIE!";
                $return['result'] = "tie";
                break; 

            default:
                break;
        }

        $return["json"] = json_encode($return);
        echo json_encode($return);
    }
}