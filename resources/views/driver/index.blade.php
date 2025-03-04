
@extends('layouts.guest')

@section('content')
            <section class="reservations">
                <h2>Réservations récentes</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Départ</th>
                            <th>Destination</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $reservation as $reserv )
                        <tr>
                        @if (is_object($user))
    <td>{{ $user->name }}</td>
@else
    <td>User not found</td>
@endif
                           
                            <td>{{ $reserv->depart }}</td>
                            <td>{{ $reserv->arriver }}</td>
                            <td>{{ $reserv->departure_time }}</td>
                            @if ($reserv->status == 'pending')
    <td><span class="status status-pending">{{ $reserv->status }}</span></td>
@elseif ($reserv->status == 'approved')
    <td><span class="status status-confirmed">Confirmé</span></td>
@else
    <td><span class="status status-cancelled">Annulé</span></td>
@endif

                           
                            <td>
                                @if ($reserv->status == 'pending')
                                <a href="{{ Route('accepter',['id'=>$reserv->id]) }}" class="action-btn btn-accept">Accepter</a>
                                <a href="{{ Route('annuler',['id'=>$reserv->id]) }}" class="action-btn btn-reject">annuler</a,>
                                @elseif($reserv->status == 'approved')
                                <a href="{{ Route('annuler',['id'=>$reserv->id]) }}" class="action-btn btn-reject">annuler</a,>
                                @else
    
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    @endsection
</body>
</html>