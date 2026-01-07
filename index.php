<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPG Arena | Localhost</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section id="setup-screen">
        <form class="formCreate">
            <header>
                <div class="icon-circle">
                    <svg fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <h2>Nouveau Combattant</h2>
            </header>

            <div class="field">
                <label for="nomPerso">Nom du héros</label>
                <input name="nomPerso" id="nomPerso" type="text" placeholder="Ex: Anthony" required>
            </div>

            <div class="class-selector">
                <div class="check">
                    <input type="radio" id="magicien" name="classe" value="magicien" checked>
                    <label for="magicien">✨ Magicien</label>
                </div>
                <div class="check">
                    <input type="radio" id="archer" name="classe" value="archer">
                    <label for="archer">🏹 Archer</label>
                </div>
            </div>

            <input type="hidden" id="commande" value="createPerso">
            <button type="submit" class="btn-primary">Entrer dans l'arène</button>
        </form>
    </section>

    <section id="combat-screen" style="display:none;">
        <div id="status-bar">
            <div class="creationOk"></div>
        </div>

        <div id="combat-log">
            <div class="msg system">L'arène est prête...</div>
        </div>

        <div class="action-bar" id="actions-container">
            <button class="btn-enemy" onclick="createEnemy()">Apparition d'un ennemi 👾</button>
        </div>
    </section>

    <script src="app.js"></script>
</body>
</html>