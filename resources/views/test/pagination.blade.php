<table border="">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->status }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $data->links() }}