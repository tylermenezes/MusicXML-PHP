<?php
	define("MUSIC_NOTE_FLAT", -1);
	define("MUSIC_NOTE_NATURAL", 0);
	define("MUSIC_NOTE_SHARP", 1);
	class MusicXmlKey{

		public $c = MIDI_NOTE_NATURAL;
		public $d = MIDI_NOTE_NATURAL;
		public $e = MIDI_NOTE_NATURAL;
		public $f = MIDI_NOTE_NATURAL;
		public $g = MIDI_NOTE_NATURAL;
		public $a = MIDI_NOTE_NATURAL;
		public $b = MIDI_NOTE_NATURAL;

		private $isMajor = false;

		private $flatNoteOrder = array(&$this->b, &$this->e, &$this->a, &$this->d, &$this->g, &$this->c, &$this->f);
		private $sharpNoteOrder = array(&$this->f, &$this->c, &$this->g, &$this->d, &$this->a, &$this->e, &$this->b);

		public function __construct($isMajor, $flats){
			if($flats > 7){
				$flats = 7;
			}else if($flats < -7){
				$flats = -7;
			}

			$this->isMajor = $isMajor;

			for($i = abs($flats); $i > 0; $i--){
				if($flats > 0){
					assignNoteFlat($i);
				}else{
					assignNoteSharp($i);
				}
			}
		}

		public function GetActualNote($note){
			return $note->ModifyNoteNumber($this->getSharpDelta($note->GetNoteName()));
		}

		private function &getNoteByName($name){
			$name = strtoupper($name);
			switch($name){
				case 'C':
					return &$this->c;
					break;
				case 'D':
					return &$this->d;
					break;
				case 'E':
					return &$this->e;
					break;
				case 'F':
					return &$this->f;
					break;
				case 'G':
					return &$this->g;
					break;
				case 'A':
					return &$this->a;
					break;
				case 'B':
					return &$this->b;
					break;
			}
		}

		private function getSharpDelta($name){
			return &$this->getNoteByName($name);
		}

		private function assignNoteSharp($i){
			$this->sharpNoteOrder[$i - 1] &=  MIDI_NOTE_SHARP;
		}

		private function assignNoteFlat($i){
			$this->flatNoteOrder[$i - 1] &= MIDI_NOTE_FLAT;
		}
	}
?>
