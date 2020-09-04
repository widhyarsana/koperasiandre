<div id="child">
     <input type="hidden" id="csrf" value="{{csrf_token()}}">
     <input type="hidden" id="obj" value="criteria">
     <input type="hidden" id="sum" value="{{ $criterias->count() }}">
     <table class="table datatable-basic">
          <thead>
               <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Bobot</th>
                    <th class="text-center">Actions</th>
               </tr>
          </thead>
          <tbody>
               @foreach($criterias as $key => $criteria)
               <tr>
                    <td scope="row">{!! $loop->iteration !!}</td>
                    <td>{{ \Str::ucfirst($criteria->name) }}</>
                    </td>
                    <td>{{ number_format($criteria->value) }}%</td>

                    <td style="width: 25%">
                         <a href="{{ route('manager.criteria.show', [$criteria]) }}" class="btn btn-warning">Detail</a>
                         <a href="{{ route('manager.criteria.edit', [$criteria]) }}" class="btn btn-success">Edit</a>
                         <button class="btn btn-danger delete-item" id="hapus_{{ $key }}"
                              data-id="{{ $criteria->id }}">Delete</button>
                         <input type="hidden" id="item_{{ $key }}" value="{{ $criteria->id }}">
                    </td>
               </tr>
               @endforeach
          </tbody>
     </table>
</div>