var farveListe = ["Hjerter", "Klør", "Spar", "Ruder"];
var nummerListe = ["Es", "To", "Tre", "Fire", "Fem", "Seks", "Syv", "Otte", "Ni", "Ti", "Knægt", "Dronning", "Konge"];

class Kort {
  constructor(farve, nummer) {
    this.farve = farveListe[farve];
    this.nummer = nummerListe[nummer];
    this.værdi = nummer + 1;
  }
}

class Hånd {
  //Der skal laves en hel kortbunke
  constructor() {
    this.bunke = [];
  }
  nyBunke() {
    this.bunke = [];
    for (var i = 0; i < 4; i++) {
      for (var j = 0; j < 13; j++) {
        this.bunke.push(new Kort(i, j));
      }
    }
  }
  bland(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;

      // And swap it with the current element.
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }
    return array;
  }
  beregnHånd() {

  }
}

hånd = new Hånd();
hånd.nyBunke();
console.log(hånd.bunke);

kort = hånd.bunke.shift();
console.log(kort);
console.log(hånd.bunke);
