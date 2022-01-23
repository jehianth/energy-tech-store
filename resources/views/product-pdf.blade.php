<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<h3>Data Product</h3>
<table id="customers">
  <tr>
    <th>No</th>
    <th>Product Name</th>
    <th>Product Type</th>
    <th>Entry Date</th>
    <th>Stock</th>
  </tr>
  @php
      $no=1;
  @endphp
  @foreach ($data as $row)
  <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $row->name }}</td>
    <td>{{ $row->type }}</td>
    <td>{{ $row->entrydate }}</td>
    <td>{{ $row->stock }}</td>
  </tr>
  @endforeach

</table>

</body>
</html>


