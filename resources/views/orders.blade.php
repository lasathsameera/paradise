
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ asset('css/orders.css') }}" rel="stylesheet">
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
      <h2>Customers Orders</h2>
    <table id="customers">
      <tr>
        <th>Table Number</th>
        <th>Name</th>
        <th>Main Dish</th>
        <th>Side Dishes</th>
        <th>Desserts</th>
        <th>Action</th>
      </tr>
      @if(count($data) > 0)
      @foreach($data as $d)
      <tr>
        <td>{{$d['tableNumber']}}</td>
        <td>{{$d['name']}}</td>
        <td>{{$d['mainDish']}}</td>
        <td>
            @php
              $i=1;
            @endphp
            @foreach($d['sideDishes'] as $side)
              @if($i=='1')
               {{$side['side_dish']}}
              @else
              ,{{$side['side_dish']}}
              @endif
              @php
              ++$i;
              @endphp
            @endforeach
        </td>
        <td>
            @php
              $j=1;
            @endphp
            @foreach($d['desserts'] as $dessert)

            @if($j=='1')
            {{$dessert['dessert']}}
              @else
              ,{{$dessert['dessert']}}
              @endif
              @php
              ++$j;
              @endphp
            @endforeach
        </td>
        <td>
            <div class="logout">
                <a href="{{ route('admin.completeorder',$d['id']) }}" class="myButton">Done</a>
            </div>
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
