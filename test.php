<?php
    set_time_limit(0);
    
    //Varibales for defining limits ----- Change these to test 
    $max_limit = 1000000;
    $min_limit = 1;

    //First loop for finding prime numbers

    for($i=$max_limit ; $i >= $min_limit ; $i--){
        $counter = 0;
        $sum = 0;
        $sumStartTerms = array();
        for($j=1 ; $j <= $i ; $j++){
            if($i % $j == 0){
                $counter++;
            }
        }
        if($counter == 2){

            //Second loop for finding sum of prime numbers starting from 2

            $termCounter = -1;
            $tempCount = 0;
            for($inneri=1 ; $inneri <= $i ; $inneri++){                
                $counter1 = 0;
                for($innerj=1 ; $innerj <= $inneri ; $innerj++){
                    if($inneri % $innerj == 0){
                        $counter1++;
                    }
                }
                if($counter1 == 2){

                    //Condition for checking if sum is greater than or equal to the prime number

                    $termCounter++;
                    $sum += $inneri;
                    $sumStartTerms[] = $sum;                   
                    if($sum >= $i){
                        $tempCount++;

                        //Calculating no of terms for each prime number that can be written as sum of consecutive prime numbers

                        if($tempCount == 1){
                            if($sum == $i){
                                $terms = $termCounter + 1;                                
                                $arrayOfNumbers[$i] = $terms;
                                break;
                            } 
                            foreach($sumStartTerms as $key=>$value){                                
                                $tempSum = 0;
                                $tempSum = $sum - $value;
                                if($tempSum == $i){
                                    $terms = $termCounter - $key;                                    
                                    $arrayOfNumbers[$i] = $terms;
                                    break;
                                }
                            }
                        }else{
                            break;
                        }
                    }
                }
            }
            unset($sumStartTerms);
        }
    }

    //Final Result
    $no_of_terms = max($arrayOfNumbers);
    $prime_number = array_search($no_of_terms, $arrayOfNumbers);
    echo "The Number is $prime_number and it has $no_of_terms terms in it.";
?>