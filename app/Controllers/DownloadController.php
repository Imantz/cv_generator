<?php


namespace App\Controllers;

use Dompdf\Dompdf;
use App\Models\User;

class DownloadController
{
    public function download($id)
    {
        $img = database()->get("images_cv","*",["user_id"=>$id]);

        $img_for_cv =  '<img src="data:'.$img["mime"].';base64,'.base64_encode($img["data"]).'"
        height=auto width="150"/>';

            $user = User::create(database()->get("users_cv","*",["id"=>$id]));


            $userLanguages = database()->select("languages","*",["user_id"=>$id]);

            $userEducation = database()->select("education","*",["user_id"=>$id]);

            $dompdf = new Dompdf();

        ob_start();

        ?>

        <h1>CV</h1>
        <h4>Basic information</h4>
        <hr>
        <table id="contact-information-table">
            <tr>
                <th></th>
                <th><?php echo $img_for_cv ?></th>
            </tr>
            <tr>
                <td class="text-right">Name, last name:</td>
                <td><?php echo $user->name(). " " . $user->lastName(); ?></td>
            </tr>
            <tr>
                <td class="text-right">Birth date:</td>
                <td><?php echo $user->dateOfBirth(); ?></td>
            </tr>
            <tr>
                <td class="text-right">Email:</td>
                <td><?php echo $user->email(); ?></td>
            </tr>
        </table>
        <h4>Skills and knowledge</h4>
        <hr>
        <p><b>Languages</b></p>

        <table id="languages-table">
            <tr class="bg-grey border-grey">
                <td></td>
                <td>Language</td>
                <td>Speaking</td>
                <td>Reading</td>
                <td>Writing</td>
            </tr>
            <?php $nmb= 1; foreach ($userLanguages as $language): ?>
                <tr class="border-grey">

                    <td><?php echo $nmb . "."; ?></td>
                    <td><?php echo $language["language"] ?></td>
                    <td><?php echo $language["speaking"] ?></td>
                    <td><?php echo $language["reading"] ?></td>
                    <td><?php echo $language["writing"] ?></td>
                </tr>
                <?php $nmb++; endforeach; ?>
        </table>

        <h4>Education</h4>
        <hr>

        <table id="education-table">
            <?php foreach ($userEducation as $education): ?>
                <tr>
                    <td class="text-right">School name:</td>
                    <td><b><?php echo $education["school_name"] ?></b></td>
                </tr>
                <tr>
                    <td class="text-right">Degree:</td>
                    <td><?php echo $education["degree"] ?></td>
                </tr>
                <tr>
                    <td class="text-right">study_start:</td>
                    <td><?php echo $education["study_start"] ?></td>
                </tr>
                <tr>
                    <td class="text-right">study end:</td>
                    <td><?php echo $education["study_end"] ?></td>
                </tr>
                <tr>
                    <td class="text-right">Speciality:</td>
                    <td><?php echo $education["speciality"] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <style>
            h1 { text-align: center }

            #contact-information-table { width: 70%}
            #languages-table { width: 100%; border-collapse: collapse;}
            #education-table { width: 50%; font-size: medium}
            .text-right { text-align: right }
            .bg-grey {background-color: lightgrey}
            .border-grey > td { border: 1px solid lightgrey}
        </style>



        <?php

        $html=ob_get_clean();

        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

         // Output the generated PDF to Browser
        $dompdf->stream("cv". $user->name() ."_".$user->lastName() .".pdf",["Attachment"=>0]);

    }
}