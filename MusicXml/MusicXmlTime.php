<?php
	class MusicXmlTime{
		public $Tempo;
		public $TicksPerBeat;

		public $Time;

		public function __construction($tempo, $ticksPerBeat, $time){
			$this->Tempo = $tempo;
			$this->TicksPerBeat = $ticksPerBeat;
			$this->Time = $time;
		}

		public function GetWallTime(){
			return (($this->Time * $this->Tempo)/($this->TicksPerBeat * 1000));
		}
	}
?>