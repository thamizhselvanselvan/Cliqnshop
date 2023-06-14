<html>
   
   <head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
      <title>Order Details</title>
   </head>
   <h1 class="text-center">Order Details</h1>
   <br>
   <body>
      <table class = "table table-bordered yajra-datatable table-striped">
         <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Asin</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Currency</th>
            <th>Price</th>
            <th>Tax</th>
            <th>Tax Rate</th>
            <th>Order Date & Time</th>
            <th>XML Sent</th>
         </tr>
         @foreach ($orders as $order)
         <tr>
            <td>{{ $order->baseid }}</td>
            <td>{{ $order->editor }}</td>
            <td>{{ $order->prodcode }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->currencyid }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->tax }}</td>
            <td>{{ $order->taxrate }}</td>
            <td>{{ $order->mtime }}</td>
            <td><a class="btn btn-primary btn-sm" href="tmp_order/xml/{{ $order->id }}" target="_blank">View XML</a></td>
         </tr>
         @endforeach 
      </table>
   </body>
</html>