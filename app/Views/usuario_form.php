<body>
<script>
		function valida(){
			if (!confirm("Confirma a exclusão deste telefone?")){
				return false;
			}

			return true;

		}
	</script>
	<div class="container">
	<div class="card">
		<div class="card-header">
			<?php echo $titulo ?>
		</div>
		<div class="card-body">
		<div class="row no-gutters mb-3">
			<?php echo anchor('/', '<<< - Voltar') ?>
		</div>
		<?php if (isset($erros)): ?>
			<?php foreach ($erros as $erro): ?>
				<div class="alert alert-danger"><?php echo $erro ?></div>
			<?php endforeach;?>
		<?php endif;?>
		<?php $mensagem = session()->getFlashdata('mensagem'); ?>
        <?php if (!empty($mensagem)) : ?>
            <div class="alert alert-info">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>
		<?php echo form_open('usuario/store', ['autocomplete' => 'off']) ?>
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome" class="form-control" value="<?php echo isset($dados['nome']) ? $dados['nome'] : set_value('nome') ?>">
			</div>
			<div class="form-group">
				<label for="sobrenome">Sobrenome</label>
				<input type="text" name="sobrenome" id="sobrenome" class="form-control" value="<?php echo isset($dados['sobrenome']) ? $dados['sobrenome'] : set_value('sobrenome') ?>">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" class="form-control" value="<?php echo isset($dados['email']) ? $dados['email'] : set_value('email') ?>">
			</div>
			<div class="form-group">
				<label for="endereco">Endereço</label>
				<input type="text" name="endereco" id="endereco" class="form-control" value="<?php echo isset($dados['endereco']) ? $dados['endereco'] : set_value('endereco') ?>">
			</div>
			<div class="form-group">
				<table class="table">
					<tr class="bg-dark text-white">
						<th colspan='3' class="text-center">Telefones</th>
					</tr>
					<tr>
						<td>Tipo</td>
						<td>Telefone</td>
						<td class="text-center">Ação</td>
					</tr>									
					<?php if (isset($telefones) && count($telefones) > 0): ?>
						<?php foreach($telefones as $telefone): ?>
							<tr>
								<td><?php echo $telefone['tipo'] ?></td>
								<td><?php echo $telefone['telefone'] ?></td>
								<td class="text-center">
									<?php echo anchor("telefone/edit/{$telefone['id']}", 'Editar') ?>
									-
									<?php echo anchor("telefone/delete/{$telefone['id']}", 'Excluir', ['onclick' => 'return valida()']) ?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
					<tr>
						<td colspan='3' class="text-center">Nenhum telefone cadastrado</td>
					</tr>
					<?php endif; ?>
				</table>
			</div>
			<div class="form-group text-right">
				<?php if (isset($dados['id'])): ?>
					<?php echo anchor("telefone/new/{$dados['id']}", 'Novo telefone' , ['class' => 'btn btn-primary btn-sm']) ?>
				<?php else: ?>
					<button  type="button" disabled class='btn btn-primary btn-sm disable' title="Salve o usuário antes de inserir um telefone">Novo telefone</button>
				<?php endif; ?>
			</div>
			<hr>
			<input type="submit" value="Salvar" class="btn btn-success">
			<input type="hidden" name="id" value="<?php echo isset($dados['id']) ? $dados['id'] : '' ?>">
		</form>

		</div>
	</div>

</body>
