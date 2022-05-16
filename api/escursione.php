<?php
	class Escursione{
		private $id;
		private $sentiero_parco;
		private $sentiero_sigla;
		private $data;
		private $organizzatore;
		private $note;
		private $iscritto;

		public function __construct($id, $parco, $sigla, $data, $organizzatore, $note=NULL, $iscritto='0'){
			$this->id = $id;
			$this->sentiero_parco = $parco;
			$this->sentiero_sigla = $sigla;
			$this->data = $data;
			$this->organizzatore = $organizzatore;
			$this->note = $note;
			$this->iscritto = $iscritto;
			return $this;
		}
	
		public function stampa(){
			echo "<div class='card'>
					<div class='card-body'>
						<h6 class='card-text'>$this->sentiero_parco</h6>
						<h5 class='card-title'>Sentiero $this->sentiero_sigla</h5>
						<h5 class='card-text'>$this->data</h5>";
			if(!$this->iscritto)
				echo '<a class="btn btn-outline-info" href="api/join_event.php?escursione='. $this->id . '">Partecipa!</a>';
			else
				echo '<a class="btn btn-outline-secondary" href="api/leave_event.php?escursione=' . $this->id . '">Annulla</a>';
			echo '</div></div>';
		}
	}
?>