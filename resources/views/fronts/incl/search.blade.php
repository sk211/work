 @push('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 @endpush

 {{-- <form action="{{ url('autosearch') }}" method="post"> --}}
 <form action="{{ url('search') }}" method="get">
                            @csrf
    <div class="input-group mb-3">
        <div class="input-group" style="border: 1px solid #35A3D3">
            <input type="text" name="query" class="form-control">
            <div class="input-group-append">
                <button type="type" class="btn btn-outline-secondary"><i class="fas fa-search text-grey" aria-hidden="true"></i></button> 
            </div>
        </div>

</form>

@push('js')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 $(document).ready(function() {
    $( "#search" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: "{{url('autocomplete')}}",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    //console.log(obj.city_name);
                    return obj.name;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
 
</script>
@endpush