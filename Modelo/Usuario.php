<?php

class Usuario {
    private int $id;
    private string $nombre;
    private string $usuario;
    private string $password;
    private string $email;

    // Getter para el ID
    public function getId(): int {
        return $this->id;
    }

    // Setter para el ID
    public function setId(int $id): void {
        $this->id = $id;
    }

    // Getter para el nombre
    public function getNombre(): string {
        return $this->nombre;
    }

    // Setter para el nombre
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    // Getter para el usuario
    public function getUsuario(): string {
        return $this->usuario;
    }

    // Setter para el usuario
    public function setUsuario(string $usuario): void {
        $this->usuario = $usuario;
    }

    // Getter para la contraseña
    public function getPassword(): string {
        return $this->password;
    }

    // Setter para la contraseña
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    // Getter para el correo electrónico
    public function getEmail(): string {
        return $this->email;
    }

    // Setter para el correo electrónico
    public function setEmail(string $email): void {
        $this->email = $email;
    }
}

?>
