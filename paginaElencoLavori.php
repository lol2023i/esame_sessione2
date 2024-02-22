<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vetrina progetti</title>
    <link rel="stylesheet" href="/css/style.min.css">
</head>
<body>

<!-- caricamento e decodifica in array del file json per la pagina dedicata all'elenco lavori --------------------->
    <?php
        $datiJsonPaginaElencoLavori = file_get_contents ("datiPaginaElencoLavori.json");
        $datiPaginaElencoLavori = json_decode ($datiJsonPaginaElencoLavori,true);
    ?>

<!-- header: include del menu di navigazione --------------------------------------->
    <?php include ('menuNav.php'); ?>
    <br><br><br><br><br><br><br><br>

<!-- main: descrizioni fasi dei progetti + call to action ----------------------------------------------------------------------->
    <main id="centraContenuto" >
        <section>
            <h2 class="sottoTitolo" >Uno sguardo approfondito ai mei progetti</h2>
            <p class="descrizione" >
                "Una dettagliata e accurata selezione dei progetti professionali che ho avuto 
                il privilegio di affrontare e portare a termine nel corso della mia carriera. 
                Questo elenco rappresenta un'esaustiva panoramica delle sfide affrontate e dei
                successi ottenuti in vari contesti lavorativi. Dai progetti più impegnativi a 
                quelli caratterizzati da una complessità tecnica, ogni esperienza ha contribuito
                in modo significativo alla mia crescita professionale. Ogni progetto è un capitolo
                prezioso della mia storia lavorativa, evidenziando le competenze e le capacità
                sviluppate nel corso del tempo. Attraverso questa selezione, intendo condividere 
                non solo la diversità delle iniziative affrontate, ma anche il mio impegno 
                costante nel raggiungere risultati di eccellenza e superare le aspettative professionali.
            </p>
        </section>
        <br><br>

        <div style="display: flex; justify-content: center;">
        
        <?php foreach ($datiPaginaElencoLavori[0]['progetti'] as $progetto): ?>
            <figure style="max-width: 100%;">
                <img src="<?php echo $progetto['immagine']; ?>" alt="foto del <?php echo $progetto['nome']; ?>" title="<?php echo $progetto['nome']; ?>" style="max-width: 100%;" width="600px">
                <figcaption><strong><?php echo $progetto['nome']; ?></strong></figcaption>
            </figure>
            <br>
        <?php endforeach; ?>

        </div>

        <br>

        <section>
            <h3 class="titoli3" ><?php echo $datiPaginaElencoLavori[0]['fasi_creazione']['titolo']; ?></h3>
            <p> 
                <ul>
                    <?php foreach ($datiPaginaElencoLavori[0]['fasi_creazione']['fasi'] as $fase): ?>
                        <li><?php echo $fase; ?></li>
                    <?php endforeach; ?>
                </ul>
            </p> 
        </section>
        
        <br><br><br>
        <section>

            <h3 class="titoli3"><?php echo $datiPaginaElencoLavori[0]['call_to_action']; ?></h3><a class="linkImportante" href="<?php echo $datiPaginaElencoLavori[0]['link_cta']['url']; ?>"><?php echo $datiPaginaElencoLavori[0]['link_cta']['testo']; ?></a>

        
        </section>
        <br><br><br>
        <h2 class="sottoTitolo">Sei incuriosito e vuoi avere maggiori informazioni? mandami una richiesta tramite il modulo di seguito</h2>
    </main>

<!-- footer: form + contatti + link utili + cookie policy ------------------------------------------------------------------------------------>

    <footer>
        <section>
            <form class="form-stile" action="salvaDati.php" method="POST">
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
                    <li><p>Email: <?php echo $datiPaginaElencoLavori[0]['contatti']['email']; ?></p></li>
                    <li><p>Telefono: <?php echo $datiPaginaElencoLavori[0]['contatti']['telefono']; ?></p></li>
                </ul>
            </address>

            <br>
            
            <nav>
                <h4>Link utili</h4>
                <ul>
                    <?php foreach ($datiPaginaElencoLavori[0]['link_utili'] as $link): ?>
                        <li><a class="linkUtili" href="<?php echo $link['url']; ?>"><?php echo $link['testo']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <a class="linkUtili" href="#"><h6>Privacy & Cookie policy</h6></a>
        </section>
    </footer>

    <!-- include del file per salvataggio dei dati del modulo di contatto ------------------->
<?php
include ('salvaDati.php'); 
?>

</body>
</html>