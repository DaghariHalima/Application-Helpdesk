<?php


// Configure your mysql database connection details:

$mysqlserverhost = "localhost";
$database_name = "helpdesk";
$username_mysql = "root";
$password_mysql = "";

// ------------------------- Do not modify code nder this field -------------------------- //


function sanitize($variable){
  $clean_variable = strip_tags($variable);
  $clean_variable = htmlentities($clean_variable, ENT_QUOTES, 'UTF-8');
  return $clean_variable;
}

function connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name){
  $connect = mysqli_connect($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
  if (!$connect) {
      die("Connection failed mysql: " . mysqli_connect_error());
  }
  return $connect;  
}

if(isset($_POST["processform"])){
  $connection = connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
  $firstfield = mysqli_real_escape_string($connection, sanitize($_POST["nom"]));
  $secondfield = mysqli_real_escape_string($connection, sanitize($_POST["prenom"]));
  $thirdfield = mysqli_real_escape_string($connection, sanitize($_POST["email"]));
  $fourthfield = mysqli_real_escape_string($connection, sanitize($_POST["date"]));   
  $country=$_POST['pays'];
  $fivefield = mysqli_real_escape_string($connection, sanitize($_POST["cin"]));
  $sixfield = mysqli_real_escape_string($connection, sanitize($_POST["tel"]));
    $check=implode($_POST['ch']);

   $sql = "INSERT INTO administrateur (nom, prenom,email,date,pays,cin,tel,checkbox) VALUES ('$firstfield', '$secondfield', '$thirdfield', '$fourthfield','$country','$fivefield','$sixfield', '$check')";
  if (mysqli_query($connection, $sql)) {
      echo "<h2><font color=#FE2E9A>New record added to database.</font></h2>";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }
  mysqli_close($connection);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&display=swap">
  <link rel="stylesheet" href="stylesheets/demo.css">
  <link rel="stylesheet" href="stylesheets/grid.css">
  <link rel="stylesheet" href="stylesheets/form.css">
</head>
<style type="text/css">
  #wrap {
  display: flex;
  padding-left: 450px;
}

#cadre1 {
  background: white;
  flex-basis: 48%;
   height: 500px; 
}


#tete {
  height: 70px;
  width: 100%;
  text-align: center;
 }
 #tete h1{
   margin-left: auto;
    margin-right: auto;
    font-size: 37px;
    color:#0aedf5;
    text-decoration: underline;
  -webkit-text-decoration-color: #E18728;
  text-decoration-color: #0af2ea;
  font-family: 'Lobster', cursive;  
 }

.button {
      border: none;
      display: block;
      text-align: center;
      cursor: pointer;
      text-transform: uppercase;
      outline: none;
      overflow: hidden;
      position: relative;
      color: black;
      font-weight: 600;
      font-size: 15px;
      background-color:white; /*#e1e1d0;*/
      padding: 15px 50px;
     /* margin: 0 auto;*/
          display: inline-block;
      font-size: 16px;
        margin: 4px 2px;
       cursor: pointer;



      }
      .button span {
      position: relative; 
      z-index: 1;
      }
      .button:after {
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      height: 470%;
      width: 140%;
      background: #0fbfb4;

      -webkit-transition: all .5s ease-in-out;
      transition: all .5s ease-in-out;
      -webkit-transform: translateX(-100%) translateY(-25%) rotate(45deg);
      transform: translateX(-100%) translateY(-25%) rotate(45deg);
      }
      .button:hover:after {
      -webkit-transform: translateX(-9%) translateY(-25%) rotate(45deg);
      transform: translateX(-9%) translateY(-25%) rotate(45deg);
      }

 
#conteneurFile .inputFile
{
    opacity         : 0; /* pour !IE */
    
   
   filter          : alpha(opacity=0); /* pour IE */
    position        : absolute;
    right           : 0;
    top             : 3;

        display: block;
    width: 75%;
    padding: 9px 10px 8px 10px;
    border: 1px solid #dfdfdf;
    border-top: 1px solid #bbb;
    border-left: 1px solid #aaa;
    box-shadow: inset 2px 2px 4px -1px #c5c5c5, inset 0 -10px 30px 0px #FFF;
    padding-left: 5;
} 



#class{
    display: block;
    right: 5;
    width: 45%;
    padding: 9px 10px 8px 10px;
    border: 1px solid #dfdfdf;
    border-top: 1px solid #bbb;
    border-left: 1px solid #aaa;
    box-shadow: inset 2px 2px 4px -1px #c5c5c5, inset 0 -10px 30px 0px #FFF;
    background: #f5f5f5;
    color: #000;
    font-size: 0.9em;
    border-radius: 3px;
    font-weight: 400;
    transition:all 0.2s ease;
    margin-left: : 100px;
}
#input_text_file{
    display: block;
    width: 120%;
    padding: 9px 10px 8px 10px;
    border: 1px solid #dfdfdf;
    border-top: 1px solid #bbb;
    border-left: 1px solid #aaa;
    box-shadow: inset 2px 2px 4px -1px #3c615a, inset 0 -10px 30px 0px #FFF;
    background: #f5f5f5;
    color: #000;
    font-size: 0.9em;
    border-radius: 3px;
    font-weight: 400;
    transition:all 0.2s ease;

}
 

 

  
</style>
<script type="text/javascript">
  function validateForm() {
    var a = document.forms["Form"]["firstfield"].value;
    var b = document.forms["Form"]["secondfield"].value;
    var c = document.forms["Form"]["thirdfield"].value;
    var d = document.forms["Form"]["fourthfield"].value;
    if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "") {
      alert("Please Fill All Required Field");
      return false;
    }
  }
</script>

<body class="">


  <div id="tete">
    <h1>Formulaire</h1>
      
    </div>
    <div id="wrap">

     <div id="cadre1">
      <main>
    <!-- GRID -->
    <section class="box shadow clearfix">
        <form action="trait.php" method="post" class="form-default" name="Form" onsubmit="return validateForm()">
            <input type="hidden" name="processform" value="1">



        <!-- row -->
            <div class="field g1 g-attach-left">
              <label for="field">* Nom:</label>
          </div>


          <div class="field g3  g-attach-right">
          
              <input type="text" name="nom" id="input11" placeholder="Nom">
          </div>



               <div class="field g1 g-attach-left">
        <label for="field">* Prenom:</label>
          </div>


          <div class="field g3  g-attach-right">
       
              <input type="text" name="prenom" id="input11" placeholder="Prenom">
          </div>



                  <div class="field g1 g-attach-left">
        <label for="field">* E-mail:</label>
          </div>


          <div class="field g3  g-attach-right">
     
              <input type="text" name="email" id="input11" placeholder="E-mail">
          </div>



                     <div class="field g1 g-attach-left">
        <label for="field">* Date:</label>
          </div>


          <div class="field g3  g-attach-right">
       
              <input type="text" name="date" id="input11" placeholder="JJ/MM/AAAA">
          </div>



            <div class="field g1 g-attach-left">
        <label for="field">* Pays:</label>
          </div>

              <div class="field g3 g-attach-right">

          <select name="pays" id="select1"  >
            <option value="">Sélectionner un pays</option>
              <option value="France">France</option>
              <option value="Tunisie">Tunisie</option>
              <option value="Egypt">Egypt</option>
              <option value="Maroc">Maroc</option>
          </select>
          </div>


                   <div class="field g1 g-attach-left">
        <label for="field">* CIN:</label>
          </div>


          <div class="field g3  g-attach-right">
       
              <input type="text" name="cin" id="input11" placeholder="CIN">
          </div>


                      <div class="field g1 g-attach-left">
        <label for="field">* Numero Tel:</label>
          </div>


          <div class="field g3  g-attach-right">
        
              <input type="text" name="tel" id="input11" placeholder="Numer Tel">
          </div>


        
     <div class="field g1 g-attach-left">
              <label for="input10">*Genre :</label>
          </div>

           <div class="field g1 g-attach-right">
              
       
            <label>
                            <input type="radio" name="ch[]"  value="Homme">Homme
                        </label>
                      </div>

                  <div class="field g1 g-attach-right">

             <label>
                            <input type="radio" name="ch[]" value="Femme">Femme
               </label>
       </div>
         <div class="field g3 g-attach-left">
              <label for="input10"></label>
          </div>

  <div class="field g3 g-attach-left">
              <label for="input10"></label>
          </div>
         







  

 <div >
     <button class="button" type="submit" ><span>Ajouter</span></button>
     <button class="button" type="reset" ><span>Annuler</span></button>
    </div>

   


 




          

        </form>
      </section>
    </main>
     
    </div>



  


</div>

    


   


 




          



          
   
     
  
   
  





  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script>
  $(function(){

    $('.field').on('focusin', 'input, select', function(event) {
      $(this).parent().addClass('focusIn');
    });

    $('.field').on('focusout', 'input, select', function(event) {
      if( $(this).val() == "" ){
        $(this).parent().removeClass('focusIn');    
      }
    });

    $.each( $('input, select') , function(index, val) {
      if( $(this).val() != "" ){
        $(this).parent().addClass('focusIn');   
      }
    });
  });
  </script>

</body>
</html>

