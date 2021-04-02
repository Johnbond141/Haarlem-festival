<?php
require_once 'Model/Dance.php';
class DanceController extends Dance {
    public function danceAgendaGetAllDataContr($selectedDay)
    {
        $result = $this->GetDataDanceAgenda($selectedDay);
        return $result;
    }
    public function danceAgendaGetEditDataContr()
    {
        $row = $this->GetDanceEditData();
        return $row;
    }
    public function danceAgendaUpdateContr(){
        $this->UpdateDanceAgenda();
    }
    public function danceAgendaAddContr(){
        $this->AddDanceAgenda();
    }
    public function danceAgendaDeleteContr(){
        $this->DeleteDanceAgenda();
    }
    public function dancePagesGetAllContr(){
        $result = $this->dancePagesGetAll();
        return $result;
    }
    public function dancePagesGetOneContr($pageId){
        $result = $this->dancePagesGetOne($pageId);
        return $result;
    }
    public function dancePagesGetEditDataContr(){
        $result = $this->GetDancePageEditData();
        return $result;
    }
    public function dancePagesUpdateContr(){
        $this->UpdateDancePage();
    }
    public function dancePagesAddContr(){
        $this->AddDancePage();
    }
    public function dancePagesDeleteContr(){
        $this->DeleteDancePage();
    }
}