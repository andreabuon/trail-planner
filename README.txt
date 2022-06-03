Progetto: Sito per catalogare percorsi in montagna ed organizzare escursioni
Studente: Andrea Buonaurio 1894266

Linguaggi utilizzati: HTML, CSS, PHP, Javascript
Database utilizzato: PostgreSQL
altro: Bootstrap

Organizzazione file:
Nella root del progetto sono presenti i file php che generano le pagine principali.
La cartella 'api' contiene gli script PHP per interagire con il sito e il database (es. login/registrazione, creare eventi/commenti, etc).
I file css, javascript e html sono organizzati in cartelle secondo la loro estensione.
Nella cartella 'uploads' vengono salvate le tracce dei percorsi caricati dagli utenti.

Nella cartella 'assets' sono presenti:
- comandi SQL per la creazione delle tabelle del database
- esempi di tracce GPS
- immagini: sfondo homepage, immagine sentiero default, favicon del sito

Configurazione:
- Le credenziali del database PostgreSQL vengono caricate da un file esterno alla cartella del progetto.
- Nel file js/map.js è necessario inserire un codice token Mapbox per poter interagire con le API Mapbox

Descrizione progetto:
TrailPlanner è un sito per catalogare percorsi in montagna ed organizzare escursioni.

Nella pagina "Esplora" è presente una mappa 3D Mapbox e una sidebar con tutti i percorsi caricati nel database.
La mappa è navigabile utilizzando il mouse ed è possibile regolare l'altezza della vista trascinando il mouse e mantenendo premuto il tasto destro.
Per ogni sentiero viene visualizzato un piccolo riquadro con varie informazioni e bottoni.
Cliccando il pulsante 'Visualizza' (presente per i sentieri che hanno una traccia GPS associata) è possibile visualizzare il percorso nella mappa 3D Mapbox.
Il bottone 'Scarica' permette invece di scaricare la traccia GPS sul proprio computer.
Il tasto Info apre la scheda tecnica del sentiero, dove sono riportate le principali caratteristiche del sentiero e una foto. 
Nella scheda tecnica di ogni sentiero gli utenti registrati possono lasciare commenti.
Nella parte superiore della sidebar sono presenti vari input con cui è possibile filtrare i sentieri mostrati.
Questa pagina viene gestita tramite Javascript.
I percorsi e le tracce GPS vengono scaricati dal server tramite richieste AJAX.
Dopo la prima richiesta i dati dei percorsi vengono salvati nel localStorage e vengono aggiornati ogni minuto.

Nella pagina 'Partecipa' vengono elencate tutte le escursioni organizzate dagli utenti del sito.
Gli utenti registrati possono prenotarsi ad un'escursione tramite il relativo pulsante 'Prenota'.
Gli utenti possono visualizzare la scheda tecnica del percorso e/o contattare il referente dell'escursione tramite Whatsapp tramite il bottone 'Contatta'.

L'organizzatore di un'escursione può accedere alla relativa pagina 'Report'.
Questa pagina contiene tutte le informazioni dell'escursione e una tabella dove vengono elencati tutti gli utenti prenotati.
Il pulsante 'Stampa' permette di stampare la scheda dell'escursione nascondendo alcuni elementi della pagina (per esempio la navbar) (gestito tramite media query CSS)

Le pagine 'Registrati', 'Accedi', 'Carica Percorso' e 'Organizza Escursione' contengono delle form che consentono di aggiungere dati al database.
Le form vengono controllate tramite espressioni regolari (sia lato client che lato server) e tramite funzioni Javascript.
Tramite la form 'Carica Percorso' gli utenti possono anche caricare una traccia GPS (un file .geojson) da associare al percorso creato.

La registrazione degli utenti e il loro accesso viene gestito tramite le variabili di sessione di PHP.
Le password degli utenti vengono salvate nel database dopo essere state sottoposte ad un algoritmo di salting e di hashing.

Tutte le pagine del sito sono responsive.


