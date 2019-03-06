<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <title>Dokumentacja - wow</title>
    <style media="screen">
      body{
        font-family: 'Inconsolata', monospace;
        overflow-y: scroll;
      }

      .dzialanie, .uzycie, .dane{
        margin-top: 10px;
      }

      .h4{
        margin-bottom: 10px;
      }

      ul{
        list-style-type: none;
      }

      var{
        font-weight: bold;
      }


      .output{
        font-size: 0.8em;
      }
    </style>
  </head>
  <body>
    <div class="alert alert-danger" role="alert">
      Uwaga! Uwaga! Uwaga! Projekt porzucony!!!
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    printContent()
                  </button>
                </h2>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                  <span class="h4">Działanie</span>
                  <p class="dzialanie">
                    Funkcja pobiera plik <var>JSON</var> poprzez zapytanie <var>Ajax</var>, które otrzymuje
                    dane takie jak: <var>nazwa obrazu</var>, <var>ścieżka pliku</var> itd.
                    Następnie wyświetla obraz wraz z pinezkami, które można <var>dodawać</var>, <var>edytować</var> i <var>usuwać</var>.
                  </p>

                  <span class="h4">Dane</span>
                  <p class="dane">
                    <span>zmienne: <var>brak</var></span><br>
                    <span>return: <var>brak</var></span>
                  </p>


                  <span class="h4">Przykład</span>
                  <p class="uzycie">
                    <code class="language-js">printContent()</code>
                  </p>

                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    getJsonData(imageId)
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">

                  <span class="h4">Działanie</span>
                  <p class="dzialanie">
                    Funkcja pobiera atrybut <var>value</var> z inputa, w którym znajduje się <var>plain-text</var> obiektu
                    obrazu.
                  </p>

                  <span class="h4">Dane</span>
                  <p class="dane" style="margin-bottom: 0px;">
                    <span>zmienne: <var>imageId</var>: (int)</span><br>
                    <span>return: <ul>
                        <li><var>null</var>: "Nie ma takiego obrazu" (string)</li>
                        <li><var>undefined</var>: "Nie ma takiego obrazu" (string)</li>
                        <li><var>default</var>: plain-text (string)</li>
                      </ul>
                    </span>
                  </p>


                  <span class="h4">Przykład</span>
                  <p class="uzycie">
                    <code class="language-js">getJsonData(<var>1</var>)</code>
                  </p>

                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    getHolder(imageId)
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">

                  <span class="h4">Działanie</span>
                  <p class="dzialanie">
                    Funkcja pobiera <var>div</var>, w którym przechowywany jest obraz czy input.
                  </p>

                  <span class="h4">Dane</span>
                  <p class="dane">
                    <span>zmienne: <var>imageId</var>: (int)</span><br>
                    <span>return: <ul>
                        <li><var>brak argumentu</var>:  "Nie podano argumentu!" (string)</li>
                        <li><var>element nie istnieje</var>:  "Nie ma takiego holderu!" (string)</li>
                        <li><var>div</var>:  (element)</li>
                      </ul>
                    </span>
                  </p>

                  <span class="h4">Przykład</span>
                  <p class="uzycie">
                    <code class="language-js">getHolder(<var>1</var>)</code>
                  </p>

                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    getInput(imageId)
                  </button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">

                  <span class="h4">Działanie</span>
                  <p class="dzialanie">
                    Funkcja pobiera <var>inputa</var>, w którym w atrybucie <var>value</var> przechowywany jest
                    obiekt w postaci <var>plain-textu</var>.
                  </p>

                  <span class="h4">Dane</span>
                  <p class="dane">

                    <span>zmienne: <var>imageId</var>: (int)</span><br>
                    <span>return: <ul>
                        <li><var>brak argumentu</var>:  "Nie podano argumentu!" (string)</li>
                        <li><var>element nie istnieje</var>:  "Nie ma takiego inputa!" (string)</li>
                        <li><var>div</var>:  (element)</li>
                      </ul>
                    </span>
                  </p>

                  <span class="h4">Przykład</span>
                  <p class="uzycie">
                    <code class="language-js">getInput(<var>1</var>)</code>
                  </p>

                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingFive">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    getPinById(imageId, pinId)
                  </button>
                </h2>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">


                  <span class="h4">Działanie</span>
                  <p class="dzialanie">
                    Funkcja zwraca <var>div</var> z <var>pinezką</var> o podanym <var>id</var>.
                  </p>

                  <span class="h4">Dane</span>
                  <p class="dane">
                    <span>zmienne: <ul>
                        <li><var>imageId</var>: (int)</li>
                        <li><var>pinId</var>: (string)</li>
                      </ul>
                    </span><br>
                    <span>return: <ul>
                        <li><var>brak argumentu</var>:  "Nie podano argumentu!" (string)</li>
                        <li><var>element nie istnieje</var>:  "Nie ma takiego inputa!" (string)</li>
                        <li><var>div</var>:  (element)</li>
                      </ul>
                    </span>
                  </p>

                  <span class="h4">Przykład</span>
                  <p class="uzycie">
                    <code class="language-js">getInput(<var>1</var>)</code>
                  </p>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingSix">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    addNewPin(imageId, newPinId, newPinX, newPinY, newPinText)
                  </button>
                </h2>
              </div>
              <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingSeven">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    editPin(imageId, pinId, pinX, pinY, pinText)
                  </button>
                </h2>
              </div>
              <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingEight">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                    removePin(imageId, pinId)
                  </button>
                </h2>
              </div>
              <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingNine">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                    editingButtons(option)
                  </button>
                </h2>
              </div>
              <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
    <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
  </body>
</html>
