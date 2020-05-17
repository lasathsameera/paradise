
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ asset('css/dailysale.css') }}" rel="stylesheet">
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
    <h2>Daily Sales</h2>
      <div class="filter">
        <form method="GET" action="{{ route('admin.dailysale') }}">
            @csrf
      <label class="label">Start Date</label>
        <input type="text" class="field" name="startDate" @isset($startDate) value="{{$startDate}}" @endisset placeholder="eg: 2020-01-01">
      <label class="label">End Date</label>
      <input type="text" class="field" name="endDate" @isset($endDate) value="{{$endDate}}" @endisset placeholder="eg: 2020-01-30">
      <input type="submit" class="search" value="Submit">
        </form>
      </div>
    <table id="customers">
      <tr>
        <th>Main Dish Sale</th>
        <th>Side Dish Sale</th>
        <th>Dessert Sale</th>
        <th>Total Sale</th>
        <th>Date</th>
      </tr>
      @if(count($data) > 0)
      @foreach($data as $d)
      <tr>
        <td>{{$d->main_dish_sale}}</td>
        <td>{{$d->side_dish_sale}}</td>
        <td>{{$d->dessert_sale}}</td>
        <td>
            {{ $d->main_dish_sale+$d->side_dish_sale+$d->dessert_sale}}
        </td>
        <td>
          {{$d->date}}
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
