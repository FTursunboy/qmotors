<div>
    <form action="">
        <x-dashboard.form-select label="Model" name="model_id" option="name" :options="$models" />
        <x-dashboard.form-select label="User" name="user_id" option="full_name" :options="$users" />
        <div class="d-flex">
            <a class="btn btn-warning mr-auto" href="{{ url()->current() }}">Cancel</a>
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

</div>