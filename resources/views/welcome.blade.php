<!doctype html>
<html lang="en">
  <head>
    <title>Stripe Payment</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container my-5 w-25">
        <form action="{{route('checkout')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="pname">Product Name</label>
                <input type="text" name="pname" id="pname" class="form-control" placeholder="Product Name" required>
            </div>
            <div class="form-group">
                <label for="amount">Payment</label>
                <input type="number" name="amount" id="amount" class="form-control" placeholder="Product Price" required>
            </div>
            <button type="submit" class="btn btn-primary">Pay Now</button>
        </form>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>