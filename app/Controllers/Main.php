<?php
/**
 * Class Main
 */
namespace App\Controllers;

use \CodeIgniter\Controller;
use \CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\GamesModel;

class Main extends Controller
{
    public function index( $page = 'Dashboard' )
    {
        if ( ! is_file( APPPATH.'/Views/Pages/'.$page.'.php' ) ):
            throw new PageNotFoundException();
            endif;

        // Call Model
        $gamesModel = new GamesModel();

        $data = [
            'title'     =>  'Dashboard',
            'games'     =>  $gamesModel->selectGames(),
        ];

        return view( 'Pages/Dashboard', $data );
    }
}