<?php
	class MusicXmlTrack{
		public $events;

		public function GetKeySignatureAt($time){
			return $this->events->GetMostRecentEventAt("KeySignature", $time)->Data; //TODO: I don't know if this is the correct name
		}
	}
?>
