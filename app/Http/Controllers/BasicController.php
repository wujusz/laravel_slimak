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
        $m = 0;
        $n = 0;
        $rows--;
        $cols--;
        
        echo 'Rezultal: ';
        
        while ($m <= $rows && $n <= $cols) {
            for ($i = $n; $i <= $cols; ++$i) {
                print($array[$m][$i] . ' ');
            }
            $m++;
            for ($i = $m; $i <= $rows; $i++) {
                print($array[$i][$cols] . ' ');
            }
            $cols--;
            for ($i = $cols; $i >= $n; $i--) {
                print($array[$rows][$i] . ' ');
            }
            $rows--;
            for ($i = $rows; $i >= $m; $i--) {
                print($array[$i][$n] . ' ');
            }
            $n++;
        }
    }
    
}
