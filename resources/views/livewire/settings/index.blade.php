<div class="row">
<div class="col-xl-8 col-lg-8">
    <div class="panel mb-10">
        <div class="panel mb-10">
            <div class="panel-heading">
                <span>Paramètres</span>
            </div>
            <div class="panel-body">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            <form wire:submit.prevent="updateSetting" class="mt-3">
                <div class="mb-3">
                    <label for="site_name" class="form-label">Nom de Site</label>
                    <input type="text" class="form-control" wire:model.defer="setting.site_name">
                    @error('setting.site_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="site_name" class="form-label">Lien page facebook</label>
                    <input type="text" class="form-control" wire:model.defer="setting.fblink">
                    @error('setting.site_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="title_message" class="form-label">Titre Message</label>
                    <input type="text" class="form-control" wire:model.defer="setting.title_message">
                    @error('setting.title_message') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Messages</label>
                    <textarea wire:model.defer="setting.message" cols="10" rows="5" class="form-control"></textarea>
                    @error('setting.message') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="btn-box justify-content-end">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-4">
    <div class="panel mb-10">
        <div class="panel mb-10">
            <div class="panel-heading">
                <span>Controle</span>
            </div>
           <div class="panel-body">
                <div class="panel-body">
                   <div class="panel-body">
                    <button type="button" class="btn @if($status) btn-success @else btn-danger @endif" wire:click="toggleStatus">
                        @if($status) Activer Rechercher Résultats @else Desactiver Rechercher Résultats @endif
                    </button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
                    