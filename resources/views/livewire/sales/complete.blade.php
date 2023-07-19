<div>
    <table class="table table-striped">
        <thead>
            <th>Client</th>
            <th>Date</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($contents as  $item)
            <tr>
                <td>{{$item->first_name.' '.$item->last_name}}</td>
                <td>{{$item->updated_at}}</td>
                <td><a  href="sales/documents/{{$item->id}}">VIEW</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
