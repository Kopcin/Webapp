function sprawdzPole(pole_id,obiektRegex) {
	//Funkcja sprawdza czy wartość wprowadzona do pola tekstowego
	//pasuje do wzorca zdefiniowanego za pomocą wyrażenia regularnego
	//Parametry funkcji:
	//pole_id - id sprawdzanego pola tekstowego
	//obiektRegex - wyrażenie regularne
	//---------------------------------
	var obiektPole = document.getElementById(pole_id);
	if(!obiektRegex.test(obiektPole.value)) return (false);
	else return (true);
}

function sprawdz_radio(nazwa_radio){
	//Funkcja sprawdza czy wybrano przycisk radio
	//z grupy przycisków o nazwie nazwa_radio
	//---------------------------------------
	var obiekt=document.getElementsByName(nazwa_radio);
	for (i=0;i<obiekt.length;i++){ 	
		wybrany=obiekt[i].checked;
		if (wybrany) return true; 
	}
	return false;
}

function sprawdz_box(box_id){
	//Funkcja sprawdza czy przycisk typu checkbox
	//o identyfikatorze box_id jest zaznaczony
	//----------------------------------------
	var obiekt=document.getElementById(box_id);
	if (obiekt.checked) return true;
	else return false;
}

function sprawdz(){
	//Funkcja realizujaca sprawdzanie całego fomularza
	//wykorzystując funkcje pomocnicze
	//--------------------------------
	var ok=true; //zmienna informująca o poprawnym wypełnieniu formularza
	//Definicje odpowiednich wyrażeń regularnych dla sprawdzenia
	//poprawności danych wprowadzonych do pól tekstowych
	obiektNazw = /^[a-zA-Z]{2,20}$/; //wyrażenie regularne dla nazwiska
	obiektEmail =
		/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+/;
	obiektWiek=/^[1-9][0-9]{1,2}$/;
	
	//Sprawdzanie kolejnych pól formularza.
	//w przypadku błędu - pojawia się odpowiedni komunikat
        if (!sprawdzPole("name",obiektNazw)){
		ok=false;
		document.getElementById("imie_error").innerHTML=
		"Wpisz poprawnie Imie!";
	}
	else document.getElementById("imie_error").innerHTML="";
        
	if (!sprawdzPole("lastname",obiektNazw)){
		ok=false;
		document.getElementById("nazw_error").innerHTML=
		"Wpisz poprawnie nazwisko!";
	}
	else document.getElementById("nazw_error").innerHTML="";
	
	if (!sprawdzPole("age",obiektWiek)){
		ok=false;
		document.getElementById("wiek_error").innerHTML=
		"Wpisz poprawnie wiek!";
	}
	else document.getElementById("wiek_error").innerHTML="";
	
	if (!sprawdzPole("email",obiektEmail)){
		ok=false;
		document.getElementById("email_error").innerHTML=
		"Wpisz poprawnie email!";
	}
	else document.getElementById("email_error").innerHTML="";
	
	if ((!sprawdz_box("bil")) && (!sprawdz_box("zak")) && (!sprawdz_box("wyz"))){
		ok=false;
		document.getElementById("produkt_error").innerHTML=
		"Musisz wybrać produkt!";
	}
	else document.getElementById("produkt_error").innerHTML="";
	
	
	
	if (ok) pokazDane();
	
	return ok;
}

function sprawdz_min(){
	//Funkcja realizujaca sprawdzanie całego fomularza
	//wykorzystując funkcje pomocnicze
	//--------------------------------
	var ok=true; //zmienna informująca o poprawnym wypełnieniu formularza
	//Definicje odpowiednich wyrażeń regularnych dla sprawdzenia
	//poprawności danych wprowadzonych do pól tekstowych
	obiektNazw = /^[a-zA-Z]{2,20}$/; //wyrażenie regularne dla nazwiska
	obiektEmail =
		/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+/;
	obiektWiek=/^[1-9][0-9]{1,2}$/;
	
	//Sprawdzanie kolejnych pól formularza.
	//w przypadku błędu - pojawia się odpowiedni komunikat
        if (!sprawdzPole("name",obiektNazw)){
		ok=false;
		document.getElementById("imie_error").innerHTML=
		"Wpisz poprawnie Imie!";
	}
	else document.getElementById("imie_error").innerHTML="";
       
	if (!sprawdzPole("email",obiektEmail)){
		ok=false;
		document.getElementById("email_error").innerHTML=
		"Wpisz poprawnie email!";
	}
	else document.getElementById("email_error").innerHTML="";
	
	return ok;
}

function pokazDane(){
	//Funkcja zbiera dane wpisane w pola formularza i wyświetla okienko
	//typu confirm do zatwierdzenia przez użytkownika:
	var dane="Dane z wypełnionego przez Ciebie formularza:\n";
	dane+="Nazwisko: "+document.getElementById('lastname').value+"\n";
	dane+="Wiek: "+document.getElementById('age').value+"\n";
	dane+="Kraj: "+document.getElementById('country').value+"\n";
	dane+="Email: "+document.getElementById('email').value+"\n";

	dane+="Wybrane produkty: ";
	if (sprawdz_box("bil")) dane+=document.getElementById('bil').id+" ";
	if (sprawdz_box("zak")) dane+=document.getElementById('zak').id+" ";
	if (sprawdz_box("wyz")) dane+=document.getElementById('wyz').id;
	dane+="\n";
	
	dane+="Sposób zapłaty: "+ktory_radio("zaplata")+"\n";
	
	if (window.confirm(dane)) return true;
	else return false;
}

function ktory_radio(nazwa_radio){
	//Funkcja sprawdza który przycisk radio
	//z grupy przycisków o nazwie nazwa_radio jest zaznaczony
	//---------------------------------------
	var obiekt=document.getElementsByName(nazwa_radio);
	for (i=0;i<obiekt.length;i++){
		if (obiekt[i].checked) wybrany = obiekt[i].value;
		
	}
	return wybrany;
}

function store(){
    var inputName=document.getElementById("name");
    localStorage.setItem("name", inputName.value);
    var inputLastname=document.getElementById("lastname");
    localStorage.setItem("lastname", inputLastname.value);
    var inputWiek=document.getElementById("age");
    localStorage.setItem("wiek", inputWiek.value);
    var inputEmail=document.getElementById("email");
    localStorage.setItem("email", inputEmail.value);
    var inputTel=document.getElementById("phone");
    localStorage.setItem("telefon", inputTel.value);
    if (sprawdz_box("bil")){ 
        var inputZam=document.getElementById("bil");
        localStorage.setItem("Zamowienie_1", inputZam.value);
    }
    if (sprawdz_box("zak")){ 
        var inputZam=document.getElementById("zak");
        localStorage.setItem("Zamowienie_2", inputZam.value);
    }
    if (sprawdz_box("wyz")){ 
        var inputZam=document.getElementById("wyz");
        localStorage.setItem("Zamowienie_3", inputZam.value);
    }  
    var inputIle=document.getElementById("count");
    localStorage.setItem("Ile_osob", inputIle.value);
    var inputCountry=document.getElementById("country");
    localStorage.setItem("Kraj", inputCountry.value);
    var inputPay=ktory_radio("zaplata");
    localStorage.setItem("Zapłata", inputPay);
}

function getData() {
    var dane = "";
    var name = localStorage.getItem('name');
    var lastname = localStorage.getItem('lastname');
    var age = localStorage.getItem('wiek');
    var email = localStorage.getItem('email');
    var phone = localStorage.getItem('telefon');
    var order_1 = localStorage.getItem('Zamowienie_1');
    var order_2 = localStorage.getItem('Zamowienie_2');
    var order_3 = localStorage.getItem('Zamowienie_3');
    var count = localStorage.getItem('Ile_osob');
    var country = localStorage.getItem('Kraj');
    var payment = localStorage.getItem('Zapłata');

    dane+='<h2>Dane</h2><div class="row gy-3"><table>'+
        '<tr><td>Imie:</td><td>'+name+'</td></tr>'+
        '<tr><td>Nazwisko:</td><td>'+lastname+'</td></tr>'+
        '<tr><td>Wiek:</td><td>'+age+'</td></tr>'+
        '<tr><td>Adres e-mail:</td><td>'+email+'</td></tr>'+
        '<tr><td>Telefon:</td><td>'+phone+'</td></tr>'+
        '<tr><td>Zamówienie:</td><td>'+order_1+'</td></tr>'+
        '<tr><td>Zamówienie:</td><td>'+order_2+'</td></tr>'+
        '<tr><td>Zamówienie:</td><td>'+order_3+'</td></tr>'+
        '<tr><td>Dla ilu osób:</td><td>'+count+'</td></tr>'+
        '<tr><td>Cel:</td><td>'+country+'</td></tr>'+
        '<tr><td>Zapłata:</td><td>'+payment+'</td></tr>'+
        '</table></div>';
    document.getElementById('dane').innerHTML = dane; 
}

function deleteData(){
    localStorage.clear();
}