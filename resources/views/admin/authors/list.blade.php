
@foreach($authors as $key => $author)
    <tr id="{{$author->id}}" class="odd">
        <td  class="dtr-control sorting_1" tabindex="0">{{$key + $authors->firstItem()}}</td>
        <td>{{$author->name}}</td>
        <td>
            <div  style="display: inline-flex">
                <div style="margin: 0 10px">
                    <a href=""  data-id="{{$author->id}}"><i class="fas fa-edit"></i></a>
                </div>
                <div style="margin: 0 10px">
                    <a href="" data-id="{{$author->id}}" style="color: red"><i class="far fa-trash-alt"></i></a>
                </div>
            </div>
        </td>
    </tr>
@endforeach
