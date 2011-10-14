<?php
	class MusicXmlFile{
		private $xml;
		public $globalEvents;
		public $tracks;

		public $name;
		public $copyright;

		public function __construct($file_name){
			require_once('./midi_class_v176/classes/midi.class.php');

			midi = new Midi();
			$midi->importMid($file);
			$this->xml = simplexml_load_string($midi->getXml(MIDI_DELTA));
		}
	}
?>
