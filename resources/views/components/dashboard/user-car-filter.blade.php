<div>
    <form action="">
        <x-dashboard.form-select label="Model" name="model_id" option="name" :options="$models" />
        <x-dashboard.form-select label="User" name="user_id" option="full_name" :options="$users" />
        <button class="btn btn-primary w-100">Filter</button>
    </form>

</div>