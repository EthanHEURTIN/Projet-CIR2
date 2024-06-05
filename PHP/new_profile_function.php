<?php

function getMn90InfoByDepth($conn, $depth){
    $requete = $conn->prepare('SELECT * FROM public.mn90 WHERE prof = :depth');
    $requete->bindParam(':depth', $depth);
    $requete->execute();
    $info = $requete->fetchAll();
    return $info;
}

function getDepth($conn){
    $requete = $conn->prepare('SELECT DISTINCT prof FROM public.mn90 ORDER BY prof');
    $requete->execute();
    $info = $requete->fetchAll();
    return $info;
}

?>