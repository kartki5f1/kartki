<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>Kartki dla bliskich</title>
    <link rel="stylesheet" href="kartki.css">
</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://kit.fontawesome.com/fe2dcd2710.js" crossorigin="anonymous"></script>
<body>
   

    <div class="naglowek">
            
        <div class="naglowek-zdjecie"> <a href="kartki.php"> <img src="logo.png" alt="logo"></a> </div> 
        <div class="naglowek-tekst"> <h1> Możliwości &rarr; [ Wpisz dane ] &harr; [ Wybierz wzór ] &rarr; [ Pobierz kartkę ] &rarr; [ Wyślij pobraną kartkę na email ]</h1> </div>

    </div>


    <div class="dane"> 
        <div>
           <p> Podaj Imię Nadawcy: <br> <textarea class="text" id="imie-nadawcy" rows="1" cols="40" maxlength="16"  required  placeholder="Wpisz dane..."></textarea></p>  
           <p> Podaj Adres Email Odbiorcy: <br> <textarea class="text" id="adres-odbiorcy" rows="1" cols="40" maxlength="40"  required  placeholder="Wpisz dane..."></textarea> </p>
           <p> Podaj Treść Kartki (Maks. 200 liter) <br> <textarea  class="text" id="tresc-kartki" rows="6" cols="40" maxlength="200"  required  placeholder="Wpisz dane..."></textarea></p>
        </div>
           

    </div>


    <div class="wzory-kartki" id="wzory-kartki">
            
        <?php
            $conn=mysqli_connect('127.0.0.1','root','','kartki');
            $q="SELECT * FROM wzory";
            $result=mysqli_query($conn,$q);

            while ($row = mysqli_fetch_array($result)){
            echo "<div class='kartka'  id='kartka".$row['ID']."' style='color:".$row['Kolor_napisu']."; background-color:".$row['Kolor_tla']."; border:2px solid black; font-size:".$row['Wielkosc']."px; font-family:".$row['Czcionka'].";'> <div id='kartka".$row['ID']."' class='kartki-imie-nadawcy'> Imie nadawcy </div> <div id='kartka".$row['ID']."' class='kartki-adres-odbiorcy'> Adres odbiorcy </div>  <div id='kartka".$row['ID']."' class='kartki-tresc-kartki'> Treść kartki, którą chcesz wysłać! </div> </div>";
            }

            mysqli_close($conn);
        ?>
       
    </div>
            
    <div class="wyniki">
            <div class="gotowa-kartka" id="gotowa-kartka">
                <div id="wyniki-imie-nadawcy" class="kartki-imie-nadawcy"> </div> 
                <div id="wyniki-adres-odbiorcy" class="kartki-adres-odbiorcy"> </div>
                <div id="wyniki-tresc-kartki" class="kartki-tresc-kartki"> </div>
                
            </div>
             <button class="wyniki-pobierz-kartke" id="wyniki-pobierz-kartke" type="button" onclick=pobierzKartke()> Pobierz kartkę <i class="fa-solid fa-download"></i></button> 
            <br>
             <div class="wysylanie-maila" id="wysylanie-maila" >
                <form action="mailtest.php" method="post" target="_blank" enctype="multipart/form-data">
                    Adres Email : <br> <input type="text" class="mail-adres-odbiorcy" id="mail-adres-odbiorcy" name="mail-adres-odbiorcy" value="" required maxlength="40"><br>
                    <label class="mail-tekst" id="mail-tekst"> | Prześlij wczesniej pobraną kartkę |</label> <br>
                    <input type="file" name="zdjecie-kartki" required  class="mail-wyslij-plik" id="mail-wyslij-plik" accept=".jpg,.jpeg,.png"> <br>
                    <button type="submit"  class="mail-submit" id="mail-submit"> Wyślij kartkę! <i class="fa-solid fa-envelope"></i> </button>
                    <i class="fa-solid fa-mailbox"></i>
                </form>
            </div>
    </div>
            
 
    <script>
  
        /* Wybór kartki */
        
        wybranaKartka=0;
        czyWybranaKartka="false";

        document.getElementById("wzory-kartki").addEventListener("click", (event) => {
           
            if (event.target.classList.contains("kartka") || event.target.closest("div div")   ){

                if (wybranaKartka) {document.getElementById(wybranaKartka).classList.remove("active"); }

                wybranaKartka=event.target.id;
                
                document.getElementById(wybranaKartka).classList.add("active");

                kolor = document.getElementById(wybranaKartka).style.color;
                kolorTla = document.getElementById(wybranaKartka).style.backgroundColor;
                wielkosc = document.getElementById(wybranaKartka).style.fontSize;
                czcionka = document.getElementById(wybranaKartka).style.fontFamily;
                border = document.getElementById(wybranaKartka).style.border;

                czyWybranaKartka = "true";

                wpiszDane();
                
            }
        });

       


     /* Funkcja wpisująca dane do wybranej kartki */
       
        function wpiszDane(){
            if (czyWybranaKartka == "true"){
            imieNadawcy = document.getElementById("imie-nadawcy").value;
            adresOdbiorcy = document.getElementById("adres-odbiorcy").value;
            trescKartki = document.getElementById("tresc-kartki").value;

                
                document.getElementById("gotowa-kartka").style.color = kolor;
                document.getElementById("gotowa-kartka").style.backgroundColor = kolorTla;
                document.getElementById("gotowa-kartka").style.fontSize = wielkosc;
                document.getElementById("gotowa-kartka").style.fontFamily = czcionka;
                document.getElementById("gotowa-kartka").style.border = border;
                
                document.getElementById("wyniki-imie-nadawcy").innerHTML = imieNadawcy;
                document.getElementById("wyniki-adres-odbiorcy").innerHTML = adresOdbiorcy;
                document.getElementById("wyniki-tresc-kartki").innerHTML = trescKartki;
                document.getElementById("wyniki-pobierz-kartke").style.display = "block";
            }
         }
        

        /* Pobieranie kartki */
        function pobierzKartke(){
            
            html2canvas(document.querySelector("#gotowa-kartka")).then(canvas => {
            zdjecie = canvas.toDataURL("image/jpg");
            const doPobrania = document.createElement("a");
            doPobrania.href = zdjecie;
            doPobrania.download = "kartka.jpg";
            doPobrania.click();
            document.getElementById("mail-adres-odbiorcy").value=adresOdbiorcy;
            document.getElementById("wyniki-pobierz-kartke").style.display = "none";
            document.getElementById("wysylanie-maila").style.display = "block";
            
        });
        }

       
        /* Dynamiczne wpisywanie danych do kartki */
        document.getElementById("imie-nadawcy").addEventListener("input", function() {
            if (czyWybranaKartka == "true") {
                imieNadawcy = this.value;
                document.getElementById("wyniki-imie-nadawcy").innerHTML = imieNadawcy;
             }
            

        });


        document.getElementById("adres-odbiorcy").addEventListener("input", function() {
            if (czyWybranaKartka == "true"){
                adresOdbiorcy = this.value;
                document.getElementById("wyniki-adres-odbiorcy").innerHTML = adresOdbiorcy;
            }

        });

        document.getElementById("tresc-kartki").addEventListener("input", function() {
            if (czyWybranaKartka == "true") {
                trescKartki = this.value;
                document.getElementById("wyniki-tresc-kartki").innerHTML = trescKartki;
            }

        });


        
        document.getElementById("mail-wyslij-plik").addEventListener("change", function() {
            document.getElementById("mail-tekst").innerHTML = "| Teraz możesz wysłać kartkę |"
            document.getElementById("mail-tekst").style.color = "#37cc37";
            
        });
        


    </script>

</body>
</html>