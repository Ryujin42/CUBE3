<?php
    $id = $_POST['id'];
    if(isset($_POST["id"])){
        deleteCategory($id);
    };
    function deleteCategory($id){
        $db = new PDO('mysql:host=localhost;dbname=html','root','root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "DELETE FROM Utilisateur WHERE id IN ($id)";
        try{
            $query = $db->prepare($sql);
            $query->execute($valeur);
            header('Location: ./Adminindex.php');
        }catch(Exception $e){
            echo 'erreur:' .$e->getMessage(); 
        }
    }
?>