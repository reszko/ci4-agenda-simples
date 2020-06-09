<body>
	<div class="container">
	<div class="card">
		<div class="card-header">
			<?php echo $titulo ?>
		</div>
		<div class="card-body">
		
		<div class="row no-gutters mb-3">
		<a href="javascript:history.back()"><<<- Voltar</a>
		</div>
		<?php if (isset($erros)): ?>
			<?php foreach ($erros as $erro): ?>
				<div class="alert alert-danger"><?php echo $erro ?></div>
			<?php endforeach;?>
		<?php endif;?>
		<?php if (!empty($mensagem)) : ?>
            <div class="alert alert-info">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>
		<?php echo form_open('telefone/store', ['autocomplete' => 'off']) ?>
			<div class="form-group">
				<label for="tipo">Tipo</label>
				<input type="text" name="tipo" id="tipo" class="form-control" value="<?php echo isset($dados['tipo']) ? $dados['tipo'] : set_value('tipo') ?>">
			</div>
			<div class="form-group">
				<label for="telefone">Telefone</label>
				<input type="number" min='0' name="telefone" id="telefone" class="form-control" value="<?php echo isset($dados['telefone']) ? $dados['telefone'] : set_value('telefone') ?>">
			</div>
			<input type="submit" value="Salvar" class="btn btn-success">
			<input type="hidden" name="usuarios_id" value="<?php echo isset($usuarios_id) ? $usuarios_id : '' ?>">
			<input type="hidden" name="id" value="<?php echo isset($dados['id']) ? $dados['id'] : set_value('id') ?>">
		</form>
		</div>
	</div>

</body>
