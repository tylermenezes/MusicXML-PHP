<?php
	/**
	*
	* Represents a note in a zero-indexed octave, zero-indexed note scale.
	*
	*/
	class MusicXmlNote{
		private $noteId;
		private $notes = array("C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B");

		public function __construct($number){
			$this->noteId = $number;
		}

		public function GetOctave(){
			return floor($this->noteId / 12);
		}

		public function SetOctave($newOctave){
			$this->noteId = ($newOctave * 12) + $this->GetNoteNumber();
			return $this;
		}

		public function GetNoteNumber(){
			return $this->noteId % 12;
		}

		public function SetNoteNumber($newNoteNumber){
			$this->noteId = ($this->GetOctave() * 12) + $newNoteNumber;
			return $this;
		}

		public function ModifyNoteNumber($delta){
			$this->SetNoteNumber($this->GetNoteNumber() + $delta);
			return $this;
		}

		public function GetNoteName(){
			return $this->notes[$this->GetNoteNumber()];
		}
	}
?>
