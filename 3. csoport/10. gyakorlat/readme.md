    # PHP CSOPORT ZH
```
Budaházy Béla
G2NYW2
Webprogramozás - PHP csoport ZH
Ezt a megoldást a fent írt hallgató küldte be és készítette 
a Webprogramozás kurzus PHP csoport ZH-jához.
Kijelentem, hogy ez a megoldás a saját munkám. Nem másoltam vagy 
használtam harmadik féltől származó megoldásokat. Nem továbbítottam 
megoldást hallgatótársaimnak, és nem is tettem közzé. Az Eötvös Loránd 
Tudományegyetem Hallgatói Követelményrendszere (ELTE szervezeti és 
működési szabályzata, II. Kötet, 74/C. §) kimondja, hogy mindaddig, 
amíg egy hallgató egy másik hallgató munkáját - vagy legalábbis annak 
jelentős részét - saját munkájaként mutatja be, az fegyelmi vétségnek számít. 
A fegyelmi vétség legsúlyosabb következménye a hallgató elbocsátása az egyetemről.
```


## Leírás
A feladat elkészíteni a A Sajtológia Tanszéknek készült kezdetleges nyilvántartó oldal szerveroldali kódját. A feladat kiindulófájljai és funkcióik:
- index.php: Megjelennek a sajtok kilistázva, a 24 hónapnál öregebb sajtok "old" stílusosztályt kapnak
- addcheese.php: Új sajtot tudunk felvenni, a validálás is ezen az oldalon történik, itt mentődik el a cheese_stock.json-be
- cheese_stock.json: tárolja a sajtok nevét, típusát, származási helyét, és hogy hány hónaposak


A feladat legegyszerűbb megoldásához csak és kizárólag PHP-t kell használnod, ha mégis szükségesnek érzed, belenyúlhatsz bármi másba.

## Előkészületek
1. Első lépésként töltsd le github-ról a kiindulófájlokat.
2. Egészítsd ki a README.md-t.

## Feladatok

### <span style="color:green">index.php</span>
|Sorszám|Feladat|Pontok|
|----|----|----|
| 1. | A táblázat alapja készen van, jelenítsd meg az adatokat dinamikusan a jsonből kiolvasva, majd töröld ki a placeholdereket. | <span style="color:red"> 2 pont </span>|
| 2. | A sajt soraihoz add hozzá az ".old" classt, ha a sajt 24 hónapnál idősebb! |<span style="color:red"> 1 pont </span>|

### <span style="color:green">addcheese.php</span>
|Sorszám|Feladat|Pontok|
|----|----|----|
| 1.| Nézd meg, hogy a formban szereplő inputok attribútumait, mert ezzel fogod tudni megkapni a requesttel az isvalid.php-ban a beírt adatokat.  ||
| 2. | Látod a lehetséges hibaüzeneteket, ezeknek a szövegeit használhatod. A hibaüzenetek alatt segítségképp linkeket találsz, amik a validálásban segítenek. ||
| |  a, A nevet csak akkor fogadja el, ha létezik, és legalább 4 karakter hosszú a két szélén lévő szóközök nélkül! | <span style="color:red"> 1 pont </span>|
|  | b, A típust az alábbi reguláris kifejezés segítségével validáld: `^[a-zA-Z\s]*$` |<span style="color:red"> 1 pont </span>|
|  | c, A hónapot a filter_var függvény segítségével validált egész számra! |<span style="color:red"> 1 pont </span>||
| 3. | Az 'origin' kulcshoz rendeld hozzá az új elemednél a származási országot, majd az új adatokat fűzd hozzá az cheese_stock.jsonhöz! | <span style="color:red"> 2 pont </span>|
| 4. | Attól függően, hogy van-e hiba a validálásban, az oldalon megfelelő részeket jelenítsd meg! |<span style="color:red"> 1 pont </span>|
| 5. | Tedd az űrlapot állapottartová! |<span style="color:red"> 1 pont </span>|

