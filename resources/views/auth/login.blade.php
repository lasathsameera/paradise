
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="choose your favourite food">
  <meta name="author" content="">

  <title>Paradise Restaurant - Order Form</title>

  <style>

html,
body {
  height: 100%;
}
body {
  background: #e6e6e6;
  font-family: 'Source Sans Pro', sans-serif;
}
.container {
  width: 100%;
  height: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}
h1 {
  font-family: 'Alegreya Sans', sans-serif;
  font-weight: 300;
  margin-top: 0;
}
.control-group {
  display: inline-block;
  vertical-align: top;
  background: #fff;
  text-align: left;
  box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  padding: 30px;
  width: 200px;
  height: 300px;
  margin: 10px;
}
.control {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 15px;
  cursor: pointer;
  font-size: 18px;
}
.control input {
  position: absolute;
  z-index: -1;
  opacity: 0;
}
.control__indicator {
  position: absolute;
  top: 2px;
  left: 0;
  height: 20px;
  width: 20px;
  background: #e6e6e6;
}
.control--radio .control__indicator {
  border-radius: 50%;
}
.control:hover input ~ .control__indicator,
.control input:focus ~ .control__indicator {
  background: #ccc;
}
.control input:checked ~ .control__indicator {
  background: #2aa1c0;
}
.control:hover input:not([disabled]):checked ~ .control__indicator,
.control input:checked:focus ~ .control__indicator {
  background: #0e647d;
}
.control input:disabled ~ .control__indicator {
  background: #e6e6e6;
  opacity: 0.6;
  pointer-events: none;
}
.control__indicator:after {
  content: '';
  position: absolute;
  display: none;
}
.control input:checked ~ .control__indicator:after {
  display: block;
}
.control--checkbox .control__indicator:after {
  left: 8px;
  top: 4px;
  width: 3px;
  height: 8px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}
.control--checkbox input:disabled ~ .control__indicator:after {
  border-color: #7b7b7b;
}
.control--radio .control__indicator:after {
  left: 7px;
  top: 7px;
  height: 6px;
  width: 6px;
  border-radius: 50%;
  background: #fff;
}
.control--radio input:disabled ~ .control__indicator:after {
  background: #7b7b7b;
}
.select {
  position: relative;
  display: inline-block;
  margin-bottom: 15px;
  width: 100%;
}
.select select {
  display: inline-block;
  width: 100%;
  cursor: pointer;
  padding: 10px 15px;
  outline: 0;
  border: 0;
  border-radius: 0;
  background: #e6e6e6;
  color: #7b7b7b;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
}
.select select::-ms-expand {
  display: none;
}
.select select:hover,
.select select:focus {
  color: #000;
  background: #ccc;
}
.select select:disabled {
  opacity: 0.5;
  pointer-events: none;
}
.select__arrow {
  position: absolute;
  top: 16px;
  right: 15px;
  width: 0;
  height: 0;
  pointer-events: none;
  border-style: solid;
  border-width: 8px 5px 0 5px;
  border-color: #7b7b7b transparent transparent transparent;
}
.select select:hover ~ .select__arrow,
.select select:focus ~ .select__arrow {
  border-top-color: #000;
}
.select select:disabled ~ .select__arrow {
  border-top-color: #ccc;
}

.field {
  width: 80%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  margin-right: 10px;
}

.label {
  padding: 12px 5px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 5%;
}

input[type=submit]:hover {
  background-color: #45a049;
} */

.main-container1, .main-container1 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-top:3%;
  margin-left:25%;
  border: 1px solid #ccc;
  float: left;
  width: 50%;
  text-align: center;
  color: #18ab29;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.outer {

  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-top:3%;
  margin-left:25%;
  border: 1px solid #ccc;
  float: left;
  width: 10%;
  text-align: center;
  color: #18ab29;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
/* @media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {

    width: 100%;
    margin-top: 3%;
  }
}

@media screen and (max-width: 1200px) {
    .container {
    width:87%;
    margin-left:6.5%;
  }
} */

* {
  box-sizing: border-box;
}


.outer1 {

    background-color:  #ccc;
    padding: 40px;
    width: 50%;
    margin-left: 25%;
    margin-top: 10%;
    text-align: center;
}

    </style>

</head>
<body>
        <div class="outer1">
         <h2>Paradise Admin</h2>
         <div class="main-container1">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
            <div class="row">
              <div class="col-25">
                <label class="label" for="fname">Email</label>
              </div>
              <div class="col-75">
                <input id="email" type="email" class="field" name="email" value="{{ old('email') }}" required autofocus>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label class="label" for="lname">Password</label>
              </div>
              <div class="col-75">
                <input id="password" type="password" class="field" name="password" required>
              </div>
            </div>
          </div>
                <div class="main-container2">
                  <div class="row">
                    <input type="submit" value="Submit">
                  </div>
                </div>
                <form>
        </div>
</body>

</html>

