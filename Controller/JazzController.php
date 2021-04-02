<?php
require_once 'Model/Jazz.php';
class JazzController extends Jazz{
    public function jazzAgendaGetAllDataContr($selectedDay)
    {
        $result = $this->GetDataJazzAgenda($selectedDay);
        return $result;
    }
    public function jazzAgendaGetEditDataContr()
    {
        $row = $this->GetJazzEditData();
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
    public function jazzPagesGetAllContr(){
        $result = $this->jazzPagesGetAll();
        return $result;
    }
    public function jazzPagesGetOneContr($pageId){
        $result = $this->jazzPagesGetOne($pageId);
        return $result;
    }
    public function jazzPagesGetEditDataContr(){
        $result = $this->GetJazzPageEditData();
        return $result;
    }
    public function jazzPagesUpdateContr(){
        $this->UpdateJazzPage();
    }
    public function jazzPagesAddContr(){
        $this->AddJazzPage();
    }
    public function jazzPagesDeleteContr(){
        $this->DeleteJazzPage();
    }
}
