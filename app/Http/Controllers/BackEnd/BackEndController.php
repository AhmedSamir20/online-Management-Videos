<?php

    namespace App\Http\Controllers\BackEnd;
    use\App\Http\Controllers\controller;
    use Illuminate\Database\Eloquent\Model;

    class BackEndController extends controller {

            protected $model;

        public function __construct(Model $model)
        {

            $this->model = $model;
        }

        public function index(){

            $users=$this->model;
            $users=$this->filter($users);
            $ttt=$this->with();
            if(!empty($ttt)){

                $users=$users->with($ttt);
            }
            $users=$users->paginate(10);

            $sModuleName=$this->getModelName();
            $moduleName=$this->pluralModelName();
            $routeName=$this->getClassNameFromModel();
            $pageTitle=$moduleName." control";
            $pageDes="Here you can add / Edit / Delete " .$moduleName;

            return view('back-end.'.$this->getClassNameFromModel().'.index',compact(
                'users',
                'pageTitle',
                'moduleName',
                'pageDes',
                'sModuleName',
                'routeName'
            ));
        }

        public function create(){

            $moduleName=$this->getModelName();
            $pageTitle="Create ".$moduleName;
            $pageDes="Here you can Create " .$moduleName;
            $folderName=$this->getClassNameFromModel();
            $routeName=$this->getClassNameFromModel();
            $append=$this->append();


            return view('back-end.'.$folderName.'.create',compact(
                'pageTitle',
                'moduleName',
                'pageDes',
                'folderName',
                'routeName'
            ))->with($append);
        }

        public function edit($id){

            $users =$this->model->FindOrFail($id);
            $moduleName = $this->getModelName();
            $pageTitle = "Edit " . $moduleName;
            $pageDes = "Here you can edit " .$moduleName;
            $folderName=$this->getClassNameFromModel();
            $routeName=$this->getClassNameFromModel();
            $append=$this->append();

            return view('back-end.' .$folderName. '.edit', compact(
                'users',
                'pageTitle',
                'moduleName',
                'pageDes',
                'folderName',
                'routeName'


            ))->with($append);
        }

        public function destroy ($id){
            $users = $this->model->FindOrFail($id);
            $users->delete();
            return redirect()->route($this->getClassNameFromModel().'.index');
        }


        public function filter($users) {
            return $users ;
        }

        protected function getClassNameFromModel(){
            return  strtolower($this->pluralModelName());
        }


        protected function pluralModelName(){

            return str_plural($this->getModelName());
        }

        protected function getModelName(){
            return class_basename($this->model);
        }

        protected function with(){

            return [];
        }


        protected function append (){

            return [];
        }
    }
