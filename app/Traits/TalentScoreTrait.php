<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Opportunity;
use App\Traits\ScoreCalculationTrait;

trait TalentScoreTrait
{
    use ScoreCalculationTrait;
    public function addTalentScore($seeker)
    {
        $opportunities = Opportunity::get();
        foreach($opportunities as $opportunity)
        {
            $this->calculate($seeker,$opportunity);
        }
    }

    public function addJobTalentScore($opportunity){
        $seekers = User::where('is_active',1)->get();
        foreach($seekers as $seeker)
        {
            $this->calculate($seeker,$opportunity);
        }
    } 
  
}