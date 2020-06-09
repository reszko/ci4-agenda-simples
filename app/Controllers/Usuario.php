<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TelefoneModel;
use App\Models\UsuarioModel;

class Usuario extends BaseController
{

    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $telefoneModel = new TelefoneModel();

        $result = [];
        
        foreach ($usuarioModel->getAll() as $usuario) {    
            $result[] = [
                'dadosUsuario' => $usuario,
                'telefones' => $telefoneModel->getByUsuarioId($usuario['id'])
            ];
        }

        echo view('common/header');
        echo view('usuarios', [
            'usuarios' => $result,
        ]);
        echo view('common/footer');
    }

    /**
     * Chama a view de criação de novo usuario
     *
     * @return void
     */
    function new () {

        helper('form');
        echo view('common/header');
        echo view('usuario_form', [
            'titulo' => 'Novo usuário',
        ]);
        echo view('common/footer');

    }

    /**
     * Chama a view de edição de usuário
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $usuarioModel = new UsuarioModel();
        $telefoneModel = new TelefoneModel();

        helper('form');

        $dadosUsuario = $usuarioModel->get($id);
        if (!is_null($dadosUsuario)) {
            echo view('common/header');
            echo view('usuario_form', [
                'telefones' => $telefoneModel->getByUsuarioId($id),
                'titulo' => 'Edição de usuário',
                'dados' => $dadosUsuario,
            ]);
            echo view('common/footer');
        }
    }

    public function store()
    {
        helper('form');
        $post = $this->request->getPost();

        $usuarioModel = new UsuarioModel();

        echo view('common/header');
        if ($usuarioModel->save($post)) {
            $insert_id = !empty($post['id']) ? $post['id'] : $usuarioModel->getInsertId();
            return redirect()->to("/usuario/edit/{$insert_id}");
        } else {
            echo view('usuario_form', [
                'titulo' => 'Edição de usuário',
                'erros' => $usuarioModel->errors(),
            ]);
        }
        echo view('common/footer');
    }

    /**
     * Exclui um regisrto
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $usuarioModel = new UsuarioModel();
        if ($usuarioModel->where('id', $id)->delete()) {
            return redirect()->to("/usuario")->with('mensagem', 'Registro excluído com sucesso.');
        }
    }
   

}
