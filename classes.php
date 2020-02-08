<?php
//this class will have a two method
class Hamming{
    //check method that will check if the strings have the same length and return boolean value
    private static function check($s1,$s2){
        return strlen($s1)==strlen($s2);
    }
    //this method will compute the hamming distance and return the subistute cost
public static function hammingCost(string $s1,string $s2):int{
        //subistute will store the cost of hamming distance
    $subistute=0;
        //check if the strings have the same length
    if(self::check($s1,$s2)){
        //this for will match each element with other element
        for($i=0;$i<strlen($s1);$i++){
            //if not the same will increament the subistute cost by one
            if(!($s1[$i]==$s2[$i]))
               $subistute++;
        }
   return $subistute;
    }
    else throw new ErrorException('the string must have the same length');

}
}
//this class will have a one method and 3 properties
class Levenshtein{
    /*
     * $insert represent the insert cost
     * delete represent the delete cost
     * substitution represent the substitution cost */
    private static $insert=1;
    private static $delete=1;
    private static $substitution=1;
    //LevenshteinCost this method will compute the minimum cost to convert string to other and return the cost
    public static function levenshteinCost(string $s1, string $s2): int {

        // initialize $minArray to fill it with minimum distance between each element of the string

        $minArray = [];

        /*initialize $dis it will contain set of element and it will be a part of $minArray ,the $dis represent the minimum
        distance to convert word into other
        */
        $dis = [];
        $dis[0] = 0;

        //fill $dis with strlen($s1) number of change require to convert $s1 to the first letter in $s2
        for ($j = 1; $j < strlen($s2)+ 1; $j++) $dis[$j] = $j ;

        //fill first row of minArray with $dis
        $minArray[0] = $dis;

        //this loop will fill $dis with minimum distance
        for ($i = 0; $i < strlen($s1); $i++) {
            $dis= [];
            $dis[0] = ($i + 1);

            //this loop to choose the minimum value of
            for ($j = 0; $j < strlen($s2); $j++) {
                $dis[$j + 1] = min(
                    $minArray[$i][$j + 1] + self::$delete ,
                    $dis[$j] + self::$insert,
                    $minArray[$i][$j] + ($s1[$i] === $s2[$j] ? 0.0 : self::$substitution)
                );
            }

            //increament the $minArray index by one and fill it with $dis value
            $minArray[$i + 1] = $dis;
        }

        //return the last index of the minArray ,the value represent the minimum cost to convert the first string to other string
        return $minArray[strlen($s1)][strlen($s2)];
    }

}
