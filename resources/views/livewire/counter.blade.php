<div class="top-boxes mb-10">
    <div class="row g-10">
        <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="panel">
                <div class="panel-body">
                    <div class="part-icon bg-primary">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="part-txt">
                        <p><span>Candidats Inscrit</span>{{ $inscrit }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="panel">
                <div class="panel-body">
                    <div class="part-icon bg-success">
                        <i class="bi bi-person-check-fill"></i>
                    </div>
                    <div class="part-txt">
                        <p><span>Candidats Admis</span>{{ $admis }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="panel">
                <div class="panel-body">
                    <div class="part-icon bg-danger">
                        <i class="bi bi-person-dash-fill"></i>
                    </div>
                    <div class="part-txt">
                        <p><span>Candidats Non Admis</span>{{ $noadmis }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="panel">
                <div class="panel-body">
                    <div class="part-icon bg-warning">
                        <i class="bi bi-bar-chart-fill"></i>
                    </div>
                    <div class="part-txt">
                        <p><span>Statistique globale</span>{{ $statistic }}%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>