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

        $formData = [
            'id' => '',
            'login' => '',
            'cadastro' => '',
            'nome' => '',
            'grupo_id' => '',
            'area_id' => '',
            'tipo' => '',
            'order' => '',
        ];

        if ($_GET) {
            $formData = $_GET;
        }

        print_r($formData);

        $userData = $this->getUsersData($formData);

        $areaCollection = Area::all();
        $areaData = $areaCollection->toArray();

        $grupoData = grupoController::grupoList();

        $tipos = $this->getUserTipos();

        $orderList = $this->listOrder();

        $allData['areaData']  = $areaData;
        $allData['grupoData'] = $grupoData;
        $allData['tiposData'] = $tipos;
        $allData['orderList'] = $orderList;
        $allData['formData']  = $formData;
        $allData['userData']  = $userData;
        $allData['mensagem']  = $msg;

        
        print_r($allData['grupoData']);
        print_r($allData['formData']['grupo_id']);

        return view('user.list', compact('allData'));
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

        $hasFilter = false;
        $where = array();

        if (isset($filter['id']) && $filter['id'] != ''){
            $where[] = ['id', '=', $filter['id']];
            $hasFilter = true;
        }

        if (isset($filter['login']) && $filter['login'] != ''){
            $where[] = ['login', 'like', '%'.$filter['login'].'%'];
            $hasFilter = true;
        }

        if (isset($filter['cadastro']) && $filter['cadastro'] != ''){
            $where[] = ['cadastro', 'like', '%'.$filter['cadastro'].'%'];
            $hasFilter = true;
        }

        if (isset($filter['nome']) && $filter['nome'] != ''){
            $where[] = ['nome', 'like', '%'.$filter['nome'].'%'];
            $hasFilter = true;
        }

        if (isset($filter['grupo_id']) && $filter['grupo_id'] != ''){
            $where[] = ['grupo_id', '=', $filter['grupo_id']];
            $hasFilter = true;
        }
        

        if (isset($filter['area_id']) && $filter['area_id'] != ''){
            $where[] = ['area_id', '=', $filter['area_id']];
            $hasFilter = true;
        }

        if (isset($filter['tipo']) && $filter['tipo'] != ''){
            $where[] = ['tipo', '=', $filter['tipo']];
            $hasFilter = true;
        }

        if (isset($filter['order']) && $filter['order'] != ''){

            if ($hasFilter) {
                $userCollection = Usuario::where($where)->orderBy($filter['order'], 'asc')->get();
            } else {
                $userCollection = Usuario::orderBy($filter['order'], 'asc')->get();
            }

        } else{

            if ($hasFilter) {
                $userCollection = Usuario::where($where)->get();
            } else {
                $userCollection = Usuario::all();
            }

        }

        $userData = $userCollection->toArray();

        return $userData;
    }

    private function listOrder(){
        $options = array();
        $options['id'] = 'ID';
        $options['login'] = 'Login';
        $options['cadastro'] = 'Cadastro';
        $options['nome'] = 'Nome';
        $options['grupo_id'] = 'Grupo';
        $options['area_id'] = 'Area';
        $options['tipo'] = 'Tipo';

        return $options;
    }
}
