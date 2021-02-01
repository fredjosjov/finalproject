@extends('layouts.app2')

@section('content')
<style type="text/css">
  .star-rating__stars {
    position: relative;
    height: 5rem;
    width: 25rem;
    background: url(off.svg);
    background-size: 5rem 5rem;
  }

  .star-rating__label {
    position: absolute;
    height: 100%;
    background-size: 5rem 5rem;
  }

  .star-rating__input {
    margin: 0;
    position: absolute;
    height: 1px;
    width: 1px;
    overflow: hidden;
    clip: rect(1px, 1px, 1px, 1px);
  }

  .star-rating__stars .star-rating__label:nth-of-type(1) {
    z-index: 5;
    width: 20%;
  }

  .star-rating__stars .star-rating__label:nth-of-type(2) {
    z-index: 4;
    width: 40%;
  }

  .star-rating__stars .star-rating__label:nth-of-type(3) {
    z-index: 3;
    width: 60%;
  }

  .star-rating__stars .star-rating__label:nth-of-type(4) {
    z-index: 2;
    width: 80%;
  }

  .star-rating__stars .star-rating__label:nth-of-type(5) {
    z-index: 1;
    width: 100%;
  }

  .star-rating__input:checked+.star-rating__label,
  .star-rating__input:focus+.star-rating__label,
  .star-rating__label:hover {
    background-image: url(on.svg);
  }

  .star-rating__label:hover~.star-rating__label {
    background-image: url(off.svg);
  }

  .star-rating__input:focus~.star-rating__focus {
    position: absolute;
    top: -.25em;
    right: -.25em;
    bottom: -.25em;
    left: -.25em;
    outline: 0.25rem solid lightblue;
  }
</style>
<div class="row bg-title">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Shipping</h4>
  </div>
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
      <li><a href="#">Dashboard</a></li>
      <li class="active">Shipping</li>
    </ol>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /row -->
<div class="row">
  <div class="col-md-12">
    <div class="white-box">
      <div class="table-responsive">
        <table class="table table-striped" id="myTable">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Photo</th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Ship Address</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($shipping as $p)
            <tr>
              <td>{{ $p->order_id }}</td>
              <td> <img src="{{ $p->image }}" alt="iMac" width="80"> </td>
              <td>{{ $p->name }}</td>
              <td>{{ $p->quantity }}</td>
              <td>{{ $p->ship_address}}</td>
              <td>{{ $p->status }}</td>
              <td>
                @if($p->status == "Delivered")
                <a onclick="feedbackPopUp({{ $p->product_id }})" class="btn btn-primary">Feedback</a>
                @else
                <a href="/shipping/changeStatus/{{ $p->shipping_id }}/{{ $p->product_id }}/{{$p->order_id}}" class="btn btn-success" onclick="return confirm('Are you sure you want to change this item status to Delivered?');">Delivered</a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->
<div class="modal fade" id="modalForm" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="labelModalKu">Feedback</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <p class="statusMsg"></p>
        <form role="form">
          <input type="hidden" name="product_id" id="product_id">
          <fieldset class="star-rating">
            <legend class="star-rating__title">Your rating:</legend>
            <div class="star-rating__stars">
              <input class="star-rating__input" type="radio" name="rating" value="1" id="rating-1" />
              <label class="star-rating__label" for="rating-1" aria-label="One"></label>
              <input class="star-rating__input" type="radio" name="rating" value="2" id="rating-2" />
              <label class="star-rating__label" for="rating-2" aria-label="Two"></label>
              <input class="star-rating__input" type="radio" name="rating" value="3" id="rating-3" />
              <label class="star-rating__label" for="rating-3" aria-label="Three"></label>
              <input class="star-rating__input" type="radio" name="rating" value="4" id="rating-4" />
              <label class="star-rating__label" for="rating-4" aria-label="Four"></label>
              <input class="star-rating__input" type="radio" name="rating" value="5" id="rating-5" />
              <label class="star-rating__label" for="rating-5" aria-label="Five"></label>
              <div class="star-rating__focus"></div>
            </div>
          </fieldset>
          <br>
          <div class="form-group">
            <label>Remark</label>
            <textarea class="form-control" name="description" id="description" placeholder="Description" rows="4" cols="50"></textarea>
          </div>
        </form>
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary submitBtn" onclick="saveFeedback()" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection
<script type="text/javascript">
  function saveFeedback() {
    var product_id = $("#product_id").val();
    var description = $('#description').val();
    var rate = $("input:radio[name=rating]:checked").val();

    dataVal = 'product_id=' + product_id + '&rate=' + rate + '&description=' + description;

    $.ajax({
      url: '/shipping/saveFeedback',
      type: 'POST',
      data: dataVal,
      cache: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(record) {
        //window.location.href = '/shipping';
        alert("Feedback Received successfully!");
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert('Failed to add feedback!');
        console.log(xhr.responseText);
      }
    });
  }

  function feedbackPopUp(id) {
    $("#description").val('');
    $('input[name="rating"]').prop('checked', false);
    $("#product_id").val(id);
    $('#modalForm').modal('toggle');
  }
</script>