//Vérification et recupération de devise
if(isset($_POST['devise']))
{
    //recupération de devise
    $requeteDonnees['devise'] = htmlspecialchars($_POST['devise']); 
}
else 
{
    $test++;
    $message = 'devise ne doit pas etre null. '; 
}