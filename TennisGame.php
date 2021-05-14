<?php

class TennisGame
{
    const SCORE0 = 0;
    const SCORE1 = 1;
    const SCORE2 = 2;
    const SCORE3 = 3;
    public string $score = '';

    public function getScore($player1Name, $player2Name, $player1Score, $player2Score)
    {
        $tempScore = self::SCORE0;

        if ($player1Score == $player2Score) {
            $this->extracted2($player1Score);
        } else if ($player1Score >= 4 || $player2Score >= 4) {
            $this->extracted1($player1Score, $player2Score);
        } else {
            $this->extracted($player1Score, $player2Score);
        }
    }



    /**
     * @param $m_score1
     * @param $m_score2
     */
    public function extracted($m_score1, $m_score2): void
    {

        for ($i = 1; $i < 3; $i++) {
            if ($i == 1) $tempScore = $m_score1;
            else {
                $this->score .= "-";
                $tempScore = $m_score2;
            }
            switch ($tempScore) {
                case 0:
                    $this->score .= "Love";
                    break;
                case 1:
                    $this->score .= "Fifteen";
                    break;
                case 2:
                    $this->score .= "Thirty";
                    break;
                case 3:
                    $this->score .= "Forty";
                    break;
            }
        }
    }

    /**
     * @param $m_score1
     * @param $m_score2
     */
    public function extracted1($m_score1, $m_score2): void
    {
        $minusResult = $m_score1 - $m_score2;
        if ($minusResult == 1) $this->score = "Advantage player1";
        else if ($minusResult == -1) $this->score = "Advantage player2";
        else if ($minusResult >= 2) $this->score = "Win for player1";
        else $this->score = "Win for player2";
    }

    /**
     * @param $m_score1
     */
    public function extracted2($m_score1): void
    {
        switch ($m_score1) {
            case self::SCORE0:
                $this->score = "Love-All";
                break;
            case self::SCORE1:
                $this->score = "Fifteen-All";
                break;
            case self::SCORE2:
                $this->score = "Thirty-All";
                break;
            case self::SCORE3:
                $this->score = "Forty-All";
                break;
            default:
                $this->score = "Deuce";
                break;

        }
    }

    public function __toString(): string
    {
        return $this->score;
    }
}