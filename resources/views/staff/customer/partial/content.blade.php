<div id="child">
     <input type="hidden" id="csrf" value="{{csrf_token()}}">
     <input type="hidden" id="obj" value="customer">
     <input type="hidden" id="sum" value="{{ $customers->count() }}">
     <table class="table datatable-basic">
          <thead>
               <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>E-Mail</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelayakan</th>
                    <th class="text-center">Actions</th>
               </tr>
          </thead>
          <tbody>
               @foreach($customers as $key => $customer)
               <tr>
                    <td scope="row">{!! $loop->iteration !!}</td>
                    <td>{{ \Str::ucfirst($customer->name) }}</>
                    </td>
                    <td>{{ \Str::ucfirst($customer->email) }}</td>
                    <td>{{ \Str::ucfirst($customer->address) }}</td>
                    <td>{{ $customer->gender == 1 ? 'Laki-Laki': 'Perempuan' }}</td>
                    <td>ssss</td>
                    <td style="width: 15%">
                         <a href="{{ route('staff.customer.edit', [$customer]) }}" class="btn btn-success">Edit</a>
                         {{-- <a href="{{ route('superadmin.admin.delete', [$admin]) }}" class="btn
                         btn-danger">Hapus</a> --}}
                         <button class="btn btn-danger delete-item" id="hapus_{{ $key }}"
                              data-id="{{ $customer->id }}">Delete</button>
                         <input type="hidden" id="item_{{ $key }}" value="{{ $customer->id }}"></td>
               </tr>
               @endforeach
          </tbody>
     </table>
</div>