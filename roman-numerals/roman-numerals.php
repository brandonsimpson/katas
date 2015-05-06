<?php
class Convert
{
    
    // roman numeral => numeric equivalents
    private $roman = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
    
    public function ArabicToRoman($input) {
        
        $num = $input;
        $result = '';
        
        foreach ($this->roman as $r => $val) {
            
            // divide remaining num by the numeric equivalent val to find how many times to repeat roman numeral chars
            $matches = intval($num / $val);
            
            // build result string of roman numerals
            $result.= str_repeat($r, $matches);
            
            // reduce num by numeric equivalent val
            $num = $num % $val;
        }
        
        return $result;
    }
    
    public function RomanToArabic($input) {
        
        $result = 0;
        
        foreach ($this->roman as $r => $val) {
            
            // if roman value found in input string, add numeric equivalent and remove that part of the string
            while (strpos($input, $r) === 0) {
                $result+= $val;
                $input = substr($input, strlen($r));
            }
        }
        
        return $result;
    }
}
