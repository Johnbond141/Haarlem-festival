<?php
require_once 'Model/Food.php';
class FoodController extends Food {
    public function foodAgendaGetAllDataContr()
    {
        $result = $this->GetDataFoodAgenda();
        return $result;
    }
    public function foodAgendaGetEditDataContr()
    {
        $row = $this->GetFoodEditData();
        return $row;
    }
    public function foodAgendaUpdateContr(){
        $this->UpdateFoodAgenda();
    }
    public function foodAgendaAddContr(){
        $this->AddFoodAgenda();
    }
    public function foodAgendaDeleteContr(){
        $this->DeleteFoodAgenda();
    }
}