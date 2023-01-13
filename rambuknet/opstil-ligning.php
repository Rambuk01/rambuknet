<?php
require_once 'php/header.php';
?>
<div style="position: relative; top: 100px; left: 100px;">

  <h1 id="replacetext"></h1><h1 id="counter">0</h1>
  <button id="button">Button</button>

  <div id="problemtext" style="visibility: hidden;">
    <p ><span class="name1">name1</span>, <span class="name2">name2</span> and <span class="name3">name3</span> went shopping.
    <br><span class="name1">name1</span> has <span id="comp1">0</span> crowns <span id="comp1string">___</span> than <span class="name3">name3</span>.
    <br><span class="name3">name3</span> has <span id="comp2">0</span> crowns <span id="comp2string">___</span> than <span class="name2">name2</span>.
    <br>Combined they have <span id="total">0</span> crowns;
    <br><br>How much do they each have?</p>
    <pre>
      <span class="name1">name1: </span>  <input type="text" id="answer1"><br>
      <span class="name2">name2: </span>  <input type="text" id="answer2"><br>
      <span class="name3">name3: </span>  <input type="text" id="answer3"><br>
      <button id="answer">Answer</button>
    </pre>

  </div>
</div>
  <script>
  O("button").addEventListener("click", clicked);
  O("answer").addEventListener("click", calculate);
  let count = 0;
  function clicked() {

    let name1 = "Jack"; let name2 = "Anne"; let name3 = "Dick";
    money1 = Math.round(Math.random() * 100);
    money2 = Math.round(Math.random() * 100);
    money3 = Math.round(Math.random() * 100);
    if(money1 > money3) comp1string = "more"; else comp1string = "less";
    if(money3 > money2) comp2string = "more"; else comp2string = "less";
    let comp1 = Math.abs(money1 - money3);
    let comp2 = Math.abs(money2 - money3);
    let total = Math.abs(money1 + money2 + money3);

    O("comp1string").innerHTML = comp1string;
    O("comp2string").innerHTML = comp2string;
    O("comp1").innerHTML = comp1;
    O("comp2").innerHTML = comp2;
    O("total").innerHTML = total;
    //Assign the names to the text;
    for (var i = 0; i < C("name1").length; i++) {
      C("name1")[i].innerHTML = name1;
    }
    for (var i = 0; i < C("name2").length; i++) {
      C("name2")[i].innerHTML = name2;
    }
    for (var i = 0; i < C("name3").length; i++) {
      C("name3")[i].innerHTML = name3;
    }
    //make the problemtext visible

    S("problemtext").visibility = "visible";

    console.log(name1 + " : " + money1);
    console.log(name2 + " : " + money2);
    console.log(name3 + " : " + money3);
  }

  function calculate() {
    answer1 = document.getElementById("answer1").value;
    answer2 = document.getElementById("answer2").value;
    answer3 = document.getElementById("answer3").value;

    console.log("Answer1: " + answer1 + "--- Money1: " + money1);
    console.log("Answer2: " + answer2 + "--- Money2: " + money2);
    console.log("Answer3: " + answer3 + "--- Money3: " + money3);

    if(answer1 == money1 && answer2 == money2 && answer3 == money3) {
      O("replacetext").innerHTML = "Rigtigt!: ";
      count++;
      O("counter").innerHTML = count;
      S("problemtext").visibility = "hidden";
    } else { O("replacetext").innerHTML = "Forkert! :"; }
  }
  </script>
</body>
</html>
