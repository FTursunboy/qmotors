@php
$product = $attributes['product'];
@endphp

<form action="{{ route('dashboard.products.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="row">
        <x-dashboard.form-input type="text" name="name_uz" label="Name Uz" class="col-md-6"
            :value="optional($product->translate('uz'))->name" />
        <x-dashboard.form-input type="text" name="name_ru" label="Name Ru" class="col-md-6"
            :value="optional($product->translate('ru'))->name" />
        <x-dashboard.form-textarea name="description_uz" label="Description Uz" class="col-md-6"
            :value="optional($product->translate('uz'))->description" />
        <x-dashboard.form-textarea name="description_ru" label="Description Ru" class="col-md-6"
            :value="optional($product->translate('ru'))->description" />
        <x-dashboard.form-input type="number" name="price" label="Price (UZS)" class="col-md-12"
            :value="optional($product)->price" />
        <x-dashboard.image-uploader name="photo" label="Photo"
            :default-image="asset('storage/product/' . $product->photo)" />
    </div>
    <button type="submit" class="btn btn-success float-right">Save</button>
</form>