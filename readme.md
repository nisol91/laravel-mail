# Operazioni con le email e altri utili real world examples.



--------


**errori** / **successo**  inserimento dati, da mettere nel blade:

 ```language
 @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
<!-- oppure -->
        @if (!empty($message))
        <div class="alert alert-success">
            <ul>
                <li>{{ $message }}</li>
            </ul>
        </div>
        @endif
 ```



 -------

 **log**

 funzionano come dei console log alla fine. dico io quello che va stampato:

 `\Log::info('message' . $dati);`

 Per non importare una classe `use Log....` posso usare il backslash `\`.

 -------

 **funzioni e costruttore** :

 come si sa, le variabili definite in una funzione non possono essere accessibili alle altre, quindi mi definisco una variabile di ambiente, che sia `public`, e poi la vado a prendere dentro ai metodi usando `$this->`.

 -------

 **markdown**

 se voglio utilizzare un markdown predefinito di laravel, come layout della mia mail, devo utilizzare il componente 'mail::message' nel blade e nel controller della mail non devo ritornare `$this->view` ma `$this->markdown`.


 -------

 **dispatch**, chiamati *job* in laravel.
 Serve per ritardare un comando destinato all utente, eseguendolo piu avanti.
 (a differenza delle schedule, che eseguono comandi nell applicazione, non destinati all utente)
 In questo caso si puo ritardare l invio di una mail. Cosi si velocizzano le operazioni del mio sito.

 Bisogna innanzitutto cambiare **drivers**. Nell .env, la connessione e' sync. Devo modificarla in **database**!!!!

A questo punto uso il comando `php artisan make:job JOBNAME`

Dentro al mio controller job vado a dirgli di mandare le mail `Mail::` (in pratica sposto i comandi mail dal controller admission al controller del job) mentre nel mio controller admission vado a dare il comando `NOMEJOB::dispatch($DATI)` che gli dice di eseguire il job dopo tot tempo.

vado poi a far partire le code con un demone: `php artisan queue:work`

In pratica i dispatch mi mettono in cash in attesa quel processo, caricano tutto e poi alla fine eseguono quel processo, di modo da avere una migliore esperienza utente.

Nella tabella jobs del db, compaiono i processi job che non si sono conclusi.


-------

**comandi artisan personalizzati**

`php artisan make:command`

esempio: creare una nuova view:

`system('touch percorso/nome')` 
con system, php mi permette di scrivere i comandi del terminale dentro php.


---------


**task schedule**

innanzitutto introduciamo il crontab, a cui si accede da terminale con `crontab -e`.
 gli si dice di stare in ascolto su laravel.

 `* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1`
 con il comando `pwd` guardo il percorso assoluto del mio progetto.


poi vado a dire nel command/kernel ogni quanto eseguire il mio comando.
