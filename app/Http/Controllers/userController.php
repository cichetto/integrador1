<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Area;
use App\Models\Grupo;

class userController extends Controller
{

    // Constantes =====================================================================================

    const TIPO_COLABORADOR   = 'a';
    const TIPO_COORDENADOR   = 'b';
    const TIPO_ADMINISTRADOR = 'c';

    // Funções principais =============================================================================

    /**
     * Adicionar Usuário
     *
     * @return void
     */
    public function add(){
        
        $areaCollection = Area::all();
        $areaData = $areaCollection->toArray();

        $grupoCollection = Grupo::all();
        $grupoData = $grupoCollection->toArray();

        $tipos = $this->getUserTipos();

        $allData = array();
        $allData['areaData']  = $areaData;
        $allData['grupoData'] = $grupoData;
        $allData['tiposData'] = $tipos;
        $allData['mensagem'] = '';

        if(count($_POST) > 0){
            $addData = array();
            $addData['login']       = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
            $addData['senha']       = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);
            $addData['cadastro']    = filter_var($_POST['cadastro'], FILTER_SANITIZE_NUMBER_INT);
            $addData['nome']        = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
            $addData['grupo_id']    = filter_var($_POST['grupo_id'], FILTER_SANITIZE_STRING);
            $addData['area_id']     = filter_var($_POST['area_id'], FILTER_SANITIZE_STRING);
            $addData['tipo']        = filter_var($_POST['tipo'], FILTER_SANITIZE_STRING);

            Usuario::create($addData);

            $allData['mensagem'] = 'Usuário adicionado com sucesso!';
        }

        return view('user.add', compact('allData'));
    }

    /**
     * Editar Usuário
     *
     * @return void
     */
    public function edit(){

        $userID = $this->_id;

        if (isset($_GET['id']) && $_GET['id'] != ''){
            $userID = $_GET['id'];
        }

        if (isset($_POST['id']) && $_POST['id'] != ''){
            $userID = $_POST['id'];
        }

        $userCollection = Usuario::find($userID);
        $userData = $userCollection->toArray();

        $areaCollection = Area::all();
        $areaData = $areaCollection->toArray();

        $grupoCollection = Grupo::all();
        $grupoData = $grupoCollection->toArray();

        $tipos = $this->getUserTipos();

        $allData = array();
        $allData['userData']  = $userData;
        $allData['areaData']  = $areaData;
        $allData['grupoData'] = $grupoData;
        $allData['tiposData'] = $tipos;
        $allData['mensagem'] = '';

        if(count($_POST) > 0){
            $newData = array();
            $newData['login']       = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
            $newData['senha']       = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);
            $newData['cadastro']    = filter_var($_POST['cadastro'], FILTER_SANITIZE_NUMBER_INT);
            $newData['nome']        = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
            $newData['grupo_id']    = filter_var($_POST['grupo_id'], FILTER_SANITIZE_STRING);
            $newData['area_id']     = filter_var($_POST['area_id'], FILTER_SANITIZE_STRING);
            $newData['tipo']        = filter_var($_POST['tipo'], FILTER_SANITIZE_STRING);

            $userCollection->fill($newData);
            $userCollection->save();

            $userData = $userCollection->toArray();
            $allData['userData'] = $userData;
            $allData['mensagem'] = 'Cadastro atualizado com sucesso!';
        }

        return view('user.edit', compact('allData'));
    }

    /**
     * Listar Usuários
     *
     * @return void
     */
    public function list($msg = ''){

        $userData = $this->getUsersData($_GET);

        $allData['userData'] = $userData;
        $allData['mensagem'] = $msg;

        return view('user.list', compact('allData')); // Envia $userData para a View
    }

    /**
     * Remover usuário
     *
     * @return void
     */
    public function remove(){
        
        if (isset($_GET['id']) && $_GET['id'] != ''){
            $userID = $_GET['id'];
        }

        if (isset($_POST['id']) && $_POST['id'] != ''){
            $userID = $_POST['id'];

            Usuario::destroy($userID);
            return $this->list('Usuário removido.');
        }

        $userCollection = Usuario::find($userID);
        $userData = $userCollection->toArray();

        $areaCollection = Area::find($userData['area_id']);
        $areaData = $areaCollection->toArray();

        $grupoCollection = Grupo::find($userData['grupo_id']);
        $grupoData = $grupoCollection->toArray();

        $tipos = $this->getUserTipos();

        $allData = array();
        $allData['userData']  = $userData;
        $allData['areaData']  = $areaData['descricao'];
        $allData['grupoData'] = $grupoData['descricao'];
        $allData['tiposData'] = $tipos[$userData['tipo']];

        return view('user.remove', compact('allData'));
    }

    /**
     * Visualizar usuário
     *
     * @return void
     */

    public function view(){

        $userID = $_GET['id'];
        $userCollection = Usuario::find($userID);
        $userData = $userCollection->toArray();

        $areaCollection = Area::find($userData['area_id']);
        $areaData = $areaCollection->toArray();

        $grupoCollection = Grupo::find($userData['grupo_id']);
        $grupoData = $grupoCollection->toArray();

        $tipos = $this->getUserTipos();

        $allData = array();
        $allData['userData']  = $userData;
        $allData['areaData']  = $areaData['descricao'];
        $allData['grupoData'] = $grupoData['descricao'];
        $allData['tiposData'] = $tipos[$userData['tipo']];

        return view('user.view', compact('allData'));
    }

    // Funções públicas ===============================================================================

    public function getUserTipos(){

        $tipos = array();
        $tipos[self::TIPO_COLABORADOR]   = 'Colaborador';
        $tipos[self::TIPO_COORDENADOR]   = 'Coordenador';
        $tipos[self::TIPO_ADMINISTRADOR] = 'Administrador';

        return $tipos;
    }

    // Funções protegidas =============================================================================

    protected function getUsersData($filter = array()){

        $usuario = new Usuario;
        $hasFilter = false;

        print_r($filter);

        if (isset($filter['id']) && $filter['id'] != ''){
            $usuario->where('id', '=', $filter['id']);
            $hasFilter = true;
        }

        if (isset($filter['login']) && $filter['login'] != ''){
            $usuario->where('login', 'like', $filter['login']);
            $hasFilter = true;
        }

        if (isset($filter['cadastro']) && $filter['cadastro'] != ''){
            $usuario->where('cadastro', 'like', $filter['cadastro']);
            $hasFilter = true;
        }

        if (isset($filter['nome']) && $filter['nome'] != ''){
            $usuario->where('nome', 'like', $filter['nome']);
            $hasFilter = true;
        }

        if (isset($filter['area_id']) && $filter['area_id'] != ''){
            $usuario->where('area_id', 'like', $filter['area_id']);
            $hasFilter = true;
        }

        if (isset($filter['tipo']) && $filter['tipo'] != ''){
            $usuario->where('tipo', '=', $filter['tipo']);
            $hasFilter = true;
        }

        if (isset($filter['order']) && $filter['order'] != ''){
            $usuario->whereorderBy($filter['order'], 'asc');
            $hasFilter = true;
        }

        print_r($usuario);
        if ($hasFilter) {
            $userCollection = $usuario->get();
        } else {
            $userCollection = $usuario->all();
        }

        $userData = $userCollection->toArray();

        return $userData;
    }
}
