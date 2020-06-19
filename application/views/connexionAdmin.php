<?= form_open("admin/new_session_admin", 'class="form_control"'); ?>
    <br>
        <!-- Adresse mail -->
        <div class="form-group text-center offset-3 w-50">
            <label for="mail" class="sr-only">Adresse mail</label>
            <input type="email" class="form-control" id="mail" name="mail" placeholder="name@exemple.fr">
        </div>
        <!-- Mot de passe -->
        <div class="form-group text-center offset-3 w-50">
            <label for="password" class="sr-only">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="mot de passe">
        </div>
        <div class="row align-items-center">
            <div class="form-group text-center offset-3 w-50">
                <input type="submit" class="form-control" id="ok" name="ok" value="Envoyez">
            </div>
        </div>
    <br>
<?= form_close(); ?>