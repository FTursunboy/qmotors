<form action="{{ route('dashboard.delivery-times.store') }}" method="POST">
    @csrf
    <x-dashboard.form-input2 type="text" label="Time" name="value" col-label="2" col-input="10" />
    <button type="submt" class="btn btn-success float-right">Save</button>
</form>