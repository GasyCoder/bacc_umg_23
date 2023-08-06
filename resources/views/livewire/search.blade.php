@if($control->status == true)
 @include('livewire.close')
@else
<div class="card p-3 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
    <p class=" fw-bolder">{{__('Résultats du Baccaulauréat Année 2023')}}</p>
    <div class="input-group">
        <input wire:model.debounce.300ms="query" type="search" inputmode="numeric" pattern="[0-9]*"
        class="form-control form-control-lg" placeholder="Entrez votre Numéro d'inscription au baccalauréat..."
        aria-label="Input group example" aria-describedby="basic-addon1" 
        data-listener-added_6b1b6727="true" 
        maxlength="7">  
        <span class="input-group-text" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                </path>
            </svg>
        </span>    
    </div>
    <div class="mt-4">
        <div wire:loading.block wire:target="query" class="alert alert-primary" role="alert">
           <i class="bi bi-hourglass-split bi flex-shrink-0 me-2" role="img" aria-label="primary:"></i>
            {{__('Recherche en cours...')}}
        </div>
        <div wire:loading.remove wire:target="query">
        @if(!empty($results))
            @if($results[0] === 'Matricule_shortened')
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill bi flex-shrink-0 me-2" role="img" aria-label="warning:"></i>
                <div class="fw-bold">
                    {{__('Le numéro est trop court. Veuillez corriger.')}}
                </div>
            </div>
            @elseif($results[0] === 'Incorrect_matricule')
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill bi flex-shrink-0 me-2" role="img" aria-label="warning:"></i>
                <div class="fw-bold">
                    {{__('Votre numéro d\'inscription n\'est pas correct. Veuillez corriger.')}}
                </div>
            </div>
            @elseif($results[0] === 'Not_admitted')
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-emoji-frown-fill bi flex-shrink-0 me-2" role="img" aria-label="Danger:"></i>
                <div class="fw-bold">
                    {{__('Désolé, Vous n\'êtes pas Admis(e)...')}}
                </div>
            </div>
            @if($noadmis)
                <div class="bg-danger text-white p-3 mt-2">
                    <div class="fw-bold">{{ __('Nom complet: ') . $noadmis->fname . ' ' . $noadmis->lname }}</div>
                    <div>{{ __('Numéro: ') . $noadmis->matricule }}</div>
                    <div>{{ __('Série: ') . $noadmis->serie }}</div>
                    <div>{{ __('Centre: ') . $noadmis->center }}</div>
                </div>
            @endif
            @else
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill bi flex-shrink-0 me-2" role="img" aria-label="success:"></i>
                <div class="fw-bold">
                    {{__('Félicitation, Vous êtes Admis(e)...')}}
                </div>
            </div>
            <div class="row">
           @foreach ($results as $result)
                <div class="d-flex flex-column flex-lg-row justify-content-start rounded shadow-lg">
                    <nav class="col-lg-8">
                        <div class="list-group">
                            <strong class="list-group-item d-flex gap-2">
                              <i class="bi bi-person-check" style="color:rgb(3, 203, 3)"></i> {{ $result['fname'] }} {{ $result['lname'] }}
                            </strong>
                            <label class="list-group-item d-flex gap-2">
                                <input class="form-check-input flex-shrink-0" type="checkbox" checked="" disabled>
                                <span>
                                    {{__('Numéro')}}
                                    <small class="d-block text-body-secondary">{{ $result['matricule'] }}</small>
                                </span>
                            </label>
                            <label class="list-group-item d-flex gap-2">
                                <input class="form-check-input flex-shrink-0" type="checkbox" checked="" disabled>
                                <span>
                                   {{__(' Série')}}
                                    <small class="d-block text-body-secondary">{{ $result['serie'] }}</small>
                                </span>
                            </label>
                            <label class="list-group-item d-flex gap-2">
                                <input class="form-check-input flex-shrink-0" type="checkbox" checked="" disabled>
                                <span>
                                    {{__('Mention')}}
                                    <small class="d-block text-body-secondary">{{ $result['mention'] }}</small>
                                </span>
                            </label>
                            <label class="list-group-item d-flex gap-2">
                                <input class="form-check-input flex-shrink-0" type="checkbox" checked="" disabled>
                                <span>
                                    {{__('Centre')}}
                                    <small class="d-block text-body-secondary text-truncate">{{ $result['center'] }}</small>
                                </span>
                            </label>    
                        </div>
                    </nav>
                    <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
                    <hr class="d-lg-none">
                    <div class="col-lg-4 pe-5">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5">
                                    <div class="qr-code-container">
                                        {!! QrCode::size(180)->generate("Felicitation, Vous etes Admis(e), BACC-2023... \nNom :
                                        {$result['lname']}\nPrenom : {$result['fname']}\nNumero : {$result['matricule']}\nSerie :
                                        {$result['serie']}\nCentre : {$result['center']}\nMention : {$result['mention']}"); !!}
                                    </div>
                                </div>
                                <div class="text-center text-muted">{{__('Scan votre Qr Code')}}</div>
                            </div>
                            {{-- <div class="d-flex flex-column flex-md-row align-items-center justify-content-center">
                            <a wire:click="shareOnFacebook('{{ $query }}')" class="btn btn-primary btn-sm">
                                <i class="bi bi-facebook"></i> Share
                            </a>
                            </div> --}}
                    </div>
                </div>
            </div>
            @endforeach
            </div>
            @endif
        @endif
        </div>
    </div>
</div>
@endif