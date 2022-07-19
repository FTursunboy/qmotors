<x-dashboard.form-input type="file" :name="$attributes['name']" :label="$attributes['image']" class="col-md-12" />
<div class="col-md-12">
    <img id="preview-image-before-upload" src="{{$attributes['default-image']}}" alt="preview image"
        style="max-height: 200px;">
</div>

<script src="{{ asset('/frontend/js/jquery-3.5.1.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function (e) {
       $("#{{ $attributes['name'] }}-id").change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
          $('#preview-image-before-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
       });
    });

</script>