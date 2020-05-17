
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ asset('css/maindishsidedish.css') }}" rel="stylesheet">
</head>
<body>

 <div class="container">
  <div class="div1">
    <h3>Paradise Restaurant</h3>
    <ul>
        <li><a href="/admin/dashboard">Dashboard</a></li>
        <li><a href="/admin/orders">Orders</a></li>
        <li><a href="/admin/dailysale">Daily Sale</a></li>
        <li><a href="/admin/mainDishWithPopularSideDishes">Main Dish With Popular Side Dish</a></li>
      </ul>
  </div>
  <div class="div2">
    <div class="header">
      <div class="dropdown">
        <!-- <button class="dropbtn">Dropdown</button> -->
        <a href="" class="dropbtn">Menu</a>
        <div class="dropdown-content">
            <a href="/admin/dashboard">Dashboard</a>
            <a href="/admin/orders">Orders</a>
            <a href="/admin/dailysale">Daily Sale</a>
            <a href="/admin/mainDishWithPopularSideDishes">Main Dish With Popular Side Dish</a>
        </div>
      </div>
      <div class="logout">
          <a href="" class="myButton">Log Out</a>
      </div>

  </div>
  <div class="content">
      <h2>Main Dish With Side Dish</h2>
    <table id="customers">
      <tr>
        <th>Main Dish</th>
        <th>Side Dish</th>
      </tr>
      @if(count($data) > 0)
      @foreach($data as $d)
      <tr>
        <td>{{$d['mainDish']}}</td>
        <td>
            @php
              $i=1;
            @endphp

        @if(!empty($d['sideDishes']))
            @foreach($d['sideDishes'] as $side)
              @if($i=='1')
               {{$side->side_dish}}
              @else
              ,{{$side->side_dish}}
              @endif
              @php
              ++$i;
              @endphp
            @endforeach
        @else
            no data
        @endif
        </td>
      </tr>
      @endforeach
      @endif
    </table>
    @if(count($data) == 0)
    <p>No orders available</p>
    @endif
  </div>
  </div>
 </div>
</body>
</html>
