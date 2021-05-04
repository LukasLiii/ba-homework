@extends ('layouts.app')

@section('content')


<div class="container">
    <header>
      <h1>Shared Items</h1>
      <hr />
    </header>
    <table id='table1' class="table table-bordered">
      <thead>
        <tr>
          <th>Shared item name</th>
          <th>Shared item phone</th>
          <th>Shared item id</th>
          <th>Sharer id</th>
          <th>Receiver id</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sharedItems as $sharedItem)
            <tr>
                <td>{{$sharedItem->name}}</td>
                <td>{{$sharedItem->phone}}</td>
                <td>{{$sharedItem->item_id}}</td>
                <td>{{$sharedItem->sharer_id}}</td>
                <td>{{$sharedItem->receiver_id}}</td>
            </tr>
        @endforeach
      </tbody>
      <tfoot>
      </tfoot>
    </table>
</div>

{{-- @foreach($shared_items as $shared_item)

    <p>Shared item name:
        <span>{{$shared_item->name}}</span>
    </p>
    <p>Shared item phone:
        <span>{{$shared_item->phone}}</span>
    </p>
    <p>Shared item id:
        <span>{{$shared_item->item_id}}</span>
    </p>
    <p>Sharer id:
        <span>{{$shared_item->sharer_id}}</span>
    </p>
    <p>Receiver id:
        <span>{{$shared_item->receiver_id}}</span>
    </p>

    @if(auth()->id() == $shared_item->sharer_id)
    <form method="POST" action="{{route('deleteshare', $shared_item)}}">
            @method('DELETE')
            @csrf
            <form>
                <button type="submit" class="btn btn-primary">Delete</button>
            </form>
    </form>
    @endif
<br>
<br>

@endforeach --}}
@endsection
