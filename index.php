<form action="salvar.php" method="post">
    <label>Tipo:</label>
    <select name="tipo" required>
        <option value="Aluno">Aluno</option>
        <option value="Professor">Professor</option>
        <option value="Funcionario">Funcionario</option>
    </select>

    <label>Nome:</label>
    <input type="text" name="nome" required>

    <label> E-mail:</label>
    <input type="email" name="email" required>

    <label>Informaçâo específica</label>
    <input type="text" name="extra" required>

    <button type="submit">Cadastrar</button>
</form>