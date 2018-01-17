# mportal

Web aplikacija za objavljivanje i uređivanje članaka, login/registracija korisnika, komentiranje i lajkanje članaka. 
Admin sučelje: 
              -objavljivanje novih i uređivanje postojećih članaka 
              -dodavanje i administracija kategorija članaka 
              -dodavanje i administracija rola editora 
              -administracija korisnika

#UPUTE
1. Važno je da imate instaliran xampp, wampp ili neki drugi lokalni server sa MySQL-om
2. U browser upišite localhost/phpmyadmin
3. U phpmyadminu kliknite na new, tamo gdje piše Database name upišite "mportal",
   a pod Collation odaberite "utf8_general_ci"
4. Nakon što se stvori baza podataka, kliknite na nju i zatim kliknite na SQL karticu
5. Kopirajte sve iz "mportal.sql" i zalijepite unutar polja za pisanje SQL-a u phpmyadminu
6. Kliknite Go i baza ce biti stvorena
7. Nakon toga u folderu xammpa pronadite folder "htdocs", te u njega kopirajte cijeli folder "mportal" 
8. Otvorite browser, u adresnu traku upišite "localhost/mportal" i aplikacija ce Vam biti dostupna
