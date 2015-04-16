<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Destinatario
 *
 * @author amm
 */
class Destinatario {
    private $nome;
    private $cognome;
    private $numeroCivico;
    private $via;
    private $citta;
    private $cap;
    
     /**
     * Restituisce il nome dell'utente
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Imposta il nome dell'utente
     * @param string $nome
     * @return boolean true se il nome e' stato impostato correttamente, 
     * false altrimenti 
     */
    public function setNome($nome) {
    
        $this->nome = $nome;
        return $nome != null;
    }

    /**
     * Restituisce il cognome dell'utente
     * @return string
     */
    public function getCognome() {
        return $this->cognome;
    }

    /**
     * Imposta il cognome dell'utente
     * @param string $cognome
     * @return boolean true se il cognome e' stato impostato correttamente,
     * false altrimenti
     */
    public function setCognome($cognome) {
        $this->cognome = $cognome;
        return $cognome != null;
    }
    
    /**
     * Restituisce la via di abitazione dell'utente
     * @return string
     */
    public function getVia() {
        return $this->via;
    }

    /**
     * Imposta un nuovo valore per la via
     * @param type $via
     * @return boolean true se la via e' stata impostata correttamente, false
     * altrimenti
     */
    public function setVia($via) {
        $this->via = $via;
        return true;
    }

    
    /**
     * Restituisce il valore del numero civico di abitazione dell'utente
     * @return int
     */
    public function getNumeroCivico() {
        return $this->numeroCivico;
    }

    /**
     * Imposta il valore del numero civico dell'utente
     * @param string $civico il nuovo numero civico
     * @return boolean true se il valore e' ammissibile ed e' stato aggiornato
     * correttamente, false altrimenti
     */
    public function setNumeroCivico($civico) {
        $intVal = filter_var($civico, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if (isset($intVal)) {
            $this->numeroCivico = $intVal;
            return true;
        }
        return false;
    }

    /**
     * Imposta la citta di abitazione dell'utente
     * @param string $citta la nuova citta' di abitazione dell'utente
     * @return boolean true se il valore e' stato aggiornato correttamente,
     * false altrimenti
     */
    public function setCitta($citta) {
        $this->citta = $citta;
        return $citta != null;
    }

    /**
     * Restituisce la citta' di abitazione dell'utente
     * @return string
     */
    public function getCitta() {
        return $this->citta;
    }

    /**
     * Restituisce il cap di abitazione dell'utente
     * @return int
     */
    public function getCap() {
        return $this->cap;
    }

    /**
     * Imposta il cap di abitazione dell'utente
     * @param int $cap
     * @return boolean true se il nuovo valore e' ammissibile ed e' stato 
     * impostato, false altrimenti
     */
    public function setCap($cap) {
        if (!filter_var($cap, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/[0-9]{5}/')))) {
            return false;
        }
        $this->cap = $cap;
        return true;
    }
   
}
