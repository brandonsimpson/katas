<?php
class Game
{
    
    protected $rolls = [];
    
    /**
     * Record rolls
     * @param [int] $pins
     */
    public function roll($pins) {
        
        // make sure # of pins are within acceptable range
        if ($pins < 0 || $pins > 10) throw new LengthException;
        
        // record roll
        $this->rolls[] = $pins;
    }
    
    /**
     * Calculate game score
     * @return [int] $score
     */
    public function score() {
        
        $score = 0;
        $roll = 0;
        
        for ($f = 0; $f < 10; $f++) {
            if ($this->isStrike($roll)) {
                $score+= $this->strikeTotal($roll);
                $roll++;
            } 
            else if ($this->isSpare($roll)) {
                $score+= $this->spareTotal($roll);
                $roll+= 2;
            } 
            else {
                $score+= $this->frameTotal($roll);
                $roll+= 2;
            }
        }
        
        return $score;
    }
    
    /**
     * Was roll a strike?
     * @param  [int] $n - roll #
     * @return boolean
     */
    private function isStrike($n) {
        return $this->rolls[$n] == 10;
    }
    
    /**
     * Calculate strike frame total
     * @param  [type] $n - roll #
     * @return [int] The total value of a strike is 10 plus the number of pins knocked down in their next two throws.
     */
    private function strikeTotal($n) {
        return 10 + $this->rolls[$n + 1] + $this->rolls[$n + 2];
    }
    
    /**
     * Was roll a spare?
     * @param  [int] $n - roll #
     * @return boolean
     */
    private function isSpare($n) {
        return $this->rolls[$n] + $this->rolls[$n + 1] == 10;
    }
    
    /**
     * Calculate spare frame total
     * @param  [int] $n - roll #
     * @return [int] The total value of a spare is 10 plus the number of pins knocked down in their next throw.
     */
    private function spareTotal($n) {
        return 10 + $this->rolls[$n + 2];
    }
    
    /**
     * Caclulate normal frame total
     * @param  [int] $n - roll #
     * @return [int] The total pins knocked down in the frame
     */
    private function frameTotal($n) {
        return $this->rolls[$n] + $this->rolls[$n + 1];
    }
}
