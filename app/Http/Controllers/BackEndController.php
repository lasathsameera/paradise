<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use App\CustomerToMainDish;
use App\CustomerToSideDish;
use App\CustomerToDessert;
use App\MainDishToSideDish;
use App\DishesCount;
use App\DailySale;
use App\SideDishes;
use App\MainDishes;
use App\Desserts;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class BackEndController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){

          $mainDishCountData = DishesCount::where('type','main')->orderBy('count', 'DESC')->first();

          $mostFamousMainDishData = "";
          $mostFamousSideDishData = "";

          if(isset($mainDishCountData->count)){

            $mostFamousMainDishData = DishesCount::where('type','main')
                                   ->select('main_dish')
                                   ->leftJoin('main_dishes','dishes_count.dish_id', '=', 'main_dishes.id')
                                   ->where('count',$mainDishCountData->count)->get();

          }

        $mostFamousSideDishData = DishesCount::where('type','side')->orderBy('count', 'DESC')->first();

        if(isset($mostFamousSideDishData->count)){

            $mostFamousSideDishData = DishesCount::where('type','side')
            ->select('side_dish')
            ->leftJoin('side_dishes','dishes_count.dish_id', '=', 'side_dishes.id')
            ->where('count',$mostFamousSideDishData->count)->get();

        }

        return view('dashboard',array('mostFamousMainDish'=>$mostFamousMainDishData,'mostFamousSideDish'=>$mostFamousSideDishData));

    }

    public function orders(){ // all customers orders

        $data = array();

        $customers = Customers::where('status','1')->get();

       // dd($customers);

        foreach($customers as $customer){

            $mainDishData = CustomerToMainDish::select('main_dish')
            ->leftJoin('main_dishes', 'customer_to_main_dish.main_dish_id', '=', 'main_dishes.id')->where('customer_id',$customer->id)->first();
            $sideDishesData = CustomerToSideDish::select('side_dish')
            ->leftJoin('side_dishes', 'customer_to_side_dish.side_dish_id', '=', 'side_dishes.id')->where('customer_id',$customer->id)->get();
            $dessertsData = CustomerToDessert::select('dessert')
            ->leftJoin('desserts', 'customer_to_dessert.dessert_id', '=', 'desserts.id')->where('customer_id',$customer->id)->get();

            $data[] = array(

                'id' => $customer->id,
                'tableNumber' => $customer->table_id,
                'name' => $customer->name,
                'mainDish' => $mainDishData->main_dish,
                'sideDishes' => $sideDishesData,
                'desserts' => $dessertsData
            );

        }

        // dd($data)


        return view('orders')->with('data',$data);

    }
    public function completeorder($id){ //


        // start update wich side dish is combined with wich main dish

        $mainDishData = CustomerToMainDish::where('customer_id',$id)->first();
        $sideDishData = CustomerToSideDish::where('customer_id',$id)->get();
        $dessertsData = CustomerToDessert::where('customer_id',$id)->get();
        $dailySideDishSale = 0;
        $dailyDessertsSale = 0;

        foreach($sideDishData as $side){

             //start update wich side dish is combined with wich main dish

              $checkavailability = MainDishToSideDish::where('main_dish_id',$mainDishData->main_dish_id)
              ->where('side_dish_id',$side->side_dish_id)->first();

              if(isset($checkavailability->id)){  //update main_dish_to_side_dish table if already have a row

                $currentCount = $checkavailability->count;
                $newCount = $currentCount + 1;

                $mainToSide = MainDishToSideDish::find($checkavailability->id);

                $mainToSide->count = $newCount;

                $mainToSide->save();

              }else{ // create new row for main_dish_to_side_dish table


                $mainToSide = new MainDishToSideDish();
                $mainToSide->main_dish_id = $mainDishData->main_dish_id;
                $mainToSide->side_dish_id = $side->side_dish_id;
                $mainToSide->count = 1;
                $mainToSide->save();

              }

            //end update wich side dish is combined with wich main dish

            // **start side dish count update

              $checkSideDishAvailable = DishesCount::where('type','side')
                    ->where('dish_id',$side->side_dish_id)->first();

                    if(isset($checkSideDishAvailable->id)){

                    $newCount = $checkSideDishAvailable->count + 1;

                    $dishCount =  DishesCount::find($checkSideDishAvailable->id);
                    $dishCount->count = $newCount;
                    $dishCount->save();

                    }
                    if(!isset($checkSideDishAvailable->id)){

                    $dishCount =  new DishesCount();
                    $dishCount->type = 'side';
                    $dishCount->dish_id = $side->side_dish_id;
                    $dishCount->count = 1;
                    $dishCount->save();

                    }

              // **end side dish count update

              //start calculate side dishes daily sale

              $priceData = SideDishes::find($side->side_dish_id);

              $dailySideDishSale = $dailySideDishSale + $priceData->price;

              //end calculate side dishes daily sale
        }
            // **start main dish count update
                $checkMainDishAvailable = DishesCount::where('type','main')
                                            ->where('dish_id',$mainDishData->main_dish_id)->first();

                if(isset($checkMainDishAvailable->id)){

                $newCount = $checkMainDishAvailable->count + 1;

                $dishCount =  DishesCount::find($checkMainDishAvailable->id);
                $dishCount->count = $newCount;
                $dishCount->save();

                }
                if(!isset($checkMainDishAvailable->id)){

                    $dishCount =  new DishesCount();
                    $dishCount->type = 'main';
                    $dishCount->dish_id = $mainDishData->main_dish_id;
                    $dishCount->count = 1;
                    $dishCount->save();

                }
            // **end main dish count update

            $full = Carbon::now();
            $date = $full->toDateString();

            //start update daily sale

            foreach($dessertsData as $dessert){

                $dessertPriceData = Desserts::find($dessert->dessert_id);

                $dailyDessertsSale = $dailyDessertsSale + $dessertPriceData->price;
            }

            $mainDishPriceData = MainDishes::find($mainDishData->main_dish_id);
            $dailyMainDishSale = $mainDishPriceData->price;

            $dailySaleData =  DailySale::where('date',$date)->first();

            if(isset($dailySaleData->id)){

                $currentMainDishSale = $dailySaleData->main_dish_sale;
                $currentSideDishSale = $dailySaleData->side_dish_sale;
                $currentDessertsSale = $dailySaleData->dessert_sale;

                $dailySale = DailySale::find($dailySaleData->id);
                $dailySale->main_dish_sale = $currentMainDishSale + $dailyMainDishSale;
                $dailySale->side_dish_sale = $currentSideDishSale + $dailySideDishSale;
                $dailySale->dessert_sale = $currentDessertsSale + $dailyDessertsSale;
                $dailySale->date = $date;
                $dailySale->save();

            }

            if(!isset($dailySaleData->id)){

                $dailySale = new DailySale();
                $dailySale->main_dish_sale = $dailyMainDishSale;
                $dailySale->side_dish_sale = $dailySideDishSale;
                $dailySale->dessert_sale = $dailyDessertsSale;
                $dailySale->date = $date;
                $dailySale->save();

            }

             //end update daily sale

             $customer = Customers::find($id); // after order is delivery completed change the status
             $customer->status = 0;
             $customer->save();

             return redirect('/admin/orders');

    }

    public function dailysale(Request $request){ //daily sale report with filtering option

         $startDate = "";
         $endDate = "";
         $data = array();


        if(isset($request->startDate) && isset($request->endDate)){

            $startDate = $request->startDate;
            $endDate = $request->endDate;

            $data  = DailySale::whereBetween('date',[$request->startDate,$request->endDate])->get();

        }

        return view('dailysale',array('data'=>$data,'startDate'=>$startDate,'endDate'=>$endDate));

    }

    public function mainDishWithPopularSideDishes(){

        $data = array();

        $mainDishes = MainDishes::all();

        foreach($mainDishes as $mainDish){

            $countData = DB::table('main_dish_to_side_dish')
            ->select('count')
            ->where('main_dish_id',$mainDish->id)
            ->orderBy('count', 'DESC')->first();

            if(isset($countData->count)){
                   $maximumCount = $countData->count;
            }else{
                $maximumCount = "";
            }

            if(!empty($maximumCount)){

                $sideDishesData = DB::table('main_dish_to_side_dish')
                                ->leftJoin('side_dishes', 'main_dish_to_side_dish.side_dish_id', '=', 'side_dishes.id')
                                ->select('side_dish')
                                ->where('main_dish_id',$mainDish->id)->where('count',$maximumCount)->get();
            }
            if(empty($maximumCount)){

                $sideDishesData = "";

            }

            $data[] = array(

                'mainDish' => $mainDish->main_dish,
                'sideDishes' => $sideDishesData

            );

        }

        return view('mainDishToSideDish')->with('data',$data);

    }

}
