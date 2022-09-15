Per il corretto funzionamento del sito è necessaria una connessione ad internet in quanto il modello usato dall'IA viene scaricato da https://vladmandic.github.io/face-api/model/ .

La prima volta che viene aperto verrà chiesta l'autorizzazione ad usare la videocamera del pc ed la prima volta per aprire lo streaming video potrebbe volerci qualche secondo extra.

Build:

1. Dal promt dei comandi muoversi dentro la cartella I-MALL (con il comando "cd")
2. Lanciare il comando "docker compose up"
3. A questo punto il sito dovrebbe trovarsi su "localhost:8080", nel caso non sia stata modificata la porta di default.

Come discusso a ricevimento è stata apportata una modifica alla parte del codice che permette di eseguire il login (solo per poter effettuare il test), in modo tale che esegua un finto 
accesso una volta che vede un volto anche se non registrato (effettua il login forzando il riconoscimento di una delle nostre facce immettendo direttamente l'id dei nostri volti).
Tale modifica si trova alle linee 87-95 del file src/views/FrontEnd/HomePage.php. Mentre il codice originario è esattamente sopra alle linee 64/84 commentate.

Nel file src/index.php è possibile trovare le rotte del sito web.

Nel caso si volesse visionare il DB è necessario un'applicazione che possa aprirlo, DB Browser (SQLite), si trova in src/db/IMALLDB.db.