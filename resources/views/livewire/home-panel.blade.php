            @if($control->status == true)
            <div class="alert alert-d alert-warning mb-10" role="alert">
            {{__('Info ! Votre site est désactivé. Vous pouvez l\'activer à tout moment !')}}
            </div>       
            @endif
            @include('livewire.counter')
            <div class="breadcrumb-wrap mb-20">
                <div class="d-md-flex d-block justify-content-between align-items-center">
                    <div class="left">
                        <h1>{{__('Data Bacc - 2023')}}</h1>
                        <p>{{__('Ces données concernent les candidats admis et non admis à l\'examen du baccalauréat de l\'année
                            2023.')}}</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('export') }}" class="btn btn-primary">
                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                            {{__('Exporter')}}
                        </a>
                        <a href="{{ route('candidates.restore') }}" class="btn btn-danger" 
                           onclick="return confirmRestore()">
                            <i class="bi bi-trash-fill"></i>
                            {{__('Restaurer')}}
                        </a>
                    </div>
                </div>
            </div>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif    
                @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
                <br>
                <div class="panel mb-10">
                    <div class="panel-body">
                        <table id="myTable" class="table table-light data-table">
                            <thead>
                                <tr class="table-light">
                                    <th>N°</th>
                                    <th>Série</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Mention</th>
                                    <th>Centre</th>
                                    <th>Admis</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($candidates as $row)
                                <tr>
                                    <td>{{$row->matricule}}</td>
                                    <td>{{$row->serie}}</td>
                                    <td>{{$row->fname}}</td>
                                    <td>{{$row->lname}}</td>
                                    <td>{{ $row->mention ?? '-' }}</td>
                                    <td>{{$row->center}}</td>
                                    <td>
                                      @if($row->admis == true)  
                                        <span class="badge bg-success">OUI</span>
                                      @else
                                        <span class="badge bg-danger">NON</span>
                                      @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $candidates->links() }} --}}
                    </div>
                </div>


        {{-- <div class="row g-10">
            <div class="col-xl-6 col-lg-6">
                <div class="panel mb-10">
                    <div class="panel-heading">
                        <span>Profile Visit</span>
                    </div>
                    <div class="panel-body">
                        <div id="chart-profile-visit"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="panel mb-10">
                    <div class="panel-heading">
                        <span>Analytics</span>
                    </div>
                    <div class="panel-body">
                        <div id="chart-analytics"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
