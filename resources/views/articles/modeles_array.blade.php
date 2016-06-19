
@if(isset($details['the_models']))
    @foreach($details['the_models'] as $modele)
        <tr>
            <td class="mycenter">{{ $modele['name']}}</td>
            <td class="mycenter">{{ $modele['category']['name'] }}</td>
            <td class="mycenter">{{ $modele['brand']['name'] }}</td>
        </tr>
    @endforeach
@else <tr>Pas d'enregistrements</tr>
@endif