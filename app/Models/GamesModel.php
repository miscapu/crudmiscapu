<?php
/**
 * Class GamesModel
 */
namespace App\Models;

use \CodeIgniter\Model;

class GamesModel extends Model
{
    // Declare variables
    /**
     * @var string $table
     */
    protected $table = 'tb_games';
    /**
     *
     */
    protected $primaryKey = 'id';

    /**
     * @var array $allowedfields
     */
    protected $allowedFields = [
        'name', 'developer', 'price'
    ];

//    protected $returnType = 'object';

    /**
     * Validation
     */
//    protected $validationRules = [
//        'name'  =>  'required',
//        'developer'  =>  'required',
//        'price'  =>  'required',
//    ];
    protected $validationRules    = [
        'name'     => 'required',
        'developer'        => 'required',
        'price'     => 'required',
    ];

    /**
     * @param false $id
     * @return array
     */
    public function selectGames( $id = false )
    {
        if ( $id === false ):
            return $this->findAll();
            endif;
        return $this->asArray()
                    ->where( [ 'id'=>$id ] )
                    ->$this->first();
    }


    public function insertGame( $game )
    {
        $this->db->table( $this->table )->insert( $game );
    }


    public function updateGame( $id, $game )
    {
        $this->db->table( $this->table )->where( 'id', $id )->update( $game );
    }


    public function deleteGame( $id )
    {
        $this->db->table( $this->table )->where( 'id', $id )->delete();
    }

}