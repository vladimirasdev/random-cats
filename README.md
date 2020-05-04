<p align="center"><h3 class="lead display-4" style="font-size: 2rem;"><i class="fas fa-cat"></i> Atsitiktinės kačių veislės!</h3></p>

## Demo
- [Peržiūrėti Demo puslapį](https://random-cats.zay.lt).

## Apie puslapį
Sukurtas puslapis, kuris turi tokius URL: domenas.tld/N, kur N yra skaičius nuo 1 iki 1000000.
Kiekviename tokiame URL išvedamos 3 skirtingos kačių veislės iš sąrašo cats.txt tokia tvarka: Cat1, Cat2, Cat3.

## Puslapis kačių kombinacijas cache'uoja 60 sekundžių
Jei kombinacija Cat1, Cat2, Cat3 buvo parodyta URL domenas.tld/N, tai 60 sekundžių tas URL grąžina tokią pačią kombinaciją.
- Cache įrašymui ir nuskaitymui naudojama laravel klasė "Cache".

## Puslapis renka lankytojų statistiką ir įrašo į duomenų bazę Mysql:
- Suma visų puslapio atidarymų su visomis N reikšmėmis.
- Suma atidarymų konkrečiai N reikšmei.

## Puslapis rašo log failą "storage\logs\visits.log" JSON formatu, kiekvienam puslapio apsilankymui, iš naujos eilutės:
{
"datetime": “yyyy-MM-dd HH:mm:ss”,
"N": N,
"Cats": ["Cat1", "Cat2", "Cat3"],
"countAll": countAll,
"countN": countN
}
- Log failo įrašymui naudojama laravel klasė "Storage".

## Duomenų bazės lentelės sukuriamos su komandomis:
- php artisan migrate
- php artisan migrate --seed