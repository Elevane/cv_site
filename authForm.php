        <?php require_once('headerBackoffice.php') ?>
        </header>
        <section class="headReg"><h2>login</h2></section>
        <section id="auth">
            <form action="auth.php" method="POST" id="authform">
                
                <div class="input_group">
                    <label for="login">login</label>
                    <input type="text" name="login">
                </div>
                
                <div class="input_group">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp">
                </div>
                
                <div class="input_group">
                    <label for="submit"></label>
                    <input type="submit" name="submit" value="se connecter">
                </div>
                
            </form>
        </section>
    </body>
</html>