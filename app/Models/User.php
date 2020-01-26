<?php


namespace App\Models;

class User
{
    private $id;
    private $name;
    private $last_name;
    private $dateOfBirth;
    private $email;

    public function __construct(
        int $id,
        string $name,
        string $last_name,
        string $dateOfBirth,
        string $email
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->last_name = $last_name;
        $this->dateOfBirth = $dateOfBirth;
        $this->email = $email;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lastName(): string
    {
        return $this->last_name;
    }

    public function dateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    public function email(): string
    {
        return $this->email;
    }

    public static function create($attributes): User
    {
        return new User(
            $attributes["id"],
            $attributes["name"],
            $attributes["last_name"],
            $attributes["date_of_birth"],
            $attributes["email"]
        );
    }
}

