@extends('backend.app')
<style>
    
    .button{
        display: inline-block;
  border-radius: 4px;
  background-color: #334756;
  border: none;
  color: #fafbfe;
  text-align: center;
  font-size: 18px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;

    }
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  color: #fafbfe
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  /* right: -20px; */
  left: 20px;
  transition: 0.5s;
  color: #fafbfe
}

.button:hover span {
  /* padding-right: 25px; */
  padding-left: 25px;
  color: #fafbfe
}

.button:hover span:after {
  opacity: 1;
  left: 0;
  color: #fafbfe

}


</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/shipping" class="button"><span><i class="fas fa-arrow-circle-left"></i> Back</span></a>
                    </div>

                    <div class="card-body">
                        <form action="/shipping/{{ $shippings->id }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="description">Description of Shipping Policy</label>
                                <textarea name="description" id="description" type="text" class="form-control" rows="3" >{{ $shippings->description }}</textarea>
                            </div>
                            
                            <div>
                            <button type="submit" class="button"><span>Update <i class="far fa-save"></i></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection