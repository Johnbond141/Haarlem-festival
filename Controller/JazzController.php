<?php
require 'Model/Jazz.php';
class JazzController extends Jazz{
    public function jazzAgendaGetAllDataContr($selectedDay)
    {
        $result = $this->GetDataJazzAgenda($selectedDay);
        return $result;
    }
    public function jazzAgendaGetEditData()
    {
        $row = $this->GetEditData();
        return $row;
    }
    public function jazzAgendaUpdateContr(){
        $this->UpdateJazzAgenda();
    }
    public function jazzAgendaAddContr(){
        $this->AddJazzAgenda();
    }
    public function jazzAgendaDeleteContr(){
        $this->DeleteJazzAgenda();
    }
}
