
<?php view("layout/header"); ?>

<div class="row">
 <div class="m-auto">
     <form id="form" style="max-width: 1000px;" method="post" action="/" enctype="multipart/form-data">
         <div class="form-row">

             <div class="form-group col-md-6">
                 <label for="">Name</label>
                 <input type="text" class="form-control" name="name" placeholder="John">
             </div>

             <div class="form-group col-md-6">
                 <label for="last_name">Last name</label>
                 <input type="text" class="form-control" name="last_name" placeholder="Do">
             </div>

         </div>

         <div class="form-row">
             <div class=" m-auto form-group col-md-6">
                 <label for="date">Birth date:</label>
                     <input type="date" class="form-control" name="date">
             </div>
             <div class="m-auto form-group col-md-6">
                 <label for="email">Email:</label>
                 <input type="text" class="form-control" name="email" placeholder="email" required>
             </div>
         </div>

         <hr>
         <h6>Education</h6>
         <hr>

    <div id="education-div">

        <div v-for="index in count" :key="index">
<!--        <div>-->
            <div>
                <div class="form-row" >
                    <div class="m-auto form-group col-md-6">
                        <label for="education">Education:</label>
                        <input type="text" class="form-control" :name="'school_' + index" placeholder="School name">
                    </div>
                    <div class="m-auto form-group col-md-6">
                        <label for="degree">Degree:</label>
                        <input type="text" class="form-control" :name="'degree_' + index" placeholder="Degree">
                    </div>
                </div>
                <div class="form-row">
                    <div class="m-auto form-group col-md-6">
                        <label for="from">Year from:</label>
                        <input type="text" class="form-control" :name="'from_' + index" placeholder="2010">
                    </div>
                    <div class="m-auto form-group col-md-6">
                        <label for="till">till:</label>
                        <input type="text" class="form-control" :name="'till_' + index" placeholder="2017">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="till">speciality:</label>
                        <input type="text" class="form-control" :name="'speciality_' + index" placeholder="example Teacher">
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="form-group col-md-6">
            <div>
                <a v-on:click="add_education" class="m-auto btn btn-outline-primary">Add more degree</a>
            </div>
        </div>
    </div>


         <hr>

         <div id="languages">
             <div class="form-row">
                 <div class="form-group col-md-12">
                     <h6>Languages</h6>
                 </div>

                 <div class="form-group col-md-4">
                     <p>Speaking:</p>
                     <select name="latvian_speaking" class="form-control">
                         <option>Bad</option>
                         <option>Good</option>
                         <option>Native</option>
                     </select>
                 </div>
                 <div class="form-group col-md-4">
                     <p>Reading:</p>
                     <select name="latvian_reading" class="form-control">
                         <option>Bad</option>
                         <option>Good</option>
                         <option>Native</option>
                     </select>
                 </div>
                 <div class="form-group col-md-4">
                     <p>Writing:</p>
                     <select name="latvian_writing" class="form-control">
                         <option>Bad</option>
                         <option>Good</option>
                         <option>Native</option>
                     </select>
                 </div>
             </div>

             <div class="form-row">
                 <div class="form-group col-md-12">
                     Russian language
                 </div>
                 <div class="form-group col-md-4">
                     <p>Speaking:</p>
                     <select name="russian_speaking" class="form-control">
                         <option>Bad</option>
                         <option>Good</option>
                         <option>Native</option>
                     </select>
                 </div>
                 <div class="form-group col-md-4">
                     <p>Reading:</p>
                     <select name="russian_reading" class="form-control">
                         <option>Bad</option>
                         <option>Good</option>
                         <option>Native</option>
                     </select>
                 </div>
                 <div class="form-group col-md-4">
                     <p>Writing:</p>
                     <select name="russian_writing" class="form-control">
                         <option>Bad</option>
                         <option>Good</option>
                         <option>Native</option>
                     </select>
                 </div>
             </div>

             <div class="form-row">
                 <div class="form-group col-md-12">
                     English
                 </div>
                 <div class="form-group col-md-4">
                     <p>Speaking:</p>
                     <select name="english_speaking" class="form-control">
                         <option>Bad</option>
                         <option>Good</option>
                         <option>Native</option>
                     </select>
                 </div>
                 <div class="form-group col-md-4">
                     <p>Reading:</p>
                     <select name="english_reading" class="form-control">
                         <option>Bad</option>
                         <option>Good</option>
                         <option>Native</option>
                     </select>
                 </div>
                 <div class="form-group col-md-4">
                     <p>Writing:</p>
                     <select name="english_writing" class="form-control">
                         <option>Bad</option>
                         <option>Good</option>
                         <option>Native</option>
                     </select>
                 </div>
             </div>

             <div v-for="index in count" :key="index">
                 <hr>
                 <div class="form-row">

                     <div class="form-group col-md-12">
                         <input style="width: 120px" type="text" class="form-control" placeholder="Language" :name="'language_' + index">
                     </div>

                     <div class="form-group col-md-4">
                         <p>Speaking:</p>
                         <select class="form-control" :name="'speaking_' + index">
                             <option>Bad</option>
                             <option>Good</option>
                             <option>Native</option>
                         </select>
                     </div>
                     <div class="form-group col-md-4">
                         <p>Reading:</p>
                         <select class="form-control" :name="'reading_' + index">
                             <option>Bad</option>
                             <option>Good</option>
                             <option>Native</option>
                         </select>
                     </div>
                     <div class="form-group col-md-4" >
                         <p>Writing:</p>
                         <select class="form-control" :name="'writing_' + index">
                             <option>Bad</option>
                             <option>Good</option>
                             <option>Native</option>
                         </select>
                     </div>

                 </div>
             </div>
             <hr>
             <div class="form-group col-md-6">
                 <div>
                     <a v-on:click="add_language" class="m-auto btn btn-outline-primary">Add language</a>
                 </div>
             </div>
             <hr>
         </div>

         <div class="form-row">
             <div class="form-group col-md-6">
                 <div class="custom-file">
                     <label class="custom-file-label" name="photo">Add photo?</label>
                     <input type="file" class="custom-file-input" name="img">
                 </div>

             </div>

             <div>
                 <div class="ml-auto">
                     <button type="submit" name="submit" class="btn btn-outline-primary">Download CV</button>
                 </div>
             </div>
         </div>

     </form>
 </div>
</div>

<?php view("layout/footer"); ?>

