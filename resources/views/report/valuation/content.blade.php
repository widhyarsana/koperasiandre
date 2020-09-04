<div class="table-responsive">
     <table class="table">
          <thead>
               <tr class="bg-blue">
                    <th>No</th>
                    <th>Code Kelayakan</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Kelayakan</th>
                    <th>Nilai Kelayakan</th>
               </tr>
          </thead>
          <tbody>
               @foreach ($valuations as $valuation)
               <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td>{{ $valuation->code }}</td>
                    <td>{{ date('d F Y', strtotime($valuation->date))  }}</td>
                    <td>{{ $valuation->customer->name }}</td>
                    <td>
                         {{ $valuation->total >= 60 ? 'Layak':'Tidak Layak' }}
                    </td>
                    <td>
                         {{ number_format($valuation->total) }}

                    </td>
               </tr>
               @endforeach
          <tfoot>
               <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                         <h6><b>Total</b></h6>
                    </td>
                    <td>
                         <h6><b>{{ $valuations->count() }}</b></h6>
                    </td>
                    <td>
                         <h6><b></b></h6>
                    </td>
               </tr>
          </tfoot>
          </tbody>
     </table>
</div>