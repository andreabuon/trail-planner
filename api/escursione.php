<?php
	class Escursione{
		private $id;
		private $sentiero_parco;
		private $sentiero_sigla;
		private $sentiero_nome;
		private $data;
		private $organizzatore;
		private $note;
		private $iscritto;

		//public function __construct($id, $parco, $sigla, $data, $organizzatore, $note=NULL, $iscritto='0'){}
		public function __construct($array){
			$this->id = $array['id'];
			$this->sentiero_parco = $array['sentiero_parco'];
			$this->sentiero_sigla = $array['sentiero_sigla'];
			$this->sentiero_nome = $array['nome'];
			$this->data = $array['data'];
			$this->organizzatore = $array['organizzatore'];
			$this->note = $array['note'];
			$this->iscritto = $array['iscritto'];
			return $this;
		}
	
		public function __toString(){
			$string = "<div class='card'>
					<div class='card-body'>
						<h6 class='card-text'>$this->sentiero_parco</h6>
						<h5 class='card-title'>Sentiero $this->sentiero_sigla : $this->sentiero_nome</h5>
						<h5 class='card-text'>$this->data</h5>";
			if($this->iscritto)
				$string .= '<a class="btn btn-outline-secondary" href="api/leave_event.php?escursione=' . $this->id . '">Annulla</a>';				
			else
				$string .= '<a class="btn btn-outline-info" href="api/join_event.php?escursione='. $this->id . '">Prenota!</a>';	
			$string .= '</div></div>';
			return $string;
		}
	}
?>