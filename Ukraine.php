<?php
class Ukraine
{
    public function __construct(){
        for ($i = 0; $i < 300000; $i++ ){ //1% of super citizens
            $this->goToPharmacy($this->superCitizen());
        }
        for ($i = 0; $i < 30000000; $i++ ){ //99% of regular citizens aka bidlo
            $this->goToPharmacy($this->citizen());
        }
    }

    protected function citizen(){
        $person = new stdClass();
        $person->hasMaska = false; //maska is mask
        $person->fuckYaAll = false;
        $person->hasCar = false;
        $person->money = 0;
        return $person;
    }

    protected function superCitizen(){
        $person = new stdClass();
        $person->hasMaska = true;
        $person->fuckYaAll = true;
        $person->hasCar = true;
        $person->money = 100000000000;
        return $person;
    }

    protected function goToPharmacy($person){
        if(!$person->hasCar && !$this->usePublicTransport($person)){ //use public transport ot own car
            return false; //or die;
        }
        if (!$person->hasMaska && !$person->fuckYaAll){ // dont have maska or fuckYaAll skill?
            if (!$this->buyMaska($person)){ // buy it!
                return false; //or get the fuck out
            }
        }
        return true;
    }

    protected function buyMaska($person){
        if(!$person->goToPharmacy() || !$person->money ){ // go to Pharmacy with money
            return false; //or get the fuck out;
        }
        return true;
    }


    protected function usePublicTransport($person){
        if($person->money){ // need to pay police when you dont have special permit
            if ($person->hasMaska){
                $person->money -= 100; //100 UAH if have maska
            }
            else{
                $person->money -= 200;  //100 UAH if have no maska
            }
        }
        else {
            return false; // or get the fuck out
        }
    }
}

new Ukraine();
