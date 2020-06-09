<?php namespace App\Models;

use CodeIgniter\Model;

class TelefoneModel extends Model
{

    protected $table = 'telefones';
    protected $allowedFields = [
        'tipo',
        'telefone',
        'usuarios_id',
    ];

    protected $validationRules = [
        'tipo' => [
            'label' => 'Tipo',
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo {field} obrigatório',
            ],
        ],
        'telefone' => [
            'label' => 'Telefone',
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo {field} obrigatório',
            ],
        ]
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
     * Retorna o registro pelo seu id
     *
     * @param [type] $id
     * @return void
     */
    public function get($id)
    {
        return $this->find($id);
    }

    /**
     * Retorna todos os telefones pelo id do proprietário
     *
     * @param [type] $id
     * @return void
     */
    public function getByUsuarioId($id)
    {
        return $this->where('usuarios_id', $id)->findAll();
    }

     /**
     * Retorna o campo usuarios_id através do id do telefone.
     *
     * @param [type] $id
     * @return void
     */
    public function getByIdTelefone($id){
        return $this->select('usuarios_id')->where("id", $id)->first();
    }

}
