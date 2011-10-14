<?php
	define("MUSIC_NOTE_FLAT", -1);
	define("MUSIC_NOTE_NATURAL", 0);
	define("MUSIC_NOTE_SHARP", 1);
	class MusicXmlKey{

		private $status = array(MUSIC_NOTE_NATURAL, MUSIC_NOTE_NATURAL, MUSIC_NOTE_NATURAL, MUSIC_NOTE_NATURAL, MUSIC_NOTE_NATURAL, MUSIC_NOTE_NATURAL, MUSIC_NOTE_NATURAL);

		private $isMajor = false;

		public function __construct($isMajor, $flats){
			if($flats > 7){
				$flats = 7;
			}else if($flats < -7){
				$flats = -7;
			}
			$this->isMajor = $isMajor;

			$sharps = -$flats;
			$sign = $sharps > 0? MUSIC_NOTE_SHARP : MUSIC_NOTE_FLAT;

			for($i = 0; $i < abs($sharps); $i++){
				$this->assignNote($sign * $i * 5, $sign);
			}
		}

		public function GetActualNote($note){
			return $note->ModifyNoteNumber($this->getSharpDeltaByName($note->GetNoteName()));
		}

		private function assignNote($i, $n){
			$i = $i%7;
			if($i < 0){
				$i = abs(7 - $i);
			}

			$this->status[$i] = $n;
		}

		private function getNoteByName($name){
			$name = strtoupper($name);
			switch($name){
				case 'C':
					return $this->status[0];
					break;
				case 'D':
					return $this->status[1];
					break;
				case 'E':
					return $this->status[2];
					break;
				case 'F':
					return $this->status[3];
					break;
				case 'G':
					return $this->status[4];
					break;
				case 'A':
					return $this->status[5];
					break;
				case 'B':
					return $this->status[6];
					break;
			}
		}

		private function getSharpDeltaByName($name){
			return $this->getNoteByName($name);
		}
	}
?>
