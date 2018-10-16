# Origo Map för Sundsvalls kommun

## Kom igång
1. Ladda upp och aktivera pluginen Sundsvalls kommun - Origo Map Iframe.
3. Skapa en sida och lägg till shortcode (se separat information om shortcode).


## Sidmall
Sidmallen "karta" används för att infoga en karta som sträcker sig över hela sidan utan vänsterkolumn.
Bredd och höjd på kartan kan sättas manuellt för denna sidmall.

## Shortcode
För att infoga en karta i löpande text används följande shortcode. 

```
SHORTCODE
[karta url="https://kartatest.sundsvall.se/fiskekarta/" width="100%" height="400px"]

```

Attribut i shortcode
- url - Länk till karta som ska infogas som iframe.
- width - Bredden på kartan. Anges i procentenhet eller i pixlar som t ex 80% eller 540px; 
- height - Höjden på kartan. Anges i pixlar som t ex 600px (procentenhet fungerar inte för höjd).
