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
    public function foodPagesGetAllContr(){
        $result = $this->foodPagesGetAll();
        return $result;
    }
    public function foodPagesGetOneContr($pageId){
        $result = $this->foodPagesGetOne($pageId);
        return $result;
    }
    public function foodPagesGetEditDataContr(){
        $result = $this->GetFoodPageEditData();
        return $result;
    }
    public function foodPagesUpdateContr(){
        $this->UpdateFoodPage();
    }
    public function foodPagesAddContr(){
        $this->AddFoodPage();
    }
    public function foodPagesDeleteContr(){
        $this->DeleteFoodPage();
    }
}