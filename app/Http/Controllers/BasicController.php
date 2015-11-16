<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasicController extends Controller {

    public function index() {
        return view('basic.index');
    }

    public function createArray(Request $request) {
        $rows = $request->input('rows');
        $cols = $request->input('cols');
        return view('basic.createArray', compact('rows', 'cols'));
    }

    public function resultArray(Request $request) {
        $params = $request->all();
        $cols = $request->input('cols');
        $rows = $request->input('rows');
        $array1 = $array = array();
        $index = 0;
        foreach ($params as $key => $value) {
            if (!in_array($key, array('rows', 'cols', '_token'))) {

                print($value . ' ');
                $array[] = $value;
                $index++;

                if ($index == $cols) {
                    echo '<br />';
                    $array1[] = $array;
                    $index = 0;
                    $array = array();
                }
            }
        }
        echo '<br />';
        $this->_spiral($rows, $cols, $array1);
    }

    private function _spiral($rows, $cols, array $array) {

        $offset = 0;
        
        echo 'Rezultal: ';
        
        while($offset < $rows){

            for($col = $offset; $col < $cols; $col++){
                print($array[$offset][$col]. ' ');
            }

            if($offset == $rows - 1) break;
            $cols--;
            for($row = $offset+1; $row < $rows; $row++){
                print($array[$row][$cols]. ' ');
            }
            
            $rows--;
            for($col = $cols - 1; $col > $offset; $col--){
                print($array[$rows][$col]. ' ');
            }
            
            for($row = $rows; $row > $offset; $row--){
                print($array[$row][$offset]. ' ');
            }
            
            $offset++;
        }
    }
    
}
