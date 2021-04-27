@extends ('layouts.app')

@section('content')

<div class="container">
    <header>
      <h1>Phone book</h1>
      <hr />
    </header>
    <table id='table1' class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
            <td>@if(auth()->id() === $item->user_id)
                <form method="POST" action="{{route('deleteitem', $item)}}">
                    @method('DELETE')
                    @csrf
                <form>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
                </form>
            <br>
                <form action="{{route('itemedit', $item)}}">
                    @csrf
                <form>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
                </form>
                @endif </td>
        </tr>
      @endforeach
      </tbody>
      <tfoot>
      </tfoot>
    </table>
    @if(auth()->user()->anypost())
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left: 1050px">
        Share
    </button>
    @endif
</div>




  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="{{route('share')}}">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Share item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
              <div class="modal-body">

            <h4>Item select</h4>
                <select name="item" id="item" class="form control input-sm">
                    @foreach($sharable_items as $item)
                <option value="{{$item->id}}">{{$item->name}} {{$item->phone}}</option>
                    @endforeach
                </select>
            <hr>
            <h4>User select</h4>
                <select name="receiver" id="" class="form control input-sm">
                    @foreach($sharable_users as $user)
                <option value="{{$user->id}}">{{$user->name}} {{$user->email}}</option>
                    @endforeach
                </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  <div class="container">
    <header>
      <h1>My shares</h1>
      <hr />
    </header>
    <table id='table1' class="table table-bordered">
      <thead>
        <tr>
          <th>Sharer name</th>
          <th>Phone</th>
          <th>Receiver name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($my_shared_items as $my_shared_item)
        <tr>
        <td>{{App\Models\Item::where('id',$my_shared_item->item_id)->value('name')}}</td>
        <td>{{App\Models\Item::where('id',$my_shared_item->item_id)->value('phone')}}</td>
        <td>{{App\Models\User::where('id',$my_shared_item->receiver_id)->value('name')}}</td>
        <td>
            <form method="POST" action="{{route('deleteshare', $my_shared_item)}}">
                @method('DELETE')
                @csrf
                <form>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </form>
        <br>
        </td>
        </tr>
      @endforeach
      </tbody>
      <tfoot>
      </tfoot>
    </table>
  </div>
  @endsection

