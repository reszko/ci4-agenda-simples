<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $allowedFields = [
        'nome',
        'sobrenome',
        'email',
        'endereco',
    ];
    protected $validationRules = [
        'nome' => [
            'label' => 'Nome',
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo {field} obrigatório',
            ],
        ],
        'sobrenome' => [
            'label' => 'Sobrenome',
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo {field}  obrigatório',
            ],
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Campo {field} obrigatório',
                'valid_email' => 'O email digitado parece estar num formato errado',
            ],
        ],
        'endereco' => [
            'label' => 'Endereço',
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo {field}  obrigatório',
            ],
        ],
    ];

    /**
     * Retorna todos os registros.
     *
     * @return void
     */
    public function getAll()
    {
        return $this->findAll();
    }

    /**
     * Retorna o usuário pelo seu id
     *
     * @param [type] $id
     * @return void
     */
    public function get($id)
    {
        return $this->find($id);
    }
    
}
