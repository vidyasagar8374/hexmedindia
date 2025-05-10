@foreach($transactiondetails as $row)
@php
$date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at);
@endphp
                <tr>
                  <td>{{$row->payment_ref}}</td>
                   @if(auth()->user()->role == 1)
                 <td>{{$row->franchiseowners->tradename ?? 'NA'}}</td>
                  @endif
                  <td style="color: {{ $row->is_positive == 'YES' ? 'green' : 'red' }}">{{$row->amount}}</td>
                   <td>{{$date->format('d F Y H:i:s');}}</td>
                   <td>
                        @php
                            $count = count($row->testdetails);
                            $i = 0;
                        @endphp
                       @foreach($row->testdetails as $tests)
                       {{$tests->booking_id}}
                       @if ($i < $count - 1)
                        ,
                        @endif
                        @php $i++; @endphp
                       @endforeach
                     </td>
                </tr>
                @endforeach