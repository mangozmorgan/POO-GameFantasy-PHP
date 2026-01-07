const addLog = (content) => {
    const log = document.getElementById('combat-log');
    const msg = document.createElement('div');
    msg.className = 'combat-msg';
    msg.innerHTML = content;
    log.appendChild(msg);
    log.scrollTop = log.scrollHeight;
};

const updateActions = (isDead, classe) => {
    const container = document.getElementById('actions-container');
    container.innerHTML = ""; 

    if (isDead) {
        const btn = document.createElement('button');
        btn.className = "btn-enemy";
        btn.innerHTML = "Nouvel Ennemi 👾";
        btn.onclick = createEnemy;
        container.appendChild(btn);
    } else {
        // Attaque Simple
        const btnAtq = document.createElement('button');
        btnAtq.className = "atq-btn";
        btnAtq.innerHTML = "Attaque 🤺";
        btnAtq.onclick = () => sendAction("ATQ");
        container.appendChild(btnAtq);

        // Attaque Spéciale
        const btnSpec = document.createElement('button');
        btnSpec.className = "special-btn";
        const label = (classe.trim().toLowerCase() === "magicien") ? "Boule de feu 🔥" : "Pluie de flèches 🏹";
        const cmd = (classe.trim().toLowerCase() === "magicien") ? "BDF" : "PDF";
        btnSpec.innerHTML = label;
        btnSpec.onclick = () => sendAction(cmd);
        container.appendChild(btnSpec);
    }
};

const sendAction = (cmd) => {
    let classe = document.querySelector(".classe").textContent.toLowerCase().trim();
    fetch("traitement.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ nom: "", classe: classe, commande: cmd }),
    })
    .then(res => res.text())
    .then(data => {
        const isDead = data.includes("DEAD");
        addLog(data.replace("DEAD", ""));
        updateActions(isDead, classe);
    });
};

const createEnemy = () => {
    const names = ["Ramos", "Pickmix", "Shiftmind", "Nedikle"];
    const types = ["gobelin", "troll"];
    const data = { 
        nom: names[Math.floor(Math.random()*names.length)], 
        classe: types[Math.floor(Math.random()*types.length)], 
        commande: "createEnemy" 
    };

    fetch("traitement.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data),
    })
    .then(res => res.text())
    .then(data => {
        addLog("👾 <strong>Un ennemi apparaît !</strong>");
        addLog(data);
        const playerClass = document.querySelector(".classe").textContent;
        updateActions(false, playerClass);
    });
};

document.querySelector(".formCreate").addEventListener("submit", (e) => {
    e.preventDefault();
    const nom = document.querySelector("#nomPerso").value;
    const classe = document.querySelector('input[name="classe"]:checked').value;

    fetch("traitement.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ nom: nom, classe: classe, commande: "createPerso" }),
    })
    .then(res => res.text())
    .then(data => {
        document.querySelector(".creationOk").innerHTML = data;
        document.getElementById("setup-screen").style.display = "none";
        document.getElementById("combat-screen").style.display = "block";
        addLog(`🛡️ Bienvenue, <strong>${nom}</strong> le ${classe} !`);
    });
});