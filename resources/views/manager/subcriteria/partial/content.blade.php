<div id="child">
     <input type="hidden" id="csrf" value="{{csrf_token()}}">
     <input type="hidden" id="obj" value="subcriteria">
     <input type="hidden" id="sum" value="{{ $subCriterias->count() }}">
     <table class="table datatable-basic">
          <thead>
               <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kriteria</th>
                    <th>Bobot</th>
                    <th>Bobot Kriteria</th>
                    <th class="text-center">Actions</th>
               </tr>
          </thead>
          <tbody>
               @foreach($subCriterias as $key => $subCriteria)
               <tr>
                    <td scope="row">{!! $loop->iteration !!}</td>
                    <td>{{ \Str::ucfirst($subCriteria->name) }}</>
                    </td>
                    <td>{{ \Str::ucfirst($subCriteria->criteria->name) }}</>
                    </td>
                    <td>{{ number_format($subCriteria->value) }}</td>
                    <td>{{ number_format($subCriteria->criteria->value) }}%</td>
                    <td style="width: 15%">
                         <a href="{{ route('manager.subcriteria.edit', [$subCriteria]) }}"
                              class="btn btn-success">Edit</a>
                         <button class="btn btn-danger delete-item" id="hapus_{{ $key }}"
                              data-id="{{ $subCriteria->id }}">Delete</button>
                         <input type="hidden" id="item_{{ $key }}" value="{{ $subCriteria->id }}">
                    </td>
               </tr>
               @endforeach
          </tbody>
     </table>
</div>