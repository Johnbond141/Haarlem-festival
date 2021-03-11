<?php
require 'Model/Jazz.php';
class JazzController extends Jazz{
    public function jazzAgendaContr($day)
    {
        $this->get_all_data_thursday($day);
    }
}
