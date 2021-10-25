function randomArray(array) {
  return array[Math.floor(Math.random() * array.length)];
}

let bdf = () => {
  let data = { nom: "", classe: "magicien", commande: "BDF" };
  fetch("traitement.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.text())

    .then((data) => {
      document.querySelectorAll("button").forEach((button) => {
        button.remove();
      });
      const regex = /DEAD/;
      const found = data.match(regex);
      if (found) {
        let newS = data.replace("DEAD", "");
        document.querySelector("body").innerHTML += newS;
        let newEnemy = document.createElement("button");
        newEnemy.style.marginTop = "2vw";
        const atqContent = document.createTextNode("Creer un nouvel ennemi 👾");
        newEnemy.addEventListener("click", () => {
          createEnemy();
        });
        newEnemy.appendChild(atqContent);
        document.querySelector("body").appendChild(newEnemy);
      } else {
        document.querySelector("body").innerHTML += data;
        let newBtnAtq = document.createElement("button");
        let atqContenu = document.createTextNode("Attaque Simple 🤺");
        newBtnAtq.appendChild(atqContenu);
        document.querySelector("body").appendChild(newBtnAtq);
        newBtnAtq.addEventListener("click", () => {
          attaqueSimple();
        });

        let newBtn = document.createElement("button");
        const contenu = document.createTextNode("Boule de feu 🔥");
        newBtn.appendChild(contenu);

        document.querySelector("body").appendChild(newBtn);
        newBtn.addEventListener("click", () => {
          bdf();
        });
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });

  window.scrollTo(0, document.body.scrollHeight);
};

let attaqueSimple = () => {
  let classe = document
    .querySelector(".classe")
    .textContent.toLowerCase()
    .trim();
  let data = { nom: "", classe: classe, commande: "ATQ" };
  fetch("traitement.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.text())

    .then((data) => {
      const regex = /DEAD/;
      const found = data.match(regex);
      if (found) {
        let newS = data.replace("DEAD", "");
        document.querySelector("body").innerHTML += newS;

        let newEnemy = document.createElement("button");
        newEnemy.style.marginTop = "2vw";
        const atqContent = document.createTextNode("Creer un nouvel ennemi 👾");
        newEnemy.addEventListener("click", () => {
          createEnemy();
        });
        newEnemy.appendChild(atqContent);
        document.querySelector("body").appendChild(newEnemy);
      } else {
        document.querySelectorAll("button").forEach((button) => {
          button.remove();
        });
        document.querySelector("body").innerHTML += data;

        let newBtnAtq = document.createElement("button");
        const atqContent = document.createTextNode("Attaque Simple 🤺");
        newBtnAtq.appendChild(atqContent);

        document.querySelector("body").appendChild(newBtnAtq);
        newBtnAtq.addEventListener("click", () => {
          attaqueSimple();
        });
        let newBtn = document.createElement("button");
        let contenu;
        if (classe === "magicien") {
          contenu = document.createTextNode("Boule de feu 🔥");
          newBtn.addEventListener("click", () => {
            bdf();
          });
        } else if (classe === "archer") {
          contenu = document.createTextNode("Pluie de fleches 🏹");
          newBtn.addEventListener("click", () => {
            pluieDF();
          });
        }
        newBtn.appendChild(contenu);
        console.log(newBtn);

        document.querySelector("body").appendChild(newBtn);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
  window.scrollTo(0, document.body.scrollHeight);
};

let pluieDF = () => {
  let data = { nom: "", classe: "archer", commande: "PDF" };
  fetch("traitement.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.text())

    .then((data) => {
      document.querySelectorAll("button").forEach((button) => {
        button.remove();
      });
      const regex = /DEAD/;
      const found = data.match(regex);
      if (found) {
        let newS = data.replace("DEAD", "");
        document.querySelector("body").innerHTML += newS;
        let newEnemy = document.createElement("button");
        newEnemy.style.marginTop = "2vw";
        const atqContent = document.createTextNode("Creer un nouvel ennemi 👾");
        newEnemy.addEventListener("click", () => {
          createEnemy();
          console.log("okok");
        });
        newEnemy.appendChild(atqContent);
        document.querySelector("body").appendChild(newEnemy);
      } else {
        document.querySelector("body").innerHTML += data;

        let newBtnAtq = document.createElement("button");
        let atqContenu = document.createTextNode("Attaque Simple 🤺");
        newBtnAtq.appendChild(atqContenu);
        document.querySelector("body").appendChild(newBtnAtq);
        newBtnAtq.addEventListener("click", () => {
          attaqueSimple();
        });

        let newBtn = document.createElement("button");
        const contenu = document.createTextNode("Pluie de fleches 🏹");
        newBtn.appendChild(contenu);
        document.querySelector("body").appendChild(newBtn);
        newBtn.addEventListener("click", () => {
          pluieDF();
        });
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
  window.scrollTo(0, document.body.scrollHeight);
};

let createEnemy = () => {
  let arrayEnemy = ["gobelin", "troll"];
  let enemyNameArray = ["Ramos", "Pickmix", "Shiftmind", "Nedikle "];
  let enemyName = randomArray(enemyNameArray);
  let enemy = randomArray(arrayEnemy);
  let data = { nom: enemyName, classe: enemy, commande: "createEnemy" };

  fetch("traitement.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.text())

    .then((data) => {
      console.log({ data });
      let newOkEnemy = document.createElement("div");
      newOkEnemy.innerHTML += data;

      document.querySelector("body").appendChild(newOkEnemy);
      if (
        document.querySelector(".formCreate") &&
        document.querySelector(".createEnemy")
      ) {
        document.querySelector(".formCreate").style.display = "none";
        document.querySelector(".createEnemy").style.display = "none";
      }

      let newBtnAtq = document.createElement("button");
      const atqContent = document.createTextNode("Attaque Simple 🤺");
      newBtnAtq.appendChild(atqContent);
      document.querySelector("body").appendChild(newBtnAtq);

      newBtnAtq.addEventListener("click", () => {
        attaqueSimple();
      });

      if (document.querySelector(".classe").innerHTML.trim() === "Magicien") {
        let newBtn = document.createElement("button");
        const contenu = document.createTextNode("Boule de feu 🔥");
        newBtn.appendChild(contenu);
        console.log(newBtn);

        document.querySelector("body").appendChild(newBtn);
        newBtn.addEventListener("click", () => {
          bdf();
        });
      } else if (
        document.querySelector(".classe").innerHTML.trim() === "Archer"
      ) {
        let newBtn = document.createElement("button");
        const contenu = document.createTextNode("Pluie de fleches 🏹");
        newBtn.appendChild(contenu);
        console.log(newBtn);

        document.querySelector("body").appendChild(newBtn);
        newBtn.addEventListener("click", () => {
          pluieDF();
        });
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
};

document.querySelector(".formCreate").addEventListener("submit", (e) => {
  e.preventDefault();

  let nomPerso = document.querySelector("#nomPerso").value;
  let commande = document.querySelector("#commande").value;
  let typePerso = "";
  if (document.querySelector("#magicien").checked) {
    typePerso = "magicien";
  } else {
    typePerso = "archer";
  }

  let data = { nom: nomPerso, classe: typePerso, commande: commande };

  fetch("traitement.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.text())

    .then((data) => {
      document.querySelector(".creationOk").innerHTML += data;

      document.querySelector(".formCreate").style.display = "none";
      document.querySelector(".createEnemy").style.display = "block";
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});

document.querySelector(".createEnemy").addEventListener("click", (e) => {
  createEnemy();
}); /*
/*
document.querySelector('.bdf').addEventListener('click', (e) => {
    
   bdf()
})

*/
// document.querySelector(".simpleAtq").addEventListener("click", () => {
//   attaqueSimple();
// });
