<?php
use Core\Database;



function createUsersCvTable()
{
    Database::$instance->connection()->create("users_cv", [
        "id" => [
            "INT",
            "NOT NULL",
            "AUTO_INCREMENT"
        ],
        "name" => [
            "VARCHAR(70)"
        ],
        "last_name" => [
            "VARCHAR(70)"
        ],
        "date_of_birth" => [
            "VARCHAR(70)"
        ],
        "email" => [
            "VARCHAR(70)"
        ],
        "PRIMARY KEY (<id>)"
    ]);
}

function createEducationTable()
{
    Database::$instance->connection()->create("languages", [
        "id" => [
            "INT",
            "NOT NULL",
            "AUTO_INCREMENT"
        ],
        "user_id" => [
            "INT(70)",
            "NOT NULL"
        ],
        "language" => [
            "VARCHAR(50)"
        ],
        "writing" => [
            "VARCHAR(50)"
        ],
        "speaking" => [
            "VARCHAR(50)"
        ],
        "reading" => [
            "VARCHAR(50)"
        ],
        "PRIMARY KEY (<id>)"
    ]);
};

function createLanguagesTable()
{
    Database::$instance->connection()->create("education", [
        "id" => [
            "INT",
            "NOT NULL",
            "AUTO_INCREMENT"
        ],
        "user_id" => [
            "INT",
            "NOT NULL"
        ],
        "school_name" => [
            "VARCHAR(70)"
        ],
        "degree" => [
            "VARCHAR(70)"
        ],
        "study_start" => [
            "VARCHAR(50)"
        ],
        "study_end" => [
            "VARCHAR(50)"
        ],
        "speciality" => [
            "VARCHAR(50)"
        ],
        "PRIMARY KEY (<id>)"
    ]);
};

function createTableForImages()
{
    database()->create("images_cv", [
        "id" => [
            "INT",
            "NOT NULL",
            "AUTO_INCREMENT"
        ],
        "user_id" => [
            "INT",
            "NOT NULL"
        ],
        "name" => [
            "VARCHAR(255)"
        ],
        "mime" => [
            "VARCHAR(255)"
        ],
        "data" => [
            "BLOB"
        ],
        "PRIMARY KEY (<id>)"
    ]);
}


function config(string $key, string $defaultValue = ''): string
{
    $defaultValue = !empty($defaultValue) ? $defaultValue : $key;
    [$fileName, $configKey] = explode('.', $key, 2);
    $config = include __DIR__ . '/config/'.$fileName.'.php';

    return $config[$configKey] ?? $defaultValue;
}

function database()
{
    return Database::$instance->connection();
}

function view(string $path)
{
    include(__DIR__ . '/app/Views/' . $path . '.php');
}

function redirect(string $location)
{
    header('Location: ' . $location);
    exit;
}
