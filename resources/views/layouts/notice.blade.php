@if(\Illuminate\Support\Facades\Session::get('success'))
    <div class="alert alert-success fade in col-md-8" style="margin-left:18%;">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
        </button>
        <strong>Success!</strong> {{ \Illuminate\Support\Facades\Session::get('success') }}
    </div>
    </div>
@endif