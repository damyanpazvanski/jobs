@foreach($candidates as $candidate)
    <tr>
        <td>{{ $candidate->first_name ?: '-' }}</td>
        <td>{{ $candidate->last_name ?: '-' }}</td>
        <td>{{ $candidate->email }}</td>
        <td>{{ $candidate->phone ?: '-' }}</td>
        <td>{{ $candidate->sentIqTest ? $candidate->sentIqTest->count : '-' }}</td>
        <td>
            <div class="text-center {{ $candidate->iqResult->status == 'complete' ?
                                                'status-success' : 'status-hold' }}">
                <strong>{{ $candidate->iqResult->status }}</strong>
            </div>
        </td>
        <td class="text-info border">{{ $candidate->iqResult->result ?: '-' }} %</td>
        <td>{{ ucfirst($candidate->iqResult->level) }}</td>
    </tr>
@endforeach