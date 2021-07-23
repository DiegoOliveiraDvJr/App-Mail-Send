<?php

namespace mensagemModel;
    class Mensagem{

        private $para = null;
        private $assunto = null;
        private $mensagem = null;

        public function __get($atributo){
            return $this->$atributo;
        } 
        public function __set($atributo, $value){
            $this->$atributo = $value;
        } 

        public function mensagemValida(){
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
                return false;
            }
            return true;
        }
    }
?>