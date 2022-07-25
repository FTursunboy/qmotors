<div class="{{ $attributes['class'] }}">
  <div class="media media-lg">
    <div class="media-body">
      <x-dashboard.form-input type="file" :name="$attributes['name']" :label="$attributes['label']" />
    </div>
    <div class="media-right">
      <img id="preview-image-before-upload" src="{{$attributes['default-image']}}" alt="preview image"
        class="media-object rounded" onerror="this.onerror=null; this.style.display = 'none';">
    </div>
  </div>
</div>


@push('scripts')
<script>
  $(document).ready(function (e) {
      $("#{{ $attributes['name'] }}-id").change(function () {
          let reader = new FileReader();
          reader.onload = (e) => {
              $('#preview-image-before-upload').attr('src', e.target.result);
              $('#preview-image-before-upload').show();
          }
          reader.readAsDataURL(this.files[0]);
      });
  });
</script>
@endpush