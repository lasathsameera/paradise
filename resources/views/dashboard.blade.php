<html>
<head>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
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
        <a href="" class="dropbtn">MENU</a>
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
      <h2>Welcome to the Dashboard</h2>

      <div class="container">
        <div class="control-group1">
            <h3>Most Famous Main Dish</h3>

            @if(!empty($mostFamousMainDish))
            @php
              $i=1;
            @endphp
              @foreach($mostFamousMainDish as $mfd)
                @if($i=='1')
                {{$mfd->main_dish}}
                @else
                ,{{$mfd->main_dish}}
                @endif
                @php
                ++$i;
                @endphp
              @endforeach
              @endif
        </div>
        <div class="control-group2">
            <h3>Most Famous Side Dish</h3>
            @if(!empty($mostFamousMainDish))
            @php
              $j=1;
            @endphp
            @foreach($mostFamousSideDish as $msd)
            @if($j=='1')
            {{$msd->side_dish}}
              @else
              ,{{$msd->side_dish}}
              @endif
              @php
              ++$j;
              @endphp
            @endforeach
            @endif
        </div>
    </div>
  </div>
  </div>
 </div>
</body>
</html>
