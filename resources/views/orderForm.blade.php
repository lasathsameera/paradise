
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="choose your favourite food">
  <meta name="author" content="">

  <title>Paradise Restaurant - Order Form</title>

  <link href="{{ asset('css/orderform.css') }}" rel="stylesheet">

</head>
<body>
        <div class="outer1">
         <h2>Order Form</h2>
         <div class="main-container1">
            <form method="POST" action="{{ route('storeOrder') }}" id="order_form">
                @csrf
            <div class="row">
              <div class="col-25">
                <label class="label" for="fname">Table Number</label>
              </div>
              <div class="col-75">
                <input class="field" type="number" size="6" min="1" max="99" name="tableNumber" placeholder="Your table number.." required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label class="label" for="lname">Name</label>
              </div>
              <div class="col-75">
                <input class="field" type="text"  name="name" placeholder="Your name.." required>
              </div>
            </div>
          </div>
                <div class="container">
                    <div class="control-group">
                        <h2>Main Dish</h2>

                        @foreach($mainDishes as $main)
                        <label class="control control--radio">{{$main->main_dish}}
                          <input type="radio" name="mainDish" value="{{$main->id}}" required />
                          <div class="control__indicator"></div>
                        </label>
                        @endforeach

                      </div>
                <div class="control-group">

                    <h2>Side Dishes</h2>
                    @foreach($sideDishes as $side)

                    <label class="control control--checkbox">{{$side->side_dish}}
                        <input type="checkbox" name="sideDish[]" value="{{$side->id}}" />
                        <div class="control__indicator"></div>
                    </label>

                    @endforeach
                    <p class="warning" id="warning">select your side dish</p>
                  </div>
                  <div class="control-group">
                    <h2>Desserts</h2>
                    @foreach($desserts as $dessert)
                    <label class="control control--checkbox">{{$dessert->dessert}}
                      <input type="checkbox" name="dessert[]" value="{{$dessert->id}}" />
                      <div class="control__indicator"></div>
                    </label>
                    @endforeach
                  </div>
                </div>
                <div class="main-container2">
                  <div class="row">
                    <input class="submit" type="button" value="Submit" onclick="validate()">
                  </div>
                </div>
                <form>
        </div>

        <script>

function validate() {

  var checkbox1= document.querySelector('input[name="sideDish[]"]:checked');
  var x = document.getElementById("warning");

  if(!checkbox1) {

    x.style.display = "block";
    return false;

  }else{

    x.style.display = "none";
    document.getElementById("order_form").submit();
  }

}
        </script>
</body>

</html>

