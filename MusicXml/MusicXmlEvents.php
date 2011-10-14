<?php
	class MusicXmlEvents{
		public $events;

		public function GetMostRecentEventAt($eventType, $time){
			return $this->binarySearchMostRecent($this->GetEventsByType($eventType), $time);
		}

		public function GetEventsByType($eventType){
			$ret = array();
			foreach($events as $event){
				if($event->Type == $eventType){
					$ret[] = $event->Type;
				}
			}
		}

		private function binarySearchMostRecent($array, $time, $start = 0, $end = null){
			if($end == null){
				$end = count($array);
			}

			$low = round($start);
			$high = round($end);
			$mid = floor(($low + $high) / 2);

			$test = $array[$mid]->Time;

			if(abs($high - $low) < 2){
				return $array[$mid];
			}

			if($test > $time){
				$high = $mid;
			}else{
				$low = $mid;
			}

			return $this->binarySearchMostRecent($array, $time, $low, $high);
		}
	}
?>
