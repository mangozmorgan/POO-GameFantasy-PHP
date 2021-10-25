<!DOCTYPE html>
<html lang="en">
    <?php include './headers.php'; ?>
  <body>
    <form class="formCreate" enctype="multipart/form-data" method="GET">
      <header>
        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
          <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        <h2>Creer ton combattant</h2>
      </header>
      <label for="nomPerso">Quel est le nom de ton héro ? </label>
      <input name="nomPerso" id="nomPerso" type="text" placeholder="Anthony" required/>
      <div class="check">
        <input class="hide" id="commande" type="text" value="createPerso" />
        <input type="checkbox" id="magicien" name="magicien" value="Magicien" />
        <label for="magicien">Magicien</label>
      </div>
      <div class="check">
        <input type="checkbox" id="archer" name="archer" value="Archer" />
        <label for="archer">Archer</label>
      </div>
      <button type="submit" class="startGame">Commencer le combat</button>
    </form>

    <div class="creationOk"></div>
    <div class="enemyOk"></div>
    <div class="controlDiv">
      <button class="createEnemy">Creer un enemy</button>

      <!-- <form class="hide" id="atq" method="post">
        <input class="hide" value="attaque" type="text" />
        <button type="submit">Coup de baton</button>
      </form> -->
    </div>
    <script src="effect.js"></script>
    <script src="ajax.js"></script>
  </body>
</html>
