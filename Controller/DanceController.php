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
}