<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treinamento;
use App\Models\Area;

class treinamentoController extends Controller
{
    // Funções principais =============================================================================

    public function add(){

        $areaData   = Area::areaList();

        $allData = array();
        $allData['areaData']  = $areaData;
        $allData['mensagem'] = '';

        if(count($_POST) > 0){
            $addData = array();
            $addData['titulo']      = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
            $addData['descricao']   = filter_var($_POST['descricao'], FILTER_SANITIZE_STRING);
            $addData['area_id']     = filter_var($_POST['area_id'], FILTER_SANITIZE_STRING);
            $addData['validade']    = filter_var($_POST['validade'], FILTER_SANITIZE_STRING);
            $addData['celulas']     = filter_var($_POST['celulas'], FILTER_SANITIZE_STRING);
            $addData['anexo']       = $_POST['anexo'];

            Treinamento::create($addData);

            $allData['mensagem'] = 'Treinamento adicionado com sucesso!';
        }

        return view('treinamento.add', compact('allData'));
    }

    public function edit(){
        return view('treinamento.edit');
    }

    public function list($msg = ''){

        $formData = [
            'id'        => '',
            'titulo'     => '',
            'area_id'  => '',
            'validade_de'      => '',
            'validade_ate'      => '',
            'celulas'  => '',
            'order'  => ''
        ];

        if ($_GET) {
            $formData = $_GET;
        }

        $areaData   = Area::areaList();
        $treinamentoData   = $this->getData($formData);
        $orderList  = $this->orderList();

        $allData['areaData']  = $areaData;
        $allData['orderList'] = $orderList;
        $allData['formData']  = $formData;
        $allData['treinamentoData']  = $treinamentoData;
        $allData['mensagem']  = $msg;

        return view('treinamento.list', compact('allData'));
    }

    public function rel(){
        return view('treinamento.rel');
    }

    public function remove(){
        return view('treinamento.remove');
    }

    public function view(){
        return view('treinamento.view');
    }

    // Funções públicas ===============================================================================
    // Funções protegidas =============================================================================

    protected function getData($filter = array()){

        $hasFilter = false;
        $where = array();

        if (isset($filter['id']) && $filter['id'] != ''){
            $where[] = ['id', '=', $filter['id']];
            $hasFilter = true;
        }

        if (isset($filter['titulo']) && $filter['titulo'] != ''){
            $where[] = ['titulo', 'like', '%'.$filter['titulo'].'%'];
            $hasFilter = true;
        }

        if (isset($filter['area_id']) && $filter['area_id'] != ''){
            $where[] = ['area_id', '=', $filter['area_id']];
            $hasFilter = true;
        }

        if (isset($filter['celulas']) && $filter['celulas'] != ''){
            $where[] = ['celulas', 'like', '%'.$filter['celulas'].'%'];
            $hasFilter = true;
        }

        if (isset($filter['order']) && $filter['order'] != ''){

            if ($hasFilter) {
                $treinamentoCollection = Treinamento::where($where)->orderBy($filter['order'], 'asc')->get();
            } else {
                $treinamentoCollection = Treinamento::orderBy($filter['order'], 'asc')->get();
            }

        } else{

            if ($hasFilter) {
                $treinamentoCollection = Treinamento::where($where)->get();
            } else {
                $treinamentoCollection = Treinamento::all();
            }

        }

        $treinamentoData = $treinamentoCollection->toArray();

        return $treinamentoData;
    }

    protected function orderList(){

        $options = array();
        $options['id'] = 'ID';
        $options['titulo'] = 'Titulo';
        $options['area_id'] = 'Area';
        $options['validade'] = 'Validade';
        $options['celulas'] = 'Celula';

        return $options;
    }
}
