<form action="{{ route('dashboard.clients.update', $client->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <x-dashboard.form-input type="text" name="full_name" label="Full Name" class="col-md-6"
            :value="$client->full_name" />
        <x-dashboard.form-input type="text" name="phone" label="Phone Number" class="col-md-6"
            :value="$client->phone" />
        <x-dashboard.form-input type="text" name="password" label="Password" class="col-md-6"
            :value="$client->plain_password" />
        <x-dashboard.form-input type="text" name="address" label="Address" class="col-md-6" :value="$client->address" />

    </div>
    <button type="submit" class="btn btn-success float-right">Save</button>
</form>