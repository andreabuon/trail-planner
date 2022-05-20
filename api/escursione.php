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

	}
?>