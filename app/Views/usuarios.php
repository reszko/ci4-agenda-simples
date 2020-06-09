<body>
	<script>
		function valida(){
			if (!confirm("Estação ação irão excluir este usuário e todos os telefones cadastrados para ele.\nContinua?")){
				return false;
			}

			return true;

		}
	</script>
	<div class="container">	
	<div class="card">
		<div class="card-header">
			Contatos Cadastrados
		</div>
		<div class="card-body">
		<div class="row mb-3 no-gutters">
			<a href="usuario/new" class="btn btn-success">Novo usuário</a>
		</div>
		<?php $mensagem = session()->getFlashdata('mensagem'); ?>
        <?php if (!empty($mensagem)) : ?>
            <div class="alert alert-info">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>		
		<table class="table">
		<tr>
			<th>Código</th>
			<th>Nome</th>
			<th>Sobrenome</th>
			<th>Endereço</th>
			<th>Telefones</th>
			<th>Email</th>
			<th class="text-center">Ações</th>
		</tr>
		<?php if (count($usuarios) > 0): ?>
			<?php foreach ($usuarios as $usuario): ?>
				<tr>
					<td><?php echo $usuario['dadosUsuario']['id'] ?></td>
					<td><?php echo $usuario['dadosUsuario']['nome'] ?></td>
					<td><?php echo $usuario['dadosUsuario']['sobrenome'] ?></td>
					<td><?php echo $usuario['dadosUsuario']['endereco'] ?></td>
					<td>
						<?php if (count($usuario['telefones']) > 0): ?>
						<table class="table table-sm">
							<tr>
								<th>Tipo</th>
								<th>Telefone</th>
							</tr>
							<?php foreach ($usuario['telefones'] as $telefone): ?>
								<tr>
									<td><?php echo $telefone['tipo'] ?></td>
									<td><?php echo $telefone['telefone'] ?></td>
								</tr>
							<?php endforeach;?>
						</table>
							<?php else: ?>
								Sem telefones
							<?php endif;?>

					</td>
					<td><?php echo $usuario['dadosUsuario']['email'] ?></td>
					<td class="text-center">
						<a href="usuario/edit/<?php echo $usuario['dadosUsuario']['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
						-
						<a href="usuario/delete/<?php echo $usuario['dadosUsuario']['id'] ?>" class="btn btn-danger btn-sm" onclick="return valida()">Excluir</a>
					</td>
				</tr>
			<?php endforeach;?>
			<?php else: ?>
			<tr>
				<td colspan='7' class="text-center">Nenhum registro encontrado</td>
			</tr>
			<?php endif;?>
		</table>
		</div>
	</div>
	</div>

</body>
