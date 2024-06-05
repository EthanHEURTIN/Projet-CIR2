<?php

function dbMN90Line($conn, $depth, $duration){

    $requete = $conn->prepare('SELECT * FROM public.mn90 WHERE prof = :depth AND t = :duration');
    $requete->bindParam(':depth', $depth);
    $requete->bindParam(':duration', $duration);
    $requete->execute();
    $info = $requete->fetchAll();
    return $info;

}