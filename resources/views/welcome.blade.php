<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <style>
    html,
    body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Raleway', sans-serif;
      font-weight: 100;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links>a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div id="app" class="wrapper">
  <form>
    <input  id="creditcheck" @click="query"  v-model="creditCheck"  true-value="Ja, UC"  false-value="" type="checkbox" />
   <button class="btn btn-success" style="margin-top:10px" @click.prevent="query">Search</button>
  </form>
      <ul>



        <li v-for="lender in lenders">
          @{{lender.lender}} - @{{lender.credit_check}}
        </li>

      </ul>


    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
  var app = new Vue({
        el: '#app',

        data: {
          lenders: [],
          creditCheck:[],
          message: 'hello world',
        },
        mounted() {
          axios.get('api/getdata')
            .then((response) => {
              this.lenders = response.data
            })
            .catch(function(error) {
              console.log(error);
            });
        },
        methods:{
          query(){

            axios.get('api/getdata?credit_check='+this.creditCheck)

              .then((response) => {
                this.lenders = response.data
              })
              .catch(function(error) {
                console.log(error);
              });
          },


        }
  });
</script>

</html>
