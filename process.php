<?php
    require 'database.php';
    $databaseClass = new database();

    if (isset($_POST['action'])) {
        if (($_POST['action']) == "add") {
            $success = $databaseClass->save($_POST);

            if($success) {
                header("location: index.php");
            } else {
                echo $success;
            }
        } else if (($_POST['action']) == "edit"){
            $success = $databaseClass->edit($_POST);
            
            if($success) {
                header("location: index.php");
            } else {
                echo $success;
            }
        }
    } 

    if (isset($_GET['delete'])) {
        $success = $databaseClass->delete($_GET);

        if( $success) {
            header("location: index.php");
        } else {
            echo $success;
        }
    }
?>