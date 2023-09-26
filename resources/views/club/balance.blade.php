@extends('layouts.app')

@section('content')
  <div class="right-panel p-4">
    <div class="d-flex pb-4">
      <div class="flex-grow-1 d-flex align-items-center">
        <h2 class="text-uppercase mb-0 me-4">Balance</h2>
      </div>
    </div>
    @if (Session::has('error'))
      <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    @if (empty($customer))
      <div class="col-md-12 mt-5 pt-5 text-center">
        <a href="javascript:void(0)" onclick="checkStripeAccount()" class="btn button btn3 add-btn">Sign Into Stripe</a>
        <p class="p-4" id="creat_account_msg" style="display: none;">Stripe Account Created Successfully!</p>
        <p class="p-4" id="check_account_exist_msg" style="display: none;">Stripe Account Already Exist!</p>
      </div>
    @else
      @if (!empty($customer))
        <table class="table-striped table">
          <thead>
            <tr>
              <th scope="col">Name (#Stripe_id)</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Balance</th>
            </tr>
          </thead>
          <tbody>
            <td>{{ ucwords($customer->name) }} {{ '(#' . $customer->id . ')' }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ !empty($customer->phone) ? $customer->phone : '-' }}</td>
            <td>{{ $customer->balance }}</td>
            <td></td>
            <td></td>
          </tbody>
        </table>
      @endif
    @endif
  </div>

  </div>
@endsection
@section('script')
  <script>
    function checkStripeAccount() {
      jQuery.noConflict();
      $.ajax({
        type: "get",
        url: "{{ route('club.check_stripe_account') }}",
        success: function(data) {
          if (data.status == true) {
            $('#creat_account_msg').show();
          }
          setTimeout(function() {
            window.location.reload();
          }, 2000);
        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          alert('Error: ' + err.Message);
        }
      });
    }
  </script>
@endsection
