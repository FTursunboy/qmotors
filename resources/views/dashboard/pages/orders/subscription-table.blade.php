@extends('dashboard.layouts.default')

@section('title', 'Subscription Orders')
@section('content')

<!-- begin panel -->
<x-dashboard.panel title="One Time Orders">
    <div class="table-responsive">
        <table id="myTable" class="table table-bordered w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Consumer</th>
                    <th>Phone</th>
                    <th>Products</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Next Delivery Date</th>
                    <th>Delivery Time</th>
                    <th>Address</th>
                    <th>Instruction</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</x-dashboard.panel>
<!-- end panel -->
@endsection

@push('scripts')
<script>
    $(function () {
      $('#myTable').DataTable({
          order: [
              [0, "desc"]
          ],
          processing: true,
          serverSide: true,
          ajax: "{{ url('dashboard/orders/subscription/data') }}",
          columns: [{
                  data: 'id',
                  name: 'id'
              },
              {
                  data: 'client',
                  name: 'client',
                  orderable: false
              },
              {
                  data: 'phone',
                  name: 'phone',
                  orderable: false
              },
              {
                  data: 'products',
                  name: 'products',
                  orderable: false
              },
              {
                  data: 'totalPrice',
                  name: 'totalPrice',
                  orderable: false
              },
              {
                  data: 'status',
                  name: 'status'
              },
              {
                  data: 'deliveryDate',
                  name: 'deliveryDate',
                  orderable: false
              },
              {
                  data: 'delivery_time',
                  name: 'delivery_time',
                  orderable: false
              },
              {
                  data: 'address',
                  name: 'address',
                  orderable: false
              },
              {
                  data: 'instructions',
                  name: 'instructions',
                  orderable: false
              },
              {
                  data: 'created_at',
                  name: 'created_at',
                  orderable: false
              },
              {
                  data: 'actions',
                  name: 'actions',
                  orderable: false
              },
          ]
      });
  });
</script>
@endpush