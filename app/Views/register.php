<form action="/auth/registerPost" method="post">
    <div>
        <label for="username">Usuario</label>
        <input type="text" name="username" id="username" required>
    </div>
    <div>
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="confirm_password">Confirmar contraseña</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
    </div>
    <button type="submit">Registrar</button>
</form>
