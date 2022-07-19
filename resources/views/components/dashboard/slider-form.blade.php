@php
$slider = $attributes['slider'];
@endphp

<form action="{{ route('dashboard.sliders.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $slider->id }}">
    <div class="row">
        <x-dashboard.form-input type="text" name="title_uz" label="Title Uz" class="col-md-6"
            :value="optional($slider->translate('uz'))->title" />
        <x-dashboard.form-input type="text" name="title_ru" label="Title Ru" class="col-md-6"
            :value="optional($slider->translate('ru'))->title" />
        <x-dashboard.form-textarea name="text_uz" label="Text Uz" class="col-md-6"
            :value="optional($slider->translate('uz'))->text" />
        <x-dashboard.form-textarea name="text_ru" label="Text Ru" class="col-md-6"
            :value="optional($slider->translate('ru'))->text" />
        <x-dashboard.form-input type="text" name="link" label="Link" class="col-md-12"
            :value="optional($slider)->link" />
        <x-dashboard.image-uploader name="photo" label="Photo"
            :default-image="asset('storage/slider/' . $slider->photo)" />
    </div>
    <button type="submit" class="btn btn-success float-right">Save</button>
</form>