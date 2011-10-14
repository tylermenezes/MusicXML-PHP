<?php
	class MusicXmlEvent{
		public $Type;
		public $Time;
		public $Data;

		public function __construction($type, $time, $data){
			$this->Type = $type;
			$this->Time = $time;
			$this->Data = $data;
		}
	}
?>
