<?php
session_start();

if ($_POST['SearchCritere'] == "infection.nip") 
 { header('Location: nip.php?SearchCritere=infection.nip');
    exit();} 
 if ($_POST['SearchCritere'] == "nom_service") 
 { header('Location: service.php?SearchCritere=nom_service');
    exit();} 
if ($_POST['SearchCritere'] == "date_declaration") 
{ header('Location: declaration.php?SearchCritere=date_declaration');
   exit();}
if ($_POST['SearchCritere'] == "infection.id_personnel") {
    header('Location: personnel.php?SearchCritere=infection.id_personnel');
    exit();}
if ($_POST['SearchCritere'] == "tout") {
    header('Location: infection1.php?SearchCritere=tout');
    exit();}
?>