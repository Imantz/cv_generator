<?php

namespace App\Controllers;

use Core\Managers\FormValidator\FormValidator;

class CvGeneratorController
{
    public function create()
    {
        return view("cv/cv_input_fields");
    }

    public function store()
    {
        database()->insert("users_cv",
            [
                "name" => $_POST["name"],
                "last_name" => $_POST["last_name"],
                "date_of_birth" => $_POST["date"],
                "email" => $_POST["email"]
            ]);

        $current_id = database()->id();

        if(!empty($_FILES))
        {
            $name = $_FILES["img"]["name"];
            $type = $_FILES["img"]["type"];
            $data = file_get_contents($_FILES["img"]["tmp_name"]);

            database()->insert("images_cv",[
                "user_id" => $current_id,
                "name" => $name,
                "mime" => $type,
                "data" => $data
            ]);
        }

            $nmb = 1;
        while(!empty($_POST["school_".$nmb])){
            database()->insert("education",
                [
                    "user_id"=>$current_id,
                    "school_name" => $_POST["school_".$nmb],
                    "degree" => $_POST["degree_".$nmb],
                    "study_start" => $_POST["from_".$nmb],
                    "study_end" => $_POST["till_".$nmb],
                    "speciality" => $_POST["speciality_".$nmb]
                ]);
            $nmb++;
        }

        database()->insert("languages",
            [
                [
                    "user_id" => $current_id,
                    "language" => "Latvian",
                    "writing" => $_POST["latvian_writing"],
                    "speaking" => $_POST["latvian_speaking"],
                    "reading" => $_POST["latvian_reading"]
                ],
                [
                    "user_id" => $current_id,
                    "language" => "Russian",
                    "writing" => $_POST["russian_writing"],
                    "speaking" => $_POST["russian_speaking"],
                    "reading" => $_POST["russian_reading"]
                ],
                [
                    "user_id" => $current_id,
                    "language" => "English",
                    "writing" => $_POST["english_writing"],
                    "speaking" => $_POST["english_speaking"],
                    "reading" => $_POST["english_reading"]
                ]
            ]
        );

            $nmb = 1;
        while(!empty($_POST["language_".$nmb])){
            database()->insert("languages",
                [
                    "user_id"=>$current_id,
                    "language" => $_POST["language_".$nmb],
                    "writing" => $_POST["writing_".$nmb],
                    "speaking" => $_POST["speaking_".$nmb],
                    "reading" => $_POST["reading_".$nmb],
                ]);
            $nmb++;
        }

        return redirect("/".$current_id);
    }
}