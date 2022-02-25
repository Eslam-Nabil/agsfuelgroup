@include('includes.header')
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
   add Form
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('addform') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Form Name</label>
                    <input type="text" name="form_name" class="form-control" id="form_name" placeholder="Form name">
                  </div>
                    {{-- <input type="hidden" name="form_id" class="form-control" id="form_id" placeholder="Form name" value="{{ $formid }}"> --}}

                  <hr style="border-width:10px;color:black">
                <div id="fields">
                <div class="form-group">
                  <label for="exampleInputEmail1">Field Name</label>
                  <input type="text" name="field_name0" class="form-control" id="field_name0" placeholder="Field name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Field Lable</label>
                    <input type="text" name="field_lable0" class="form-control" id="field_lable0" placeholder="Field lable">
                  </div>
                </div>
                <button id="addfield" type="button" class="btn btn-success">Add Field</button>

          <select name="category_id" class="form-control">
            @foreach ($catdata as $cat )
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
          </select>
          <button type="submit" class="btn btn-default">Save</button>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<br>
<br>
<br>
<div class="container">
@foreach ($forms as $form )
    <div class="col-md-6">
        <a class="btn btn-primary" role="button" data-toggle="collapse" href="#form{{ $form->id }}" aria-expanded="false" aria-controls="collapseExample">
           {{  $form->name }}
        </a>
    </div>
    @endforeach

</div>
<div class="container">
    @foreach ($forms as $form )
    <div class="col-md-6">
    <div class="collapse" id="form{{ $form->id }}">
        <div class="well">
            <div class="container">
                <div class="row">
                <div class="col-md-4">
                        @php
                        $c=0;
                    @endphp
                        @foreach ($fieldsform as $f )

                        @if($f->form_id == $form->id)
                        @php
                        $c++;
                        @endphp
                        <label for="exampleInputEmail1">Field {{ $c }} Lable</label>
                        <p>{{ $f->field_lable }} </p>
                        <label for="exampleInputEmail1">Field{{ $c }} Key</label>
                        <p>{{ $f->field_key }} </p>
                        <hr style="border-width:10px;color:black">
                        @endif
                        <div class="clearfix"></div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
{{-- <pre> --}}
{{-- @foreach ($fieldsform as $f )
{{ $f->form_id }}
<br>
{{ $f->id }}
<br>
{{ $f->field_id }}
<br>
@endforeach --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        var counter=0;
        $( "#addfield" ).click(function() {
            counter++;
        $('#fields').append('<div class="form-group"><label for="exampleInputEmail1">Field Name</label><input type="text" name="field_name'+counter+'" class="form-control" id="field_name" placeholder="Field name"></div>');
        $('#fields').append('<div class="form-group"><label for="exampleInputEmail1">Field Lable</label><input type="text" name="field_lable'+counter+'" class="form-control" id="field_lable" placeholder="Field lable"></div></div>');
        });
        </script>
  </body>
</html>
