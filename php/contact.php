<?php
$array= array("prenomerror"=>"","nomerror"=>"","mailerror"=>"","telerror"=>"","isSubmit" => false);
$mailto = "abdo.bihi03@gmail.com" ;

if ($_SERVER['REQUEST_METHOD'] == "POST"){ # If the form has been submitted
    $prenom = verify_input ($_POST["prenom"]);
    $nom=verify_input ($_POST["nom"]);
    $mail=verify_input ($_POST["mail"]);
    $tel=verify_input ($_POST["tel"]);
    $array["isSubmit"] = true ;
    $emailtext="" ;

    if(empty($prenom)){
        $array["prenomerror"] = 'Enter your Firstname' ;
        $array["isSubmit"] = false ;
    }else{
        $emailtext.="prenom: $prenom\n" ;
    }
    if(empty($nom)){
        $array["nomerror"] = 'Enter your Lastname' ;
        $array["isSubmit"] = false ;
    }else{
        $emailtext.="nom: $nom\n" ;
    }if(empty($mail)){
        $array["mailerror"] = 'Enter your Email' ;
        $array["isSubmit"] = false ;
    }else{
        $emailtext .= "Email: $mail\n" ;
    }if(empty($tel)){
        $array["telerror"] = 'Enter your Phone-Number' ;
        $array["isSubmit"] = false ;
    }else{
        $emailtext.="Telephone: $tel\n" ;
    }
    if($array["isSubmit"]){
        $headers = "From: $mail\n " ;
        mail($mailto,"un msg de votre site",$emailtext,$headers);
    }
    echo json_encode($array);
}

function verify_input($var){
    $var= trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var ;

}

?>