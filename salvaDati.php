<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Recupero dati inviati dal form
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $motivo = $_POST["selezione-motivo"];
    $messaggio = $_POST["messaggio"];

// Creazione stringa con i dati formattati
    $dati_da_salvare = "Nome: $nome\nCognome: $cognome\nE-mail: $email\nRichiesta principale: $motivo\nMessaggio: $messaggio\n\n";

// file dati utenti.txt
    $file = fopen("datiUtenti.txt", "a");

// Scrive i dati nel file
    fwrite($file, $dati_da_salvare);

// Chiude il file
    fclose($file);

// Pagina di conferma
    header("Location: confermaForm.html");
    exit();
}
?>
