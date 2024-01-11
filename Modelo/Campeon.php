<?php

class Campeon{
    private int $id;
    private string $nombre;
    private string $rol;
    private string $dificultad;
    private string $descripcion;

    // Getter para $id
    public function getId(): int {
        return $this->id;
    }

    // Setter para $id
    public function setId(int $id){
        $this->id = $id;
    }

    // Getter para $nombre
    public function getNombre(): string {
        return $this->nombre;
    }

    // Setter para $nombre
    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }

    // Getter para $rol
    public function getRol(): string {
        return $this->rol;
    }

    // Setter para $rol
    public function setRol(string $rol){
        $this->rol = $rol;
    }

    // Getter para $dificultad
    public function getDificultad(): string {
        return $this->dificultad;
    }

    // Setter para $dificultad
    public function setDificultad(string $dificultad){
        $this->dificultad = $dificultad;
    }

    // Getter para $descripcion
    public function getDescripcion(): string {
        return $this->descripcion;
    }

    // Setter para $descripcion
    public function setDescripcion(string $descripcion){
        $this->descripcion = $descripcion;
    }



}

?>