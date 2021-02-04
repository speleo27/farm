<?php

if(isset($_POST['btnconnect']))
{
    
    $email=filter_var($_POST['connect_email'],FILTER_VALIDATE_EMAIL);
    
    if($email === false){
        header('Location:../index.php');
        die();
    }
      
        include ('connectdb.php');
        $req=$bdd->prepare('SELECT * FROM connect WHERE connect_email=? LIMIT 1');
        $req->execute(array(
        $email
    ));
        
        $data= $req->fetch(PDO::FETCH_ASSOC);

        $emaildb=$data['connect_email'];
        $guizmodb=$data['connect_password'];
        $guizmoSend=$_POST['passwordSend'];
       //echo password_hash('test123', PASSWORD_BCRYPT);
        //var_dump($guizmodb);
        //var_dump($guizmoSend);

       // var_dump($emaildb);
       // var_dump($email);

        if($email == $emaildb)
        {
            //var_dump(password_verify($guizmoSend,$guizmodb));

            if(password_verify($guizmoSend,$guizmodb))
            {
                session_start();
               
                $_SESSION['user']=$data;
                    //echo 'connecter en user';
                    
                    header('Location:../game.php');
            }
            else
            {
                header('Location:../index.php');
            }
        }
        else
        {
            header('Location:../index.php');
        }
   
}