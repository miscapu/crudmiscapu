<?php
/**
 * Class Main
 */
namespace App\Controllers;

use \CodeIgniter\Controller;
use \CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\GamesModel;

class Games extends Controller
{
    public function index( $page = 'Games' )
    {
        if ( ! is_file( APPPATH.'/Views/Pages/'.$page.'.php' ) ):
            throw new PageNotFoundException();
        endif;

        // Call Model
        $gamesModel = new GamesModel();

        $data = [
            'title'     =>  'Games',
            'games'     =>  $gamesModel->selectGames(),
        ];

        return view( 'Pages/Games', $data );
    }


    public function showFormAddGame()
    {

        helper( 'form' );
        $gamesModel = new GamesModel();

        $data = [
            'title'         =>  'Add Game',

            'inputNameAddGame'  =>
                [
                    'name'          =>  'name',
                    'id'            =>  'name',
                    'placeholder'   =>  'Your name: ',
                    'class'         =>  'form-control',
                    'value'         =>  old( 'name' ),
                    'type'          =>  'text'
                ],
            'inputDeveloperAddGame'  =>
                [
                    'name'          =>  'developer',
                    'id'            =>  'developer',
                    'placeholder'   =>  'Your developer: ',
                    'class'         =>  'form-control',
                    'value'         =>  old( 'developer' ),
                    'type'          =>  'text'
                ],
            'inputPriceAddGame'  =>
                [
                    'name'          =>  'price',
                    'id'            =>  'price',
                    'placeholder'   =>  'Your price: ',
                    'class'         =>  'form-control',
                    'value'         =>  old( 'price' ),
                    'type'          =>  'text'
                ],
            'inputSubmitAddGame'  =>
                [
                    'name'          =>  'submit',
                    'class'         =>  'btn btn-primary',
                    'type'          =>  'submit',
                    'value'         =>  true,
                    'content'       =>  'Submit'
                ],

            'errors'    =>  $gamesModel->getValidationRules(),

        ];

//        return view('Pages/AddGame', $data);

//        //2nd validation



      return view( 'Pages/AddGame', $data );
    }

    /**
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function addGame()
    {
        // Call Model
        $gamesModel = new GamesModel();

        // Validations
        if( $this->request->getMethod()==='post' && $this->validate( [

            'name'      =>
                [
                    'rules'     =>  'required|min_length[3]',
                    'errors'    =>
                        [
                            'required'      =>  'You must choose name',
                            'min_length'    =>  'You must choose length highest than 3',
                        ]
                ],
            'developer'      =>
                [
                    'rules'     =>  'required',
                    'errors'    =>
                        [
                            'required'      =>  'You must choose developer',
                        ]
                ],
            'price'      =>
                [
                    'rules'     =>  'required',
                    'errors'    =>
                        [
                            'required'      =>  'You must choose price',
                        ]
                ],


            ] ) )
        {
            $gamesModel->insertGame(
                [
                    'name'      =>  $this->request->getPost( 'name' ),
                    'developer'      =>  $this->request->getPost( 'developer' ),
                    'price'      =>  $this->request->getPost( 'price' ),
                ] );
            return redirect()->to( site_url( 'Games' ) );
        }else
            {
                return redirect()->back()->withInput();
            }


    }


    public function showFormEditGame( $id = null )
    {
        helper( 'form' );

        // call Model
        $gamesModel = new GamesModel();

        $data = [
            'title'     =>  'Edit Game',
            'gameEdit'      =>  $gamesModel->find( $id ),
            'inputNameEditGame'     =>  [
                'name' => 'name',
                'id' => 'name',
                'placeholder' => 'Your Name',
                'class' => 'form-control',
//                'value'=>old('name'),
                'type' => 'text'
            ],
            'inputDeveloperEditGame'     =>  [
                'name' => 'developer',
                'id' => 'developer',
                'placeholder' => 'Your developer',
                'class' => 'form-control',
//                'value'=>old('name'),
                'type' => 'text'
            ],
            'inputPriceEditGame'     =>  [
                'name' => 'price',
                'id' => 'price',
                'placeholder' => 'Your price',
                'class' => 'form-control',
//                'value'=>old('name'),
                'type' => 'text'
            ],
            'inputSubmitEditGame'     =>  [
                'name'          =>  'submitEdit',
                'class'         =>  'btn btn-primary',
                'type'          =>  'submit',
                'value'         =>  true,
                'content'       =>  'Submit'
            ],
            'erros'     => ''

        ];

//        $data['errors'] = $gamesModel->getValidationRules();
//
//        if ($gamesModel->save($data) === false) {
            return view( 'Pages/EditGame', $data );
//        }
    }


    public function editGame( $id = false )
    {
        helper( 'form' );



        $gamesModel = new GamesModel();

        $datas = [
            'name'      =>  $this->request->getPost( 'name' ),
            'developer'      =>  $this->request->getPost( 'developer' ),
            'price'     =>  $this->request->getPost( 'price' ),

        ];

        if ( $this->request->getMethod() === 'post' )
        {
            $gamesModel->updateGame( $id, $datas );
        }else{
//            return $data['errors'] = $gamesModel->getValidationRules();
            //return view( 'Pages/EditGame', $data );
//            return view('Pages/EditGame', ['errors' => $gamesModel->errors()]);
            return $data['errors'] = $gamesModel->validationRules;
            //return view( 'Pages/EditGame', $data );

        }


    }


    public function removeGame( $id )
    {
        $gamesModel = new GamesModel();

        $gamesModel->deleteGame( $id );

        return redirect()->to( site_url( 'Games' ) );
    }



}