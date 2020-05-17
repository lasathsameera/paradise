<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use App\CustomerToMainDish;
use App\CustomerToSideDish;
use App\CustomerToDessert;
use App\MainDishes;
use App\SideDishes;
use App\Desserts;

class FrontEndController extends Controller
{

    public function createOrder(){

        $mainDishes = MainDishes::where('status','1')->get();
        $sideDishes = SideDishes::where('status','1')->get();
        $desserts = Desserts::where('status','1')->get();

        return view('orderForm',array('mainDishes'=>$mainDishes,'sideDishes'=>$sideDishes,'desserts'=>$desserts));

    }

    public function storeOrder(Request $request){ // store customers order

        $customer = new Customers(); // store customer data

        $customer->table_id  = $request->tableNumber;
        $customer->name  = $request->name;
        $customer->save();

        $customerData = Customers::where('table_id',$request->tableNumber)->where('name',$request->name)->first();
        $customerId = $customerData->id;

        $mainDish = new CustomerToMainDish(); // store customer main dish data

        $mainDish->customer_id  = $customerId;
        $mainDish->main_dish_id  = $request->mainDish;
        $mainDish->save();

        $sideDishArray = $request->sideDish;

        if(count($sideDishArray) > 1){ // if customer select multiple side dishes

            for($i=0;$i < count($sideDishArray);$i++){

                $sideDish = new CustomerToSideDish(); // store customer side dish data

                $sideDish->customer_id  = $customerId;
                $sideDish->side_dish_id  = $sideDishArray[$i];
                $sideDish->save();

            }
        }

        if(count($sideDishArray) == 1){ // if customer select only one side dishe

            $sideDish = new CustomerToSideDish(); //store side dish data

            $sideDish->customer_id  = $customerId;
            $sideDish->side_dish_id  = $sideDishArray[0];
            $sideDish->save();

        }

        $dessertsArray = $request->dessert;

        if(isset($request->dessert) && count($dessertsArray) > 1){ // if customer select multiple desserts

            for($i=0;$i < count($dessertsArray);$i++){

                $dessert = new CustomerToDessert(); // store customer desserts data

                $dessert->customer_id  = $customerId;
                $dessert->side_dish_id  = $dessertsArray[$i];
                $dessert->save();

            }
        }
        if(isset($request->dessert) && count($dessertsArray) == 1){ // if customer select only one desserts

            $dessert = new CustomerToDessert(); //store desserts data

            $dessert->customer_id  = $customerId;
            $dessert->dessert_id  = $dessertsArray[0];
            $dessert->save();

        }

        return redirect('/frontmessage');

    }

    public function getWindowIdx($numberOfPeriods,$currentMonth){


        $breakPoints = array();
        $start = 12/$numberOfPeriods;
        $wndow = -1;

        for($i=0;$i < $numberOfPeriods;$i++){ //identify breakpoint and push to array

            if($i==0){
                $breakPoints[$i] = $start;
            }else{

                $preViousVal = $breakPoints[$i-1];
                $newVal = $preViousVal + $start;
                $breakPoints[$i] = $newVal;
            }

        }

        for($j=0;$j < count($breakPoints); $j++){ //check matching interval for currentMonth

            if($currentMonth <= $breakPoints[$j]){
                $wndow = $j;
                break;
            }

        }

        return $wndow;

    }

    public function run(){

        for($m=-5;$m<=15;$m++){

            $noOfPeriods = 12;
            $currentMonth = $m;
            echo "<p>currentMonth=$currentMonth  :noOfPeriods=$noOfPeriods :window=".$this->getWindowIdx($noOfPeriods,$currentMonth)."</p>";

        }
    }

}

