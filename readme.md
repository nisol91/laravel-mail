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
