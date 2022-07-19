<form action="" method="POST">
    @csrf
    <x-dashboard.form-input2 type="number" label="Min Order Price" name="min_price" col-label="2" col-input="10"
        :value="$setting->min_price" />
    <x-dashboard.form-input2 type="number" label="Discount" name="discount" col-label="2" col-input="10"
        :value="$setting->discount" />
    <x-dashboard.form-input2 type="text" label="Work Time" name="time" col-label="2" col-input="10"
        :value="$setting->time" />
    <x-dashboard.form-input2 type="tel" label="Phone" name="phone" col-label="2" col-input="10"
        :value="$setting->phone" />
    <x-dashboard.form-input2 type="email" label="Email" name="email" col-label="2" col-input="10"
        :value="$setting->email" />
    <x-dashboard.form-input2 type="text" label="Address" name="address" col-label="2" col-input="10"
        :value="$setting->address" />
    <x-dashboard.form-input2 type="text" label="Twitter" name="twitter" col-label="2" col-input="10"
        :value="$setting->twitter" />
    <x-dashboard.form-input2 type="text" label="Instagram" name="instagram" col-label="2" col-input="10"
        :value="$setting->instagram" />
    <x-dashboard.form-input2 type="text" label="Facebook" name="facebook" col-label="2" col-input="10"
        :value="$setting->facebook" />
    <x-dashboard.form-input2 type="text" label="Google" name="google" col-label="2" col-input="10"
        :value="$setting->google" />
    <x-dashboard.form-input2 type="text" label="Linkedin" name="linkedin" col-label="2" col-input="10"
        :value="$setting->linkedin" />
    <x-dashboard.form-textarea2 type="text" label="About" name="about" col-label="2" col-input="10"
        :value="$setting->about" />
    <button type="submt" class="btn btn-success float-right">Save</button>
</form>