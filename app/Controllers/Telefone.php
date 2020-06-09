<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TelefoneModel;

class Telefone extends BaseController
{

    /**
     * Chama a view de criação
     *
     * @return void
     */
    function new ($usuarios_id) {

        helper('form');
        echo view('common/header');
        echo view('telefone_form', [
            'titulo' => 'Novo telefone',
            'usuarios_id' => $usuarios_id,
        ]);
        echo view('common/footer');

    }

    /**
     * Chama a view de edição
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $telefoneModel = new TelefoneModel();

        helper('form');

        $dadosTelefone = $telefoneModel->get($id);
        $dadosUsuario = $telefoneModel->getByIdTelefone($id);
        if (!is_null($dadosTelefone)) {
            echo view('common/header');
            echo view('telefone_form', [
                'titulo' => 'Edição de telefone',
                'dados' => $dadosTelefone,
                'usuarios_id' => $dadosUsuario['usuarios_id']
            ]);
            echo view('common/footer');
        }
    }

    /**
     * Salva um registro
     *
     * @return void
     */
    public function store()
    {
        helper('form');

        $post = $this->request->getPost();

        $telefoneModel = new TelefoneModel();

        echo view('common/header');

        if ($telefoneModel->save($post)) {
            return redirect()->to("/usuario/edit/{$post['usuarios_id']}")->with('mensagem', 'Telefone salvo com sucesso.');
        } else {
            
            echo view('telefone_form', [
                'titulo' => 'Edição de telefone',
                'erros' => $telefoneModel->errors(),
                'usuarios_id' => $post['usuarios_id'],
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
        $telefoneModel = new TelefoneModel();
        $dadosUsuario = $telefoneModel->getByIdTelefone($id);

        if (!is_null($dadosUsuario)) {
            $idUsuario = $dadosUsuario['usuarios_id'];
            if ($telefoneModel->where('id', $id)->delete()) {
                return redirect()->to("/usuario/edit/{$idUsuario}")->with('mensagem', 'Registro excluído com sucesso.');
            }
        } else {
            echo "Dados do usuário não encontrados";
        }
    }

}
