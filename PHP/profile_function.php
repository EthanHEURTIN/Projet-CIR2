<?php

function dbMN90Line($conn, $depth, $duration){

    session_start();
    $email = $_SESSION['email'];

    $requete = $conn->prepare('SELECT * FROM public.mn90 WHERE prof = :depth AND t = :duration');
    $requete->bindParam(':depth', $depth);
    $requete->bindParam(':duration', $duration);
    $requete->execute();
    $info1 = $requete->fetchAll();

    $requete = $conn->prepare('SELECT capacity_tank_l, pressure_tank FROM public.user WHERE email = :email');
    $requete->bindParam(':email', $email);
    $requete->execute();
    $info2 = $requete->fetchAll();

    $result = array_merge($info1, $info2);
    return $result;

}
?>