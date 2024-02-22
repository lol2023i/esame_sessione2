<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatti</title>
    <link rel="stylesheet" href="/css/style.min.css">

    
</head>
<body>

<!-- caricamento e decodifica in array del file json per la pagina contatti --------------------->
    <?php
        $datiJsonPaginaContatti = file_get_contents ("datiPaginaContatti.json");
        $datiPaginaContatti = json_decode ($datiJsonPaginaContatti,true);
    ?>

<!-- header: include del menu di navigazione --------------------------------------->

<?php
include ('menuNav.php'); 
?>

<!-- main: form + contatti + link utili + cookie policy ------------------------------------------------------------------------------------>
    <main id="centraContenuto">
        <br><br><br><br><br><br><br><br><br>
        <section>
            <form class="form-stile" action="salvaDati.php" method="POST">
                <h2 class="sottoTitolo">Manda una qualsiasi richiesta compilando il modulo di seguito</h2>
                <fieldset>
                    
                    <label for="nome">Nome</label><br>
                    <input type="text" name="nome" placeholder="Insersci nome">
                    <br><br>
                    <label for="cognome">Cognome</label><br>
                    <input type="text" name="cognome" placeholder="Insersci cognome">
                    <br><br>
                    <label for="email">E-mail</label><br>
                    <input type="email" name="email" placeholder="esempio@dominio.com">
                    <br><br>
                    <label for="selezione-richiesta">Richiesta principale</label><br>
                    <select name="selezione-motivo">
                        <option value=""></option>
                        <option value="richiesta-1">Richiesta 1</option>
                        <option value="richiesta-2">Richiesta 2</option>
                        <option value="richiesta-3">Richiesta 3</option>
                    </select>
                    <br><br>
                    <label for="messaggio">Messaggio</label><br>
                    <textarea name="messaggio" cols="30" rows="10" placeholder="Inserisci qui dettagli della richiesta"></textarea>
                    <br>
                    <input type="submit">
                </fieldset>
            </form>
        </section>
        <br>
        <section>
            <h4>Contatti</h4>
            <address>
            <ul>
                <li><p>Email: <?php echo $datiPaginaContatti[0]['contatti']['email']; ?></p></li>
                <li><p>Telefono: <?php echo $datiPaginaContatti[0]['contatti']['telefono']; ?></p></li>
            </ul>
            </address>

            <br>
            
            <nav>
            <h4>Link utili</h4>
            <ul>
                <?php foreach ($datiPaginaContatti[0]['link_utili'] as $link): ?>
                    <li><a class="linkUtili" href="<?php echo $link['url']; ?>"><?php echo $link['testo']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
            <a class="linkUtili" href="#"><h6>Privacy & Cookie policy</h6></a>
        </section>
    </main>

    <!-- include del file per salvataggio dei dati del modulo di contatto ------------------->
<?php
include ('salvaDati.php'); 
?>
</body>
</html>





























