<div id="child">
     <input type="hidden" id="csrf" value="{{csrf_token()}}">
     <input type="hidden" id="obj" value="staff">
     <input type="hidden" id="sum" value="{{ $staffs->count() }}">
     <table class="table datatable-basic">
          <thead>
               <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>E-Mail</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th class="text-center">Actions</th>
               </tr>
          </thead>
          <tbody>
               @if($staffs->count() > 0)
               @foreach($staffs as $key => $staff)
               <tr>
                    <td scope="row">{!! $loop->iteration !!}</td>
                    <td>{{ \Str::ucfirst($staff->name) }}</>
                    </td>
                    <td>{{ \Str::ucfirst($staff->email) }}</td>
                    <td>{{ \Str::ucfirst($staff->address) }}</td>
                    <td>{{ $staff->gender == 1 ? 'Laki-Laki': 'Perempuan' }}</td>

                    <td style="width: 20%">
                         <a href="{{ route('manager.staff.edit', [$staff]) }}" class="btn btn-success">Edit</a>
                         {{-- <a href="{{ route('superadmin.admin.delete', [$admin]) }}" class="btn
                         btn-danger">Hapus</a> --}}
                         <button class="btn btn-danger delete-item" id="hapus_{{ $key }}"
                              data-id="{{ $staff->id }}">Delete</button>
                         <input type="hidden" id="item_{{ $key }}" value="{{ $staff->id }}"></td>
               </tr>
               @endforeach
               @else
               <tr>
                    <td class="text-center"> Tidak ada Data</td>
                    
               </tr>
               @endif
          </tbody>
     </table>
</div>