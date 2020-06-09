# UF1AP1
AP. Creació d’una aplicació d’administració d’incidències (Ticketing) PHP & MySQL

1. connect_db.php -> Canviar usuari i password mysql 
2. importar base de dades ticketing.sql a phpmyadmin i afegir privilegis
3. Donar permisos a la carpeta chmod -R 777 (per aquest cas) si no fer-ho directament al historic

(Les credencials es guarden en MD5 en la base de dades)
Usuari admin:
admin@gmail.com
123456 

oelkabir@gmail.com
123456

Estudiant:
També hi ha usuaris de mostra que he creat anteriorment amb el rol estudiant el password també és 

student@gmail.com
123456 

Profes:
teacher@gmail.com
123456


El projecte ha d’implementar els següents requeriments.

1. Una pantalla inicial (index.php) on es validi l’usuari i contrasenya d’accés (haurà
d’estar emmagatzemat a la base de dades). En cas que no tingui accés o les dades
introduïdes siguin incorrectes, ha de retornar a la pantalla de login.

Un cop validat l’accés, es mostrarà una pantalla (dashboard.php) que mostrarà els
estats de les incidències. Aquesta pàgina i totes les interiors hauran de tenir el
següent menú:
a. Incidències
b. Històric
c. Admin
Aquesta pantalla, ha de contenir els següents gràfics(estadístiques):
❏ Total incidències (obertes, en curs, tancades)
❏ Percentatge d’incidències pendents de resoldre
❏ Percentatge d’incidències per usuari (professor, gestor, administrador)
❏ Tipus d’incidències


5. incidencies.php: la pàgina ha de:

a. incloure un botó per a crear una incidència nova (tots els rols). Els camps que
ha d’incloure la pantalla són:
i. data (del sistema): input no editable
ii. component (ordinador, projector,...): selector (editable només en
creació de la incidència)
iii. aula: selector (editable només en creació de la incidència)
iv. descripció de la incidència: textarea (editable només en creació de la
incidència)
Nota: En guardar-se correctament, se li assigna l’estat “pendent” i el nom de
l’usuari que l’ha creat.

b. mostrar per defecte un llistat de totes les incidències en una taula, ordenades
de més recent a més antigues (amb paginació).
A la taula, cada registre ha de permetre visualitzar les dades de la incidència (en una
nova finestra) i si és un usuari amb el rol gestor/administrador, pot modificar els
següents camps:
● descripció de la solució: (textarea no visible en creació i de lectura per al rol
professor)
● estat: selector (podrà assignar l’estat en curs i tancada).
● Un cop gravats els canvis, el rol gestor i administrador podrà veure el detall
de la incidència en mode edició, però el rol professor només en mode lectura
● les incidències tancades, en passar 1 mes han de desaparèixer de la taula i
enviar-se a l’històric.

. historic.php: Un cop la incidència ha passat a l’estat “resolta”, s’ha d’afegir al fitxer
“historic.txt”. El contingut d’aquest fitxer s’ha de mostrar en aquesta pàgina. Ha de
contenir un cercador (input) de cerca lliure.

7. admin.php: només pot accedir l’usuari amb rol “administrador”. Les accions a
realitzar són:
a. Alta/modificació usuaris. Camps:
i. nom i cognoms
ii. usuari
iii. contrasenya (md5)
iv. email
v. rol
b. Alta/modificació rols. Camps:
i. nom curt del rol
ii. descripció
La pàgina ha de mostrar una taula amb tots els usuaris. En cas de modificació de dades
d’usuari, s’ha de emmagatzemar en un fitxer “historic_usuaris.txt” la dada original,el canvi,
la data de modificació (sistema) i quin usuari ho ha fet.
Un cop desenvolupat i desplegat el projecte, revisar el seu correcte contingut i funcionament:
❏ no es mostren errors d’execució (variables no definides, errors no capturats,...) ni hi ha
traces a la consola (d’errors).
❏ totes les connexions a la bbdd obertes es tanquen en finalitzar la consulta
❏ l’aplicació conté implementats els requeriments (tipus de camps, rols especificats i definits a
la taula corresponent, …)

