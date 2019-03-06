//Zmienne
let dataInput, jsonData, holder, imageId, image,
  addButton, saveButton, removeButton, cancelButton,
  pinIndex, pins, imageDiv, pin, toLoad,
  figure, offset, x, y, editing, pinText, toEditPin, newPinObj,
  editX, editY, editImageId, editPinId, editText;

//Przyciski itp.
addButton = $(".addButton");
saveButton = $(".saveButton");
removeButton = $(".removeButton");
cancelButton = $(".cancelButton");
textEditor = $(".textEditor");

jQuery.fn.exists = function(){return this.length>0;}

$(window).on('load', function(){
  printContent();
  editingButtons("start");
});

$("body").on("click", "button.addButton", function(aB) {

  image = $(".obrazy");

  editingButtons("addButton");

  // image.unbind('click');
  $(image).click(function(e){

    let imageId, newPin, newPinId, newPinText, newPinObj;

    //Data
    imageId = $(this).data("imageid");
    figure = $(this).closest('figure');
    jsonData = JSON.parse(getJsonData(imageId));

    //Położenie punktu
    offset = $(image).offset();
    x = (e.pageX - offset.left) / $(this).outerWidth() * 100;
    y = (e.pageY - offset.top) / $(this).outerHeight() * 100;

    //Nowy pin
    newPinId = Math.floor(Math.random() * 26) + Date.now().toString();
    newPinText = prompt("Podaj jakis tekst lub pozostaw puste by dodac standarwoy tekst.", "Tekst standardowy");

    //Jesli nie podano info do pinu
    if(newPinText === ""){
      newPinText = "Nie podano żadnego tekstu.";
    }

    //Nowy pin
    newPin = $(`<div class='pins pin-${newPinId}' data-pinid='${newPinId}' style='left: ${x}%; top: ${y}%;'>`);
    $(figure).append(newPin);

    //Dodanie pinu
    addNewPin(imageId, newPinId, x, y, newPinText);

    //Disabled off
    $(addButton).removeClass("disabled").prop("disabled", false);

    //Czyszczenie pola
    textEditor.val('');

    //Stop akcja
    e.stopPropagation();
    aB.stopPropagation();
    image.off('click');

    editingButtons("start");
  });

});

$("body").on("click", "div.pins", function(eB) {

  //Zdjecie
  image = $(".obrazy");

  //Pokazanie przyciskow edycji i blokada przycisku dodawania
  editingButtons("pinEdit");

  //Sprawdzenie czy je edycja czy je nie ma
  if(editing === true) return;

  //Start edycji
  editing = true;

  //Holder
  holder = $(this).closest(".holders");
  holder.find("div.pins.pin-editing").removeClass("pin-editing");
  holderId = holder.data("imageid");
  editImageId = holderId;

  //Pin, dodanie do niego klasy edytowania, id
  pin = $(this);
  $(pin).addClass("pin-editing");
  pinId = pin.data("pinid");
  editPinId = pinId;

  //JSON
  jsonData = JSON.parse(getJsonData($(holder).data("imageid")));
  pins = jsonData["pinezki"];

  //Pobranie indeksu pinu
  for (var i in pins) {
    if (pins[i]["id"] == pinId) {
      pinIndex = i;
      break;
    }
  }

  textEditor.val(pins[pinIndex]["tekst"]);

  //Klik na zdjecie by przesunac pin
  image.unbind('click');
  $(image).click(function(iC){

    if(editing === false) return;

    offset = $(this).offset();
    x = (iC.pageX - offset.left) / $(this).outerWidth() * 100; editX = x;
    y = (iC.pageY - offset.top) / $(this).outerHeight() * 100; editY = y;

    $('.pin-editing').css("left", x + "%").css("top", y + "%");

    $('.pins').off("click");

    eB.stopPropagation();
    iC.stopPropagation();

  });

  //Anulowanie, cofniecie akcji
  cancelButton.unbind('click');
  $(cancelButton).click(function(cB){

    //Przywraca pin do miejsca poczatkowego, usuwa klase edycji
    pin.css("left", `${pins[pinIndex]["x"]}%`).css("top", `${pins[pinIndex]["y"]}%`);
    pin.removeClass("pin-editing");

    //Edytowanie wylaczone
    editing = false;

    //Usuwa tekst z textarea
    textEditor.val("");

    //Przyciski sie chowaja
    editingButtons("start");

    //Stop akcji itp.
    $(".pins").off("click");
    cancelButton.off("click");
    cB.stopPropagation();

  });

  //Zapisuje polozenie, tekst pinu
  saveButton.unbind('click');
  $(saveButton).click(function(sB){

    //Jesli pin nie jest edytowany to siema
    if(editing === false) return;

    textEdit = textEditor.val();

    //Jesli pin nie zostal poruszony to
    if(editX === undefined) editX = "dc";
    if(editY === undefined) editY = "dc";
    if(textEdit === null || editText === "") editText = "dc";

    // console.log(editImageId + ':' + editPinId + ':' + editX + ':' + editY + ':' + textEdit);
    editPin(editImageId, editPinId, editX, editY , textEdit);

    //Znikanie buttonow + usuwanie klasy
    pin.removeClass('pin-editing');
    addButton.removeClass('disabled').prop("disabled", false);

    //Przyciski sie chowaja
    editingButtons("start");

    saveButton.off("click");
    $('.pins').off("click");

    eB.stopPropagation();
    sB.stopPropagation();
    editing = false;

    //Usuwa tekst z textarea
    textEditor.val("");
  });

  //Usuwa pin
  removeButton.unbind('click');
  $(removeButton).click(function(rB){

    if(editing === false) return;

    imageId = $(".obrazy").data("imageid");
    pin = getHolder(imageId).find("div.pin-editing");

    removePin(imageId, pin.data("pinid"));

    //Usuwa tekst z textarea
    textEditor.val("");

    //Znikanie buttonow
    editingButtons("start");

    removeButton.off("click");
    $('.pins').off("click");

    eB.stopPropagation();
    rB.stopPropagation();

    editing = false;

  });

  //Stop akcji i propagandzie
  $('.pins').off('click');
  eB.stopPropagation();

});

function printContent(){

  //Pobiera obraz z danymi
  $.ajax({

    dataType: "json",
    url: 'obrazy.json',
    success: function(data){

      //Czy jest pusto
      if(data.length == 0){
        console.log('Pusto');
        console.log(data);
        return;
      }

      //Dla kazdego obrazu...
      $.each(data, function(index, item){

        //Div z zdjeciem i inputem z info
        imageDiv = $(`<div class='holders holder-${item["id"]}' data-imageid='${item["id"]}'>`);
        toLoad = `
          <figure>
          <img class='obrazy obraz-${item["id"]}' data-imageid='${item["id"]}' src='${item["sciezka"]}' draggable='false'>
          </figure>
          <input class='form-control' type='text' disabled='true' value='${JSON.stringify(item)}'>
          `;

        //Wyswietlnie ^^
        $("body").prepend(imageDiv);
        $(imageDiv).prepend(toLoad);

        //Szukanie figure
        figure = $(imageDiv).find('figure');

        //Dla kazdej pinezki w tablicy
        $.each(item["pinezki"], function(index, item){

          //Div z pinezka + wyswietlenie ich
          pin = $(`<div class='pins pin-${item["id"]}' data-pinid='${item["id"]}' style='left: ${item["x"]}%; top: ${item["y"]}%'></div>`);
          $(figure).append(pin);

        });
      });
    }
  });
}

function getJsonData(imageId){

  //Div z klasa, input z danymi
  holder = $('.holder-' + imageId);
  dataInput = $(holder).find('input');

  //JSON
  jsonData = $(dataInput).val();

  //Spawdza opcje
  switch (jsonData) {
    case null:
      return "Nie ma takiego obrazu";
      break;
    case undefined:
      return "Nie ma takiego obrazu";
      break;
    default:
      return jsonData;
      break;
  }

}

function getHolder(imageId){

  if(!(imageId)){
    return "Proszę podac argument!";
  }

  if($(".holder-" + imageId).exists()){
    return $(".holder-" + imageId);
  }else{
    return "Nie ma takiego inputa";
  }

}

function getInput(imageId){

  if(!(imageId)){
    return "Proszę podac argument!";
  }

  if($(".holder-" + imageId).find('input').exists()){
    return getHolder(imageId).find('input');
  }else{
    return "Nie ma takiego inputa!";
  }

}

function getPinById(imageId, pinId){

  //Pobiera pin przy pomocy id
  return $(getHolder(imageId).find('.pin-' + pinId));
}

function addNewPin(imageId, newPinId, newPinX, newPinY, newPinText){

  //Objekt nowego pinu
  newPinObj = {
    "id": newPinId,
    "x": newPinX,
    "y": newPinY,
    "tekst": newPinText
  };

  //Input z danymi, Json, zapisanie danych
  dataInput = getInput(imageId);
  jsonData = JSON.parse(getJsonData(imageId));
  jsonData["pinezki"].push(newPinObj);
  $(dataInput).val(JSON.stringify(jsonData));

}

function editPin(imageId, pinId, pinX, pinY, pinText){

  //Dane
  dataInput = getInput(imageId);

  //Jesli pusty to znaczy ze nie
  if(dataInput.val() == null){
    return "Nie ma takiego inputa";
  }

  //JSON
  dataJson = JSON.parse(dataInput.val());
  pins = dataJson["pinezki"];

  //Sprawdza ktory pin zgadza sie z id i edytuje go
  for (var i in pins) {
    if (pins[i]["id"] == pinId) {
      if(pinX !== "dc") pins[i]["x"] = pinX;
      if(pinY !== "dc") pins[i]["y"] = pinY;
      pins[i]["tekst"] = pinText;
      pinIndex = i;
      break;
    }
  }

  //Zapis danych
  pins = JSON.stringify(pins);
  dataInput.val(JSON.stringify(dataJson));
}

function removePin(imageId, pinId){

  //Zaznaczenie pinu
  pin = getPinById(imageId, pinId);

  //JSON pinu
  dataInput = getInput(imageId);
  jsonData = JSON.parse(dataInput.val());
  pins = jsonData["pinezki"];

  //Usuniecie pinu po id
  for (var i in pins) {
    if (pins[i]["id"] == pinId) {
      pins.splice(i, 1);
    }
  }

  //Zapisanie Jsonu do inputa
  pins = JSON.stringify(pins);
  jsonData = JSON.stringify(jsonData);
  dataInput.val(jsonData);

  //Usuniecie pinu
  pin.remove();
}

function editingButtons(option){

  switch (option) {

    case "start":
      addButton.removeClass("disabled").prop("disabled", false);
      saveButton.addClass("disabled").prop("disabled", true);
      removeButton.addClass("disabled").prop("disabled", true);
      cancelButton.addClass("disabled").prop("disabled", true);
      textEditor.addClass("disabled").prop("disabled", true);
      break;
    case "addButton":
      addButton.addClass("disabled").prop("disabled", true);
      saveButton.addClass("disabled").prop("disabled", true);
      removeButton.addClass("disabled").prop("disabled", true);
      cancelButton.addClass("disabled").prop("disabled", true);
      textEditor.addClass("disabled").prop("disabled", true);
      break;
    case "pinEdit":
      addButton.addClass("disabled").prop("disabled", true);
      saveButton.removeClass("disabled").prop("disabled", false);
      removeButton.removeClass("disabled").prop("disabled", false);
      cancelButton.removeClass("disabled").prop("disabled", false);
      textEditor.removeClass("disabled").prop("disabled", false);
      break;
    default:
      break;
  }

}
