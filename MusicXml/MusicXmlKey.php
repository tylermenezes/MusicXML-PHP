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

		private $flatNoteOrder = array(&$this->b, &$this->e, &$this->a, &$this->d, &$this->g, &$this->c, &$this->f);
		private $sharpNoteOrder = array(&$this->f, &$this->c, &$this->g, &$this->d, &$this->a, &$this->e, &$this->b);

		public function __construct($isMajor, $flats){
			if($flats > 7){
				$flats = 7;
			}else if($flats < -7){
				$flats = -7;
			}

			for($i = abs($flats); $i > 0; $i--){
				if($flats > 0){
					assignNoteFlat($i);
				}else{
					assignNoteSharp($i);
				}
			}
		}

		public function getActualNote($note){
			return $note->ModifyNoteNumber($this->getSharpDelta($note->GetNoteName()));
		}

		private function getSharpDelta($name){
			$delta = 0;
			switch($name){
				case 'C':
					$delta = $this->c;
					break;
				case 'D':
					$delta = $this->d;
					break;
				case 'E':
					$delta = $this->e;
					break;
				case 'F':
					$delta = $this->f;
					break;
				case 'G':
					$delta = $this->g;
					break;
				case 'A':
					$delta = $this->a;
					break;
				case 'B':
					$delta = $this->b;
					break;
			}
		}

		private function assignNoteSharp($i){
			$this->sharpNoteOrder[$i - 1] &=  MIDI_NOTE_SHARP;
		}

		private function assignNoteFlat($i){
			$this->flatNoteOrder[$i - 1] &= MIDI_NOTE_FLAT;
		}
	}
?>
